<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;

use App\Evaluacion;
use App\Periodo;
use App\Comision;
use App\Academico;
use App\Departamento;

class EvaluacionController extends Controller{

    /* Funcion que retorna a la pagina principal de la pestaña Evaluacion, junto con los datos de las comisiones y academicos 
       disponibles, junto con la facultad del usuario*/
    public function index(){
        $datosPeriodo=Periodo::where('estado','=',"ACTIVO")->get();
        if($datosPeriodo=="[]"){
            return redirect('/index')->with('Mensaje','El proceso de evaluacion académica se encuentra cerrado');
        }else{
            $facultadUsuario=auth()->user()->facultad;
            $comisiones=Comision::where('facultad','=',$facultadUsuario)->where('estado','=','ACTIVO')->get();

            $evaluados=Evaluacion::where('año','=',$datosPeriodo[0]->año)->select('rut_academico')->get()->toArray();
            //return response()->json($evaluados);

            $academicos=Academico::where('facultad','=',$facultadUsuario)->whereNotIn('rut',$evaluados)->paginate(5);
            $yaEvaluados=Academico::where('facultad','=',$facultadUsuario)->whereIn('rut',$evaluados)->paginate(5);
            if($comisiones=="[]"){
                return view('evaluacion.index')->with('comisiones',$comisiones)->with('academicos',$academicos)->with('facultadUsuario',$facultadUsuario)->with('Mensaje','No Existen Comisiones Configuradas para esta Facultad');
            }else{
                return view('evaluacion.index',compact('comisiones','academicos','facultadUsuario','yaEvaluados'));
            }
        }
    }

    /* Funcion que retorna a la pagina que permite crear una nueva evaluacion*/
    public function evaluar(Request $request){
        $datosAcademico=Academico::where('rut','=',$request->rutAcademico)->first();
        $datosComision=Comision::where('id_comision','=',$request->comision)->first();
        $periodo=Periodo::where('estado','=','ACTIVO')->first();
        return view('evaluacion.create',compact('datosAcademico','datosComision','periodo'));   
    }

    /* Funcion que recibe los datos del formulario para crear una nueva evaluacion, para posteriormente ingresarla a la base de datos*/
    public function store(Request $request){
        //Validación de ponderaciones. Se busca verificar que las ponderacinoes ingresadas sumen 100%.
        $t1=intval($request->input('tiempoAsignado1'));
        if($t1==""){
            $t1=0;
        }
        $t2=intval($request->input('tiempoAsignado2'));
        if($t2==""){
            $t2=0;
        }
        $t3=intval($request->input('tiempoAsignado3'));
        if($t3==""){
            $t3=0;
        }
        $t4=intval($request->input('tiempoAsignado4'));
        if($t4==""){
            $t4=0;
        }
        $t5=intval($request->input('tiempoAsignado5'));
        if($t5==""){
            $t5=0;
        }
        if($t1+$t2+$t3+$t4+$t5!=100){
            $datosAcademico=Academico::where('rut','=',$request->input('rutAcademico'))->first();
            $datosComision=Comision::where('id_comision','=',$request->input('id_comision'))->first();
            return view('evaluacion.create')->with('datosAcademico',$datosAcademico)->with('datosComision',$datosComision)->with('Mensaje','Suma de ponderaciones incorrecta');
        }

        //Validación de notas. Se busca verificar que si se ingresó una ponderacion, debe incluirse sólo una nota en dicha actividad.
        $datosAcademico=Academico::where('rut','=',$request->input('rutAcademico'))->first();
        $datosComision=Comision::where('id_comision','=',$request->input('id_comision'))->first();
        if($t1!=0){
            if($request->input('1e')=="" && $request->input('1mb')=="" && $request->input('1b')=="" && $request->input('1r')=="" && $request->input('1d')==""){
                return view('evaluacion.create')->with('datosAcademico',$datosAcademico)->with('datosComision',$datosComision)->with('Mensaje','Faltan Datos');
            }
        }
        if($t2!=0){
            if($request->input('2e')=="" && $request->input('2mb')=="" && $request->input('2b')=="" && $request->input('2r')=="" && $request->input('2d')==""){
                return view('evaluacion.create')->with('datosAcademico',$datosAcademico)->with('datosComision',$datosComision)->with('Mensaje','Faltan Datos');
            }
        }
        if($t3!=0){
            if($request->input('3e')=="" && $request->input('3mb')=="" && $request->input('3b')=="" && $request->input('3r')=="" && $request->input('3d')==""){
                return view('evaluacion.create')->with('datosAcademico',$datosAcademico)->with('datosComision',$datosComision)->with('Mensaje','Faltan Datos');
            }
        }
        if($t4!=0){
            if($request->input('4e')=="" && $request->input('4mb')=="" && $request->input('4b')=="" && $request->input('4r')=="" && $request->input('4d')==""){
                return view('evaluacion.create')->with('datosAcademico',$datosAcademico)->with('datosComision',$datosComision)->with('Mensaje','Faltan Datos');
            }
        }
        if($t5!=0){
            if($request->input('5e')=="" && $request->input('5mb')=="" && $request->input('5b')=="" && $request->input('5r')=="" && $request->input('5d')==""){
                return view('evaluacion.create')->with('datosAcademico',$datosAcademico)->with('datosComision',$datosComision)->with('Mensaje','Faltan Datos');
            }
        }
        
        /*
        Una vez calculada la nota y las ponderaciones, se ingresan todos los datos a un objeto de tipo "evaluacion", el cual finalmente se ingresa a la Base de Datos. */
        $evaluacion = new Evaluacion();
        $evaluacion->rut_academico=$request->input('rutAcademico');
        $evaluacion->nombre_academico=$request->input('nombreAcademico');
        $evaluacion->apellido_academico=$request->input('apellidoAcademico');
        $evaluacion->departamento_academico=$request->input('dptoAcademico');
        $evaluacion->tp_academico=$request->input('titulo');
        $evaluacion->facultad=Departamento::where('nombre','=',$request->input('dptoAcademico'))->first()->facultad;
        $evaluacion->decano=$request->input('decano');
        $evaluacion->miembro1=$request->input('miembro1');
        $evaluacion->miembro2=$request->input('miembro2');
        $evaluacion->id_comision=$request->input('id_comision');
        $evaluacion->año=$request->input('año');
        $evaluacion->tiempoActividad1=$t1;
        if($t1==0){
            $evaluacion->tiempoActividad1="";
        }
        $evaluacion->e1=$request->input('1e');
        $evaluacion->mb1=$request->input('1mb');
        $evaluacion->b1=$request->input('1b');
        $evaluacion->r1=$request->input('1r');
        $evaluacion->d1=$request->input('1d');
        $evaluacion->t1c=$request->input('1tc');
 
        $evaluacion->tiempoActividad2=$t2;
        if($t2==0){
            $evaluacion->tiempoActividad2="";
        }
        $evaluacion->e2=$request->input('2e');
        $evaluacion->mb2=$request->input('2mb');
        $evaluacion->b2=$request->input('2b');
        $evaluacion->r2=$request->input('2r');
        $evaluacion->d2=$request->input('2d');
        $evaluacion->t2c=$request->input('2tc');

        $evaluacion->tiempoActividad3=$t3;
        if($t3==0){
            $evaluacion->tiempoActividad3="";
        }
        $evaluacion->e3=$request->input('3e');
        $evaluacion->mb3=$request->input('3mb');
        $evaluacion->b3=$request->input('3b');
        $evaluacion->r3=$request->input('3r');
        $evaluacion->d3=$request->input('3d');
        $evaluacion->t3c=$request->input('3tc');
        
        $evaluacion->tiempoActividad4=$t4;
        if($t4==0){
            $evaluacion->tiempoActividad4="";
        }
        $evaluacion->e4=$request->input('4e');
        $evaluacion->mb4=$request->input('4mb');
        $evaluacion->b4=$request->input('4b');
        $evaluacion->r4=$request->input('4r');
        $evaluacion->d4=$request->input('4d');
        $evaluacion->t4c=$request->input('4tc');

        $evaluacion->tiempoActividad5=$t5;
        if($t5==0){
            $evaluacion->tiempoActividad5="";
        }
        $evaluacion->e5=$request->input('5e');
        $evaluacion->mb5=$request->input('5mb');
        $evaluacion->b5=$request->input('5b');
        $evaluacion->r5=$request->input('5r');
        $evaluacion->d5=$request->input('5d');
        $evaluacion->t5c=$request->input('5tc');
 
        $evaluacion->nota_final=$request->input('nota');
        $evaluacion->comentarios=$request->input('comentarios');
        $evaluacion->save();
        return view('evaluacion.evaluacionTerminada')->with('data',$evaluacion)->with('Mensaje','Evaluación Realizada Correctamente');
    }

    /* Funcion que retorna a la pagina que permite editar una evaluacion anteriormente realizada*/
    public function actualizar($rut_academico){
        $periodoActual=Periodo::where('estado','=',"ACTIVO")->first();
        $data=Evaluacion::where('rut_academico','=',$rut_academico)->where('año','=',$periodoActual->año)->first();
        return view('evaluacion.edit',compact('data'));
    }

    public function verEvaluacion($rut_academico){
        $academico=Academico::where('rut','=',$rut_academico)->first();
        $datos=Evaluacion::where('rut_academico','=',$rut_academico)->first();
        $periodoActual=Periodo::where('estado','=','ACTIVO')->select('año')->first();
        $notaAnterior=Evaluacion::where('rut_academico','=',$rut_academico)->where('año','=',$periodoActual->año-1)->select('nota_final')->first();
        if($notaAnterior==""){
            $notaAnterior="-.";
        }else{
            $notaAnterior=$notaAnterior->nota_final;
        }
        $pdf=PDF::loadView('academico.pdf',compact('academico','datos','notaAnterior'));
        return $pdf->stream('reporte-'.$rut_academico.'.pdf');
        //return $pdf->download('reporte-'.$rut_academico.'.pdf');
    }

    public function pruebaEvaluacion($rut_academico){
        $academico=Academico::where('rut','=',$rut_academico)->first();
        $datos=Evaluacion::where('rut_academico','=',$rut_academico)->first();
        $periodoActual=Periodo::where('estado','=','ACTIVO')->select('año')->first();
        $notaAnterior=Evaluacion::where('rut_academico','=',$rut_academico)->where('año','=',$periodoActual->año-1)->select('nota_final')->first();
        if($notaAnterior==""){
            $notaAnterior="-.";
        }else{
            $notaAnterior=$notaAnterior->nota_final;
        }
        return view('academico.pdf',compact('academico','datos','notaAnterior'));
    }

    /* Funcion que recibe los datos del formulario para editar una evaluacion, para posteriormente ingresar a la base de datos la 
       información actualizada*/
    public function update(Request $request){
        //Validacion de ponderaciones. Se busca verificar que las ponderacinoes ingresadas sumen 100%.
        $t1=intval($request->input('tiempoAsignado1'));
        if($t1==""){
            $t1=0;
        }
        $t2=intval($request->input('tiempoAsignado2'));
        if($t2==""){
            $t2=0;
        }
        $t3=intval($request->input('tiempoAsignado3'));
        if($t3==""){
            $t3=0;
        }
        $t4=intval($request->input('tiempoAsignado4'));
        if($t4==""){
            $t4=0;
        }
        $t5=intval($request->input('tiempoAsignado5'));
        if($t5==""){
            $t5=0;
        }
        if($t1+$t2+$t3+$t4+$t5!=100){
            $data=Evaluacion::where('id','=',$request->input('id_evaluacion'))->first();
            return view('evaluacion.edit')->with('data',$data)->with('Mensaje','Suma de ponderaciones incorrecta');
        }
        
        //Validacion de notas. Se busca verificar que si se ingresó una ponderacion, debe incluirse sólo UNA nota en dicha actividad.
        $data=Evaluacion::where('id','=',$request->input('id_evaluacion'))->first();
        if($t1!=0){
            if($request->input('1e')=="" && $request->input('1mb')=="" && $request->input('1b')=="" && $request->input('1r')=="" && $request->input('1d')==""){
                return view('evaluacion.edit')->with('data',$data)->with('Mensaje','Faltan Datos');
            }
        }
        if($t2!=0){
            if($request->input('2e')=="" && $request->input('2mb')=="" && $request->input('2b')=="" && $request->input('2r')=="" && $request->input('2d')==""){
                return view('evaluacion.edit')->with('data',$data)->with('Mensaje','Faltan Datos');
            }
        }
        if($t3!=0){
            if($request->input('3e')=="" && $request->input('3mb')=="" && $request->input('3b')=="" && $request->input('3r')=="" && $request->input('3d')==""){
                return view('evaluacion.edit')->with('data',$data)->with('Mensaje','Faltan Datos');
            }
        }
        if($t4!=0){
            if($request->input('4e')=="" && $request->input('4mb')=="" && $request->input('4b')=="" && $request->input('4r')=="" && $request->input('4d')==""){
                return view('evaluacion.edit')->with('data',$data)->with('Mensaje','Faltan Datos');
            }
        }
        if($t5!=0){
            if($request->input('5e')=="" && $request->input('5mb')=="" && $request->input('5b')=="" && $request->input('5r')=="" && $request->input('5d')==""){
                return view('evaluacion.edit')->with('data',$data)->with('Mensaje','Faltan Datos');
            }
        }

        /*Una vez calculada la nota final y las ponderaciones, ingresamos todos los datos a un objeto de tipo "evaluacion", el cual finalmente se se actualiza en la Base de Datos. */
        $evaluacion = Evaluacion::find($request->input('id_evaluacion'));
        $evaluacion->rut_academico=$request->input('rutAcademico');
        $evaluacion->nombre_academico=$request->input('nombreAcademico');
        $evaluacion->apellido_academico=$request->input('apellidoAcademico');
        $evaluacion->departamento_academico=$request->input('dptoAcademico');
        $evaluacion->tp_academico=$request->input('titulo');
        $evaluacion->facultad=Departamento::where('nombre','=',$request->input('dptoAcademico'))->first()->facultad;
        $evaluacion->decano=$request->input('decano');
        $evaluacion->miembro1=$request->input('miembro1');
        $evaluacion->miembro2=$request->input('miembro2');
        $evaluacion->id_comision=$request->input('id_comision');
        $evaluacion->año=$request->input('año');
        $evaluacion->tiempoActividad1=$t1;
        if($t1==0){
            $evaluacion->tiempoActividad1="";
        }
        $evaluacion->e1=$request->input('1e');
        $evaluacion->mb1=$request->input('1mb');
        $evaluacion->b1=$request->input('1b');
        $evaluacion->r1=$request->input('1r');
        $evaluacion->d1=$request->input('1d');
        $evaluacion->t1c=$request->input('1tc');

        $evaluacion->tiempoActividad2=$t2;
        if($t2==0){
            $evaluacion->tiempoActividad2="";
        }
        $evaluacion->e2=$request->input('2e');
        $evaluacion->mb2=$request->input('2mb');
        $evaluacion->b2=$request->input('2b');
        $evaluacion->r2=$request->input('2r');
        $evaluacion->d2=$request->input('2d');
        $evaluacion->t2c=$request->input('2tc');

        $evaluacion->tiempoActividad3=$t3;
        if($t3==0){
            $evaluacion->tiempoActividad3="";
        }
        $evaluacion->e3=$request->input('3e');
        $evaluacion->mb3=$request->input('3mb');
        $evaluacion->b3=$request->input('3b');
        $evaluacion->r3=$request->input('3r');
        $evaluacion->d3=$request->input('3d');
        $evaluacion->t3c=$request->input('3tc');

        $evaluacion->tiempoActividad4=$t4;
        if($t4==0){
            $evaluacion->tiempoActividad4="";
        }
        $evaluacion->e4=$request->input('4e');
        $evaluacion->mb4=$request->input('4mb');
        $evaluacion->b4=$request->input('4b');
        $evaluacion->r4=$request->input('4r');
        $evaluacion->d4=$request->input('4d');
        $evaluacion->t4c=$request->input('4tc');

        $evaluacion->tiempoActividad5=$t5;
        if($t5==0){
            $evaluacion->tiempoActividad5="";
        }
        $evaluacion->e5=$request->input('5e');
        $evaluacion->mb5=$request->input('5mb');
        $evaluacion->b5=$request->input('5b');
        $evaluacion->r5=$request->input('5r');
        $evaluacion->d5=$request->input('5d');
        $evaluacion->t5c=$request->input('5tc');

        $evaluacion->nota_final=$request->input('nota');
        $evaluacion->comentarios=$request->input('comentarios');
        $evaluacion->save();
        return view('evaluacion.evaluacionTerminada')->with('data',$evaluacion)->with('Mensaje','Evaluación Editada Correctamente');
    }
}