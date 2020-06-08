<?php

namespace App\Http\Controllers;

use App\Periodo;
use Illuminate\Http\Request;

class PeriodoController extends Controller{

    /* Funcion que retorna a la pagina principal de la pestaña Periodo, junto con los datos de periodos que se puedan encontrar activos*/
    public function index(Request $request){
		$request->user()->authorizeRoles(['Admin']);
        $activos=Periodo::where('estado','=','ACTIVO')->get();
        return view('periodo.index',compact('activos'));
    }

    /* Funcion que recibe los datos de la pagina principal de la pestaña Periodo. Recibe los datos del periodo a seleccionar y la accion a
       ejecutar, la cual puede ser activar o desactivar dicho periodo*/
    public function accion(Request $request){ 
		$request->user()->authorizeRoles(['Admin']);
		$activos=Periodo::where('estado','=','ACTIVO')->get();
    	/*Validación de que se ingresa el campo*/
    	$campos=[
            'year' => 'required|string|min:4'
        ];
        $Mensaje=["required"=>'El :attribute es requerido'];
        $this->validate($request,$campos,$Mensaje);
    	$accion=$request->input('accion');
    	/*Inicio proceso de accion*/
    	$año=$request->input('year');
    	$datosPeriodo=Periodo::where('año','=',$año)->get();
    	if($datosPeriodo=='[]'){
    		$nuevoPeriodo=new Periodo();
    		$nuevoPeriodo->año=$año;
    		$nuevoPeriodo->save();
    	}
    	$estado=Periodo::where('año','=',$año)->get('estado')->first();
    	if($accion=="Iniciar Periodo"){
    		if($estado->estado=="INACTIVO"){
				if($activos->count()<1){
					Periodo::where('año','=',$año)->update(['estado'=>"ACTIVO"]);
					return redirect('admin/periodos')->with('Mensaje','El periodo ahora está activo');
				}else{
					return redirect('admin/periodos')->with('Mensaje','No se pueden tener mas de un periodo activo');
				}
    		}else{
    			return redirect('admin/periodos')->with('Mensaje','El periodo ya se encuentra activo');
    		}
    	}else{
    		if($estado->estado=="INACTIVO"){
    			return redirect('admin/periodos')->with('Mensaje','El periodo ya se encuentra inactivo');
    		}else{
    			Periodo::where('año','=',$año)->update(['estado'=>"INACTIVO"]);
    			return redirect('admin/periodos')->with('Mensaje','El periodo ahora está inactivo');
    		}
    	}
    }
}
