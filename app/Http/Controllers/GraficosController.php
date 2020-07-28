<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Evaluacion;
use App\Periodo;
use App\Facultad;
use App\Departamento;
use App\Academico;

class GraficosController extends Controller{

    /* Funcion que retorna a la pagina principal de la pestaña Graficos para el usuario Administradorr, junto con los datos de periodos, facultades, departamentos y academicos disponibles; asi como tambien los datos para graficar*/
	public function index(Request $request){
		$request->user()->authorizeRoles(['Admin']);
		$evaluaciones=Evaluacion::all();
		$datosGrafico = new \stdClass;
		$datosGrafico->totalActividad1=0;
		$datosGrafico->totalActividad2=0;
		$datosGrafico->totalActividad3=0;
		$datosGrafico->totalActividad4=0;
		$datosGrafico->totalActividad5=0;

		foreach($evaluaciones as $dato){
			if($dato->tiempoActividad1!=""){
				$datosGrafico->totalActividad1=$datosGrafico->totalActividad1+$dato->tiempoActividad1;
			}
			if($dato->tiempoActividad2!=""){
				$datosGrafico->totalActividad2=$datosGrafico->totalActividad2+$dato->tiempoActividad2;
			}
			if($dato->tiempoActividad3!=""){
				$datosGrafico->totalActividad3=$datosGrafico->totalActividad3+$dato->tiempoActividad3;
			}
			if($dato->tiempoActividad4!=""){
				$datosGrafico->totalActividad4=$datosGrafico->totalActividad4+$dato->tiempoActividad4;
			}
			if($dato->tiempoActividad5!=""){
				$datosGrafico->totalActividad5=$datosGrafico->totalActividad5+$dato->tiempoActividad5;
			}
		}
		
		$periodos=Periodo::where('estado','=','INACTIVO')->get();
		$facultades=Facultad::all();
		$departamentos=Departamento::all();
		$academicos=Academico::where('facultad','=',auth()->user()->facultad)->paginate(5);
		$seleccionado = new \stdClass;
		$seleccionado->periodo="";
		$seleccionado->facultad="";
		$seleccionado->departamento="";
		$color=$request->user()->color;
		if($evaluaciones=="[]"){
			return view('graficos.index',compact('datosGrafico','periodos','facultades','departamentos','seleccionado','academicos','color'))->with('Mensaje','No hay datos para mostrar');
		}else{
			return view('graficos.index',compact('datosGrafico','periodos','facultades','departamentos','seleccionado','academicos','color'));
		}
	}

	/* Función  que recibe datos de la vista del Administrador. Recibe los parametros periodo y/o departamento y/o facultad, para modificar
	   el gráfico de acuerdo a los nuevos filtros.*/
	public function graficar(Request $request){
		$request->user()->authorizeRoles(['Admin']);
		$color=$request->user()->color;
		$seleccionado = new \stdClass;
		
		if($request->input('periodo')!="" && $request->input('facultad')=="" && $request->input('departamento')==""){	//Solo Periodo
			$evaluaciones=Evaluacion::where('año','=',$request->input('periodo'))->get();
			$seleccionado->periodo=$request->input('periodo');
			$seleccionado->facultad="Todas las Facultades";
			$seleccionado->departamento="Todos los Departamentos";
			$departamentos=Departamento::all();
		}elseif($request->input('facultad')!="" && $request->input('periodo')=="" && $request->input('departamento')==""){	//Solo Facultad
			$evaluaciones=Evaluacion::where('facultad','=',$request->input('facultad'))->get();
			$seleccionado->periodo="";
			$seleccionado->facultad=$request->input('facultad');
			$seleccionado->departamento="Todos los Departamentos";
			$departamentos=Departamento::where('facultad','=',$request->input('facultad'))->get();
		}elseif($request->input('departamento')!="" && $request->input('periodo')=="" && $request->input('facultad')==""){	//Solo Dpto.
			$evaluaciones=Evaluacion::where('departamento_academico','=',$request->input('departamento'))->get();
			$seleccionado->periodo="";
			$seleccionado->facultad="Todas las Facultades";
			$seleccionado->departamento=$request->input('departamento');
			$departamentos=Departamento::all();
		}elseif($request->input('periodo')!="" && $request->input('facultad')!="" && $request->input('departamento')==""){	//Periodo Facultad
			$evaluaciones=Evaluacion::where('año','=',$request->input('periodo'))->where('facultad','=',$request->input('facultad'))->get();
			$seleccionado->periodo=$request->input('periodo');
			$seleccionado->facultad=$request->input('facultad');
			$seleccionado->departamento="Todos los Departamentos";
			$departamentos=Departamento::where('facultad','=',$request->input('facultad'))->get();
		}elseif($request->input('periodo')!="" && $request->input('departamento')!="" && $request->input('facultad')==""){	//Periodo Dpto.
			$evaluaciones=Evaluacion::where('año','=',$request->input('periodo'))->where('departamento_academico','=',$request->input('departamento'))->get();
			$seleccionado->periodo=$request->input('periodo');
			$seleccionado->facultad="Todas las Facultades";
			$seleccionado->departamento=$request->input('departamento');
			$departamentos=Departamento::all();
		}elseif($request->input('facultad')!="" && $request->input('departamento')!="" && $request->input('periodo')==""){	//facultad dpto.
			$evaluaciones=Evaluacion::where('facultad','=',$request->input('facultad'))->where('departamento_academico','=',$request->input('departamento'))->get();
			$seleccionado->periodo="";
			$seleccionado->facultad=$request->input('facultad');
			$seleccionado->departamento=$request->input('departamento');
			$departamentos=Departamento::where('facultad','=',$request->input('facultad'))->get();
		}elseif($request->input('facultad')=="" && $request->input('departamento')=="" && $request->input('periodo')==""){	//Todos los parametros vacios. 
			$evaluaciones=Evaluacion::all();
			$seleccionado->periodo="";
			$seleccionado->facultad="Todas las Facultades";
			$seleccionado->departamento="Todos los Departamentos";
			$departamentos=Departamento::all();
		}
		else{	//Todos los parametros ingresados
			$evaluaciones=Evaluacion::where('año','=',$request->input('periodo'))->where('facultad','=',$request->input('facultad'))->where('departamento_academico','=',$request->input('departamento'))->get();
			$seleccionado->periodo=$request->input('periodo');
			$seleccionado->facultad=$request->input('facultad');
			$seleccionado->departamento=$request->input('departamento');
			$departamentos=Departamento::where('facultad','=',$request->input('facultad'))->get();
		}

		$datosGrafico = new \stdClass;
		$datosGrafico->totalActividad1=0;
		$datosGrafico->totalActividad2=0;
		$datosGrafico->totalActividad3=0;
		$datosGrafico->totalActividad4=0;
		$datosGrafico->totalActividad5=0;

		foreach($evaluaciones as $dato){
			if($dato->tiempoActividad1!=""){
				$datosGrafico->totalActividad1=$datosGrafico->totalActividad1+$dato->tiempoActividad1;
			}
			if($dato->tiempoActividad2!=""){
				$datosGrafico->totalActividad2=$datosGrafico->totalActividad2+$dato->tiempoActividad2;
			}
			if($dato->tiempoActividad3!=""){
				$datosGrafico->totalActividad3=$datosGrafico->totalActividad3+$dato->tiempoActividad3;
			}
			if($dato->tiempoActividad4!=""){
				$datosGrafico->totalActividad4=$datosGrafico->totalActividad4+$dato->tiempoActividad4;
			}
			if($dato->tiempoActividad5!=""){
				$datosGrafico->totalActividad5=$datosGrafico->totalActividad5+$dato->tiempoActividad5;
			}
		}

		$facultades=Facultad::all();
		$periodos=Periodo::all();
		$academicos=Academico::where('facultad','=',auth()->user()->facultad)->paginate(5);
		if($evaluaciones=="[]"){
			return view('graficos.index',compact('datosGrafico','periodos','facultades','departamentos','seleccionado','academicos','color'))->with('Mensaje','No hay datos para mostrar');
		}else{
			return view('graficos.index',compact('datosGrafico','periodos','facultades','departamentos','seleccionado','academicos','color'));
		}
	}

	/* Funcion que retorna a la vista con informacion detallada de un academico en particular. En dicha vista se presentan dos graficos, uno
	con el tiempo total destinado a cada actividad, y otro con las notas finales obtenidas por el academico*/
	public function graficoAcademico(Request $request, $rut){
        $request->user()->authorizeRoles(['Admin','Secretario']); 
		$evaluaciones=Evaluacion::where('rut_academico','=',$rut)->get();
		$color=$request->user()->color;
		$permiso=auth()->user()->permiso;
		
		if($evaluaciones!="[]"){
			$datosGrafico = new \stdClass;
			$datosGrafico->nombre = $evaluaciones[0]->nombre_academico." ".$evaluaciones[0]->apellido_academico;
			$datosGrafico->rut= $evaluaciones[0]->rut_academico;
			$datosGrafico->totalActividad1=0;
			$datosGrafico->totalActividad2=0;
			$datosGrafico->totalActividad3=0;
			$datosGrafico->totalActividad4=0;
			$datosGrafico->totalActividad5=0;

			foreach($evaluaciones as $dato){
				if($dato->tiempoActividad1!=""){
					$datosGrafico->totalActividad1=$datosGrafico->totalActividad1+$dato->tiempoActividad1;
				}
				if($dato->tiempoActividad2!=""){
					$datosGrafico->totalActividad2=$datosGrafico->totalActividad2+$dato->tiempoActividad2;
				}
				if($dato->tiempoActividad3!=""){
					$datosGrafico->totalActividad3=$datosGrafico->totalActividad3+$dato->tiempoActividad3;
				}
				if($dato->tiempoActividad4!=""){
					$datosGrafico->totalActividad4=$datosGrafico->totalActividad4+$dato->tiempoActividad4;
				}
				if($dato->tiempoActividad5!=""){
					$datosGrafico->totalActividad5=$datosGrafico->totalActividad5+$dato->tiempoActividad5;
				}
			}
			$periodos=Periodo::where('estado','=','INACTIVO')->get();
			$seleccionado="";
			$calificacionesFinales=Evaluacion::where('rut_academico','=',$rut)->select('año','nota_final')->get();
			return view('graficos.graficoUsuario',compact('datosGrafico','periodos','seleccionado','calificacionesFinales','permiso','color'));
		}else{
			if($permiso!='secretario'){
				return redirect('admin/graficos')->with('Mensaje','No hay datos para el académico seleccionado');
			}else{
				return redirect('secretario/graficos')->with('Mensaje','No hay datos para el académico seleccionado');
			}
		}
	}

	/* Funcion que recibe datos de la vista donde se presenta informacion junto con graficos de un academico. Recibe el parametro periodo, 
	   para modificar ambos graficos de acuerdo al nuevo filtro*/
	public function graficoAcademicoPeriodo(Request $request){
		$request->user()->authorizeRoles(['Admin']);
		$evaluacion=Evaluacion::where('rut_academico','=',$request->input('rut'))->where('año','=',$request->input('periodo'))->first();
		if($evaluacion==""){
			return redirect('graficoAcademico/'.$request->input('rut'))->with('Mensaje','No hay datos para el periodo seleccionado');
		}else{
			$datosGrafico = new \stdClass;
			$datosGrafico->nombre = $evaluacion->nombre_academico." ".$evaluacion->apellido_academico;
			$datosGrafico->rut= $evaluacion->rut_academico;
			$datosGrafico->totalActividad1=0;
			$datosGrafico->totalActividad2=0;
			$datosGrafico->totalActividad3=0;
			$datosGrafico->totalActividad4=0;
			$datosGrafico->totalActividad5=0;
			if($evaluacion->tiempoActividad1!=""){
				$datosGrafico->totalActividad1=$evaluacion->tiempoActividad1;
			}
			if($evaluacion->tiempoActividad2!=""){
				$datosGrafico->totalActividad2=$evaluacion->tiempoActividad2;
			}
			if($evaluacion->tiempoActividad3!=""){
				$datosGrafico->totalActividad3=$evaluacion->tiempoActividad3;
			}
			if($evaluacion->tiempoActividad4!=""){
				$datosGrafico->totalActividad4=$evaluacion->tiempoActividad4;
			}
			if($evaluacion->tiempoActividad5!=""){
				$datosGrafico->totalActividad5=$evaluacion->tiempoActividad5;
			}
			$periodos=Periodo::where('estado','=','INACTIVO')->get();
			$seleccionado=$request->input('periodo');
			$calificacionesFinales=Evaluacion::where('rut_academico','=',$request->input('rut'))->select('año','nota_final')->get();
			$permiso=auth()->user()->permiso;
			return view('graficos.graficoUsuario',compact('datosGrafico','periodos','seleccionado','calificacionesFinales','permiso'));
		}
	}

	/* Funcion que retorna a la pagina principal de la pestaña Graficos para el usuario Secretario, junto con los datos de periodos,
	   departamentos y academicos disponibles; asi como tambien los datos para el primer gráfico*/
	public function secretarioIndex(Request $request){
		$request->user()->authorizeRoles(['Admin','Secretario']); 
		$evaluaciones=Evaluacion::where('facultad','=',auth()->user()->facultad)->get();
		$datosGrafico = new \stdClass;
		$datosGrafico->totalActividad1=0;
		$datosGrafico->totalActividad2=0;
		$datosGrafico->totalActividad3=0;
		$datosGrafico->totalActividad4=0;
		$datosGrafico->totalActividad5=0;

		foreach($evaluaciones as $dato){
			if($dato->tiempoActividad1!=""){
				$datosGrafico->totalActividad1=$datosGrafico->totalActividad1+$dato->tiempoActividad1;
			}
			if($dato->tiempoActividad2!=""){
				$datosGrafico->totalActividad2=$datosGrafico->totalActividad2+$dato->tiempoActividad2;
			}
			if($dato->tiempoActividad3!=""){
				$datosGrafico->totalActividad3=$datosGrafico->totalActividad3+$dato->tiempoActividad3;
			}
			if($dato->tiempoActividad4!=""){
				$datosGrafico->totalActividad4=$datosGrafico->totalActividad4+$dato->tiempoActividad4;
			}
			if($dato->tiempoActividad5!=""){
				$datosGrafico->totalActividad5=$datosGrafico->totalActividad5+$dato->tiempoActividad5;
			}
		}
		$periodos=Periodo::where('estado','=','INACTIVO')->get();
		$departamentos=Departamento::where('facultad','=',auth()->user()->facultad)->get();
		$seleccionado = new \stdClass;
		$seleccionado->periodo="";
		$seleccionado->departamento="";

		$academicos=Academico::where('facultad','=',auth()->user()->facultad)->paginate(5);
		if($evaluaciones=="[]"){
			return view('graficos.secretarioIndex',compact('datosGrafico','periodos','departamentos','seleccionado','academicos'))->with('Mensaje','No hay datos para mostrar');
		}else{
			return view('graficos.secretarioIndex',compact('datosGrafico','periodos','departamentos','seleccionado','academicos'));
		}
	}

	/* Función  que recibe datos de la vista del Secretario. Recibe los parametros periodo y/o departamento, para modificar
	   el o ambos gráficos de acuerdo a los nuevos filtros.*/
	public function secretarioGraficar(Request $request){
		$request->user()->authorizeRoles(['Admin','Secretario']); 
		$seleccionado = new \stdClass;

		if($request->input('periodo')!="" && $request->input('departamento')==""){	//solo periodo
			$evaluaciones=Evaluacion::where('facultad','=',auth()->user()->facultad)->where('año','=',$request->input('periodo'))->get();
			$seleccionado->periodo=$request->input('periodo');
			$seleccionado->departamento="";
		}elseif($request->input('departamento')!="" && $request->input('periodo')==""){	//solo departamento
			$evaluaciones=Evaluacion::where('facultad','=',auth()->user()->facultad)->where('departamento_academico','=',$request->input('departamento'))->get();
			$seleccionado->periodo="";
			$seleccionado->departamento=$request->input('departamento');
		}else{	//Ambos parametros
			$evaluaciones=Evaluacion::where('facultad','=',auth()->user()->facultad)->where('año','=',$request->input('periodo'))->where('departamento_academico','=',$request->input('departamento'))->get();
			$seleccionado->periodo=$request->input('periodo');
			$seleccionado->departamento=$request->input('departamento');
		}

		$datosGrafico = new \stdClass;
		$datosGrafico->totalActividad1=0;
		$datosGrafico->totalActividad2=0;
		$datosGrafico->totalActividad3=0;
		$datosGrafico->totalActividad4=0;
		$datosGrafico->totalActividad5=0;

		foreach($evaluaciones as $dato){
			if($dato->tiempoActividad1!=""){
				$datosGrafico->totalActividad1=$datosGrafico->totalActividad1+$dato->tiempoActividad1;
			}
			if($dato->tiempoActividad2!=""){
				$datosGrafico->totalActividad2=$datosGrafico->totalActividad2+$dato->tiempoActividad2;
			}
			if($dato->tiempoActividad3!=""){
				$datosGrafico->totalActividad3=$datosGrafico->totalActividad3+$dato->tiempoActividad3;
			}
			if($dato->tiempoActividad4!=""){
				$datosGrafico->totalActividad4=$datosGrafico->totalActividad4+$dato->tiempoActividad4;
			}
			if($dato->tiempoActividad5!=""){
				$datosGrafico->totalActividad5=$datosGrafico->totalActividad5+$dato->tiempoActividad5;
			}
		}
		$periodos=Periodo::where('estado','=','INACTIVO')->get();
		$departamentos=Departamento::where('facultad','=',auth()->user()->facultad)->get();
		$academicos=Academico::where('facultad','=',auth()->user()->facultad)->paginate(5);

		if($evaluaciones=="[]"){
			return view('graficos.secretarioIndex',compact('datosGrafico','periodos','departamentos','seleccionado','evaluaciones','academicos'))->with('Mensaje','No hay datos para mostrar');
		}else{
			return view('graficos.secretarioIndex',compact('datosGrafico','periodos','departamentos','seleccionado','evaluaciones','academicos'));
		}
	}

}
