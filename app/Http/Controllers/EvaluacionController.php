<?php

namespace App\Http\Controllers;

use App\Evaluacion;
use App\Periodo;
use App\Comision;
use App\Academico;
use App\Departamento;
use Illuminate\Http\Request;

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
            $academicos=Academico::where('facultad','=',$facultadUsuario)->paginate(5);
            if($comisiones=="[]"){
                return view('evaluacion.index')->with('comisiones',$comisiones)->with('academicos',$academicos)->with('facultadUsuario',$facultadUsuario)->with('Mensaje','No Existen Comisiones Configuradas para esta Facultad');
            }else{
                return view('evaluacion.index',compact('comisiones','academicos','facultadUsuario'));
            }
        }
    }

    /* Funcion que retorna a la pagina que permite crear una nueva evaluacion*/
    public function evaluar(Request $request){
        $periodoActual=Periodo::where('estado','=','ACTIVO')->first();
        $datosAcademico=Academico::where('rut','=',$request->rutAcademico)->first();
        $datosComision=Comision::where('id_comision','=',$request->comision)->first();
        $yaEvaluado=Evaluacion::where('rut_academico','=',$datosAcademico->rut)->where('año','=',$periodoActual->año)->first();
        if($yaEvaluado!=""){
            return view('evaluacion.actualizar')->with('id_evaluacion',$yaEvaluado->id)->with('Mensaje', 'El académico seleccionado ya ha sido Evaluado. ¿Desea editar la evaluación?');
        }else{
            return view('evaluacion.create',compact('datosAcademico','datosComision'));   
        }
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
            }else{
                $notas1=0;
                if($request->input('1e')!=""){
                    $notas1++;
                }
                if($request->input('1mb')!=""){
                    $notas1++;
                }
                if($request->input('1b')!=""){
                    $notas1++;
                }
                if($request->input('1r')!=""){
                    $notas1++;
                }
                if($request->input('1d')!=""){
                    $notas1++;
                }
                if($notas1>1){
                    return view('evaluacion.create')->with('datosAcademico',$datosAcademico)->with('datosComision',$datosComision)->with('Mensaje','Por favor, ingrese solo una nota por actividad');
                }
            }
        }
        if($t2!=0){
            if($request->input('2e')=="" && $request->input('2mb')=="" && $request->input('2b')=="" && $request->input('2r')=="" && $request->input('2d')==""){
                return view('evaluacion.create')->with('datosAcademico',$datosAcademico)->with('datosComision',$datosComision)->with('Mensaje','Faltan Datos');
            }else{
                $notas2=0;
                if($request->input('2e')!=""){
                    $notas2++;
                }
                if($request->input('2mb')!=""){
                    $notas2++;
                }
                if($request->input('2b')!=""){
                    $notas2++;
                }
                if($request->input('2r')!=""){
                    $notas2++;
                }
                if($request->input('2d')!=""){
                    $notas2++;
                }
                if($notas2>1){
                    return view('evaluacion.create')->with('datosAcademico',$datosAcademico)->with('datosComision',$datosComision)->with('Mensaje','Por favor, ingrese solo una nota por actividad');
                }
            }
        }
        if($t3!=0){
            if($request->input('3e')=="" && $request->input('3mb')=="" && $request->input('3b')=="" && $request->input('3r')=="" && $request->input('3d')==""){
                return view('evaluacion.create')->with('datosAcademico',$datosAcademico)->with('datosComision',$datosComision)->with('Mensaje','Faltan Datos');
            }else{
                $notas3=0;
                if($request->input('3e')!=""){
                    $notas3++;
                }
                if($request->input('3mb')!=""){
                    $notas3++;
                }
                if($request->input('3b')!=""){
                    $notas3++;
                }
                if($request->input('3r')!=""){
                    $notas3++;
                }
                if($request->input('3d')!=""){
                    $notas3++;
                }
                if($notas3>1){
                    return view('evaluacion.create')->with('datosAcademico',$datosAcademico)->with('datosComision',$datosComision)->with('Mensaje','Por favor, ingrese solo una nota por actividad');
                }                
            }
        }
        if($t4!=0){
            if($request->input('4e')=="" && $request->input('4mb')=="" && $request->input('4b')=="" && $request->input('4r')=="" && $request->input('4d')==""){
                return view('evaluacion.create')->with('datosAcademico',$datosAcademico)->with('datosComision',$datosComision)->with('Mensaje','Faltan Datos');
            }else{
                $notas4=0;
                if($request->input('4e')!=""){
                    $notas4++;
                }
                if($request->input('4mb')!=""){
                    $notas4++;
                }
                if($request->input('4b')!=""){
                    $notas4++;
                }
                if($request->input('4r')!=""){
                    $notas4++;
                }
                if($request->input('4d')!=""){
                    $notas4++;
                }
                if($notas4>1){
                    return view('evaluacion.create')->with('datosAcademico',$datosAcademico)->with('datosComision',$datosComision)->with('Mensaje','Por favor, ingrese solo una nota por actividad');
                }
            }
        }
        if($t5!=0){
            if($request->input('5e')=="" && $request->input('5mb')=="" && $request->input('5b')=="" && $request->input('5r')=="" && $request->input('5d')==""){
                return view('evaluacion.create')->with('datosAcademico',$datosAcademico)->with('datosComision',$datosComision)->with('Mensaje','Faltan Datos');
            }else{
                $notas5=0;
                if($request->input('5e')!=""){
                    $notas5++;
                }
                if($request->input('5mb')!=""){
                    $notas5++;
                }
                if($request->input('5b')!=""){
                    $notas5++;
                }
                if($request->input('5r')!=""){
                    $notas5++;
                }
                if($request->input('5d')!=""){
                    $notas5++;
                }
                if($notas5>1){
                    return view('evaluacion.create')->with('datosAcademico',$datosAcademico)->with('datosComision',$datosComision)->with('Mensaje','Por favor, ingrese solo una nota por actividad');
                }                
            }
        }
        
        //Si se cumple con las validaciones, se calcula la nota de cada ponderacion, para finalmente calcular la nota final.
        $t1c=0;
        if($t1!=0){
            $t1c = ($t1*$request->input('1e'))/100 + ($t1*$request->input('1mb'))/100 + ($t1*$request->input('1b'))/100 + ($t1*$request->input('1r'))/100 + ($t1*$request->input('1d'))/100;
            $t1c = floatval(bcdiv($t1c, '1',1));
        }
        $t2c=0;
        if($t2!=0){
            $t2c = ($t2*$request->input('2e'))/100 + ($t2*$request->input('2mb'))/100 + ($t2*$request->input('2b'))/100 + ($t2*$request->input('2r'))/100 + ($t2*$request->input('2d'))/100;
            $t2c = floatval(bcdiv($t2c, '1',1));    
        }
        $t3c=0;
        if($t3!=0){
            $t3c = ($t3*$request->input('3e'))/100 + ($t3*$request->input('3mb'))/100 + ($t3*$request->input('3b'))/100 + ($t3*$request->input('3r'))/100 + ($t3*$request->input('3d'))/100;
            $t3c = floatval(bcdiv($t3c, '1',1));
        }
        $t4c=0;
        if($t4!=0){
            $t4c = ($t4*$request->input('4e'))/100 + ($t4*$request->input('4mb'))/100 + ($t4*$request->input('4b'))/100 + ($t4*$request->input('4r'))/100 + ($t4*$request->input('4d'))/100;
            $t4c = floatval(bcdiv($t4c, '1',1));
        }
        $t5c=0;
        if($t5!=0){
            $t5c = ($t5*$request->input('5e'))/100 + ($t5*$request->input('5mb'))/100 + ($t5*$request->input('5b'))/100 + ($t5*$request->input('5r'))/100 + ($t5*$request->input('5d'))/100;
            $t5c = floatval(bcdiv($t5c, '1',1));
        }
        $notaFinal=$t1c+$t2c+$t3c+$t4c+$t5c;

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
        $evaluacion->t1c=$t1c;
        if($t1c==0){
            $evaluacion->t1c="";
        }
        $evaluacion->tiempoActividad2=$t2;
        if($t2==0){
            $evaluacion->tiempoActividad2="";
        }
        $evaluacion->e2=$request->input('2e');
        $evaluacion->mb2=$request->input('2mb');
        $evaluacion->b2=$request->input('2b');
        $evaluacion->r2=$request->input('2r');
        $evaluacion->d2=$request->input('2d');
        $evaluacion->t2c=$t2c;
        if($t2c==0){
            $evaluacion->t2c="";
        }
        $evaluacion->tiempoActividad3=$t3;
        if($t3==0){
            $evaluacion->tiempoActividad3="";
        }
        $evaluacion->e3=$request->input('3e');
        $evaluacion->mb3=$request->input('3mb');
        $evaluacion->b3=$request->input('3b');
        $evaluacion->r3=$request->input('3r');
        $evaluacion->d3=$request->input('3d');
        $evaluacion->t3c=$t3c;
        if($t3c==0){
            $evaluacion->t3c="";
        }
        $evaluacion->tiempoActividad4=$t4;
        if($t4==0){
            $evaluacion->tiempoActividad4="";
        }
        $evaluacion->e4=$request->input('4e');
        $evaluacion->mb4=$request->input('4mb');
        $evaluacion->b4=$request->input('4b');
        $evaluacion->r4=$request->input('4r');
        $evaluacion->d4=$request->input('4d');
        $evaluacion->t4c=$t4c;
        if($t4c==0){
            $evaluacion->t4c="";
        }
        $evaluacion->tiempoActividad5=$t5;
        if($t5==0){
            $evaluacion->tiempoActividad5="";
        }
        $evaluacion->e5=$request->input('5e');
        $evaluacion->mb5=$request->input('5mb');
        $evaluacion->b5=$request->input('5b');
        $evaluacion->r5=$request->input('5r');
        $evaluacion->d5=$request->input('5d');
        $evaluacion->t5c=$t5c;
        if($t5c==0){
            $evaluacion->t5c="";
        }
        $evaluacion->nota_final=$notaFinal;
        $evaluacion->comentarios=$request->input('comentarios');
        $evaluacion->save();
        return view('evaluacion.evaluacionTerminada')->with('data',$evaluacion)->with('Mensaje','Evaluación Realizada Correctamente');
    }

    /* Funcion que retorna a la pagina que permite editar una evaluacion anteriormente realizada*/
    public function actualizar($id_evaluacion){
        $data=Evaluacion::where('id','=',$id_evaluacion)->first();
        return view('evaluacion.edit',compact('data'));
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
            }else{
                $notas1=0;
                if($request->input('1e')!=""){
                    $notas1++;
                }
                if($request->input('1mb')!=""){
                    $notas1++;
                }
                if($request->input('1b')!=""){
                    $notas1++;
                }
                if($request->input('1r')!=""){
                    $notas1++;
                }
                if($request->input('1d')!=""){
                    $notas1++;
                }
                if($notas1>1){
                    return view('evaluacion.edit')->with('data',$data)->with('Mensaje','Por favor, ingrese solo una nota por actividad');
                }
            }
        }
        if($t2!=0){
            if($request->input('2e')=="" && $request->input('2mb')=="" && $request->input('2b')=="" && $request->input('2r')=="" && $request->input('2d')==""){
                return view('evaluacion.edit')->with('data',$data)->with('Mensaje','Faltan Datos');
            }else{
                $notas2=0;
                if($request->input('2e')!=""){
                    $notas2++;
                }
                if($request->input('2mb')!=""){
                    $notas2++;
                }
                if($request->input('2b')!=""){
                    $notas2++;
                }
                if($request->input('2r')!=""){
                    $notas2++;
                }
                if($request->input('2d')!=""){
                    $notas2++;
                }
                if($notas2>1){
                    return view('evaluacion.edit')->with('data',$data)->with('Mensaje','Por favor, ingrese solo una nota por actividad');
                }
            }
        }
        if($t3!=0){
            if($request->input('3e')=="" && $request->input('3mb')=="" && $request->input('3b')=="" && $request->input('3r')=="" && $request->input('3d')==""){
                return view('evaluacion.edit')->with('data',$data)->with('Mensaje','Faltan Datos');
            }else{
                $notas3=0;
                if($request->input('3e')!=""){
                    $notas3++;
                }
                if($request->input('3mb')!=""){
                    $notas3++;
                }
                if($request->input('3b')!=""){
                    $notas3++;
                }
                if($request->input('3r')!=""){
                    $notas3++;
                }
                if($request->input('3d')!=""){
                    $notas3++;
                }
                if($notas3>1){
                    return view('evaluacion.edit')->with('data',$data)->with('Mensaje','Por favor, ingrese solo una nota por actividad');
                }                
            }
        }
        if($t4!=0){
            if($request->input('4e')=="" && $request->input('4mb')=="" && $request->input('4b')=="" && $request->input('4r')=="" && $request->input('4d')==""){
                return view('evaluacion.edit')->with('data',$data)->with('Mensaje','Faltan Datos');
            }else{
                $notas4=0;
                if($request->input('4e')!=""){
                    $notas4++;
                }
                if($request->input('4mb')!=""){
                    $notas4++;
                }
                if($request->input('4b')!=""){
                    $notas4++;
                }
                if($request->input('4r')!=""){
                    $notas4++;
                }
                if($request->input('4d')!=""){
                    $notas4++;
                }
                if($notas4>1){
                    return view('evaluacion.edit')->with('data',$data)->with('Mensaje','Por favor, ingrese solo una nota por actividad');
                }
            }
        }
        if($t5!=0){
            if($request->input('5e')=="" && $request->input('5mb')=="" && $request->input('5b')=="" && $request->input('5r')=="" && $request->input('5d')==""){
                return view('evaluacion.edit')->with('data',$data)->with('Mensaje','Faltan Datos');
            }else{
                $notas5=0;
                if($request->input('5e')!=""){
                    $notas5++;
                }
                if($request->input('5mb')!=""){
                    $notas5++;
                }
                if($request->input('5b')!=""){
                    $notas5++;
                }
                if($request->input('5r')!=""){
                    $notas5++;
                }
                if($request->input('5d')!=""){
                    $notas5++;
                }
                if($notas5>1){
                    return view('evaluacion.edit')->with('data',$data)->with('Mensaje','Por favor, ingrese solo una nota por actividad');
                }                
            }
        }
        
        //Si se cumple con las validaciones, se calcula la nueva nota de cada ponderación, junto con la nueva nota final.
        $t1c=0;
        if($t1!=0){
            $t1c = ($t1*$request->input('1e'))/100 + ($t1*$request->input('1mb'))/100 + ($t1*$request->input('1b'))/100 + ($t1*$request->input('1r'))/100 + ($t1*$request->input('1d'))/100;
            $t1c = floatval(bcdiv($t1c, '1',1));
        }
        $t2c=0;
        if($t2!=0){
            $t2c = ($t2*$request->input('2e'))/100 + ($t2*$request->input('2mb'))/100 + ($t2*$request->input('2b'))/100 + ($t2*$request->input('2r'))/100 + ($t2*$request->input('2d'))/100;
            $t2c = floatval(bcdiv($t2c, '1',1));    
        }
        $t3c=0;
        if($t3!=0){
            $t3c = ($t3*$request->input('3e'))/100 + ($t3*$request->input('3mb'))/100 + ($t3*$request->input('3b'))/100 + ($t3*$request->input('3r'))/100 + ($t3*$request->input('3d'))/100;
            $t3c = floatval(bcdiv($t3c, '1',1));
        }
        $t4c=0;
        if($t4!=0){
            $t4c = ($t4*$request->input('4e'))/100 + ($t4*$request->input('4mb'))/100 + ($t4*$request->input('4b'))/100 + ($t4*$request->input('4r'))/100 + ($t4*$request->input('4d'))/100;
            $t4c = floatval(bcdiv($t4c, '1',1));
        }
        $t5c=0;
        if($t5!=0){
            $t5c = ($t5*$request->input('5e'))/100 + ($t5*$request->input('5mb'))/100 + ($t5*$request->input('5b'))/100 + ($t5*$request->input('5r'))/100 + ($t5*$request->input('5d'))/100;
            $t5c = floatval(bcdiv($t5c, '1',1));
        }
        $notaFinal=$t1c+$t2c+$t3c+$t4c+$t5c;

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
        $evaluacion->t1c=$t1c;
        if($t1c==0){
            $evaluacion->t1c="";
        }
        $evaluacion->tiempoActividad2=$t2;
        if($t2==0){
            $evaluacion->tiempoActividad2="";
        }
        $evaluacion->e2=$request->input('2e');
        $evaluacion->mb2=$request->input('2mb');
        $evaluacion->b2=$request->input('2b');
        $evaluacion->r2=$request->input('2r');
        $evaluacion->d2=$request->input('2d');
        $evaluacion->t2c=$t2c;
        if($t2c==0){
            $evaluacion->t2c="";
        }
        $evaluacion->tiempoActividad3=$t3;
        if($t3==0){
            $evaluacion->tiempoActividad3="";
        }
        $evaluacion->e3=$request->input('3e');
        $evaluacion->mb3=$request->input('3mb');
        $evaluacion->b3=$request->input('3b');
        $evaluacion->r3=$request->input('3r');
        $evaluacion->d3=$request->input('3d');
        $evaluacion->t3c=$t3c;
        if($t3c==0){
            $evaluacion->t3c="";
        }
        $evaluacion->tiempoActividad4=$t4;
        if($t4==0){
            $evaluacion->tiempoActividad4="";
        }
        $evaluacion->e4=$request->input('4e');
        $evaluacion->mb4=$request->input('4mb');
        $evaluacion->b4=$request->input('4b');
        $evaluacion->r4=$request->input('4r');
        $evaluacion->d4=$request->input('4d');
        $evaluacion->t4c=$t4c;
        if($t4c==0){
            $evaluacion->t4c="";
        }
        $evaluacion->tiempoActividad5=$t5;
        if($t5==0){
            $evaluacion->tiempoActividad5="";
        }
        $evaluacion->e5=$request->input('5e');
        $evaluacion->mb5=$request->input('5mb');
        $evaluacion->b5=$request->input('5b');
        $evaluacion->r5=$request->input('5r');
        $evaluacion->d5=$request->input('5d');
        $evaluacion->t5c=$t5c;
        if($t5c==0){
            $evaluacion->t5c="";
        }
        $evaluacion->nota_final=$notaFinal;
        $evaluacion->comentarios=$request->input('comentarios');
        $evaluacion->save();
        return view('evaluacion.evaluacionTerminada')->with('data',$evaluacion)->with('Mensaje','Evaluación Editada Correctamente');
    }
}