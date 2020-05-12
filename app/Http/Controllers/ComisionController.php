<?php

namespace App\Http\Controllers;

use App\Comision;
use App\facultad;
use Illuminate\Http\Request;

class ComisionController extends Controller{

    /* Funcion que retorna a la pagina principal de la pestaña Comisiones, junto con los datos de las comisiones de la facultad del usuario*/
    public function index(Request $request){
        $request->user()->authorizeRoles(['Admin','Secretario']); 
    	$datos=Comision::where('facultad','=',auth()->user()->facultad)->paginate(5);
    	return view('comision.index',compact('datos'));
    }

    /* Funcion que retorna a la pagina que permite crear una nueva comision*/
    public function create(Request $request){
        $request->user()->authorizeRoles(['Admin','Secretario']); 
        $facultades=facultad::all();
    	return view('comision.create',compact('facultades'));
    }

    /* Funcion que recibe los datos del formulario para crear una nueva comision, para posteriormente ingresarla a la base de datos*/
    public function store(Request $request){
        $request->user()->authorizeRoles(['Admin','Secretario']); 
    	$campos=[
            'año' => 'required|string|min:2',
            'facultad' => 'required|string|min:2',
            'rut_academico' => 'required|string|max:100',
            'decano' => 'required|string|max:100',
            'miembro1' => 'required|string|max:100',
            'miembro2' => 'required|string|max:100',
            'fecha_pie' => 'required|string|max:100'
        ];
        $Mensaje=["required"=>'El :attribute es requerido'];
        $this->validate($request,$campos,$Mensaje);
        $yaExiste=Comision::where('facultad','=',$request->input('facultad'))->where('año','=',$request->input('año'))->get();
        if($yaExiste!="[]"){
            return redirect('añadirComision')->with('Mensaje','Ya hay una comision configurada para el año ingresado');
        }else{
            $datosComision=request()->except('_token');
            Comision::insert($datosComision);
            return redirect('comisiones')->with('Mensaje','Comisión agregada con éxito');
        }
    }

    /* Funcion que retorna una vista con los datos de la comision buscada mediante el id*/
    public function buscar(Request $request){
        $request->user()->authorizeRoles(['Admin','Secretario']); 
    	$id_comision=request()->input('id_comision');
    	$datos=Comision::where('id_comision','=',$id_comision)->get();
    	return view('comision.buscar',compact('datos'));
    }

    /* Funcion que retorna a la pagina que permite editar la informacion de una comision en particular*/
    public function edit(Request $request, $id_comision){
        $request->user()->authorizeRoles(['Admin','Secretario']); 
    	$comision=Comision::findOrFail($id_comision);
        $facultades=facultad::all();
    	return view('comision.edit',compact('comision','facultades'));
    }

    /* Funcion que recibe los datos del formulario para editar una comision, para posteriormente ingresar a la base de datos la 
       información actualizada*/
    public function update(Request $request, $id_comision){
        $request->user()->authorizeRoles(['Admin','Secretario']); 
    	$datosComision=request()->except('_token');
        $yaExiste=Comision::where('año','=',$request->input('año'))->where('facultad','=',$request->input('facultad'))->first();
        if($yaExiste->id_comision!=$id_comision && $yaExiste->estado=='ACTIVO'){
            return redirect('comision/'.$id_comision.'/edit')->with('Mensaje','Ya existe una comision para el periodo seleccionado');
        }else{
            Comision::where('id_comision','=',$id_comision)->update($datosComision);
            return redirect('comisiones')->with('Mensaje','Comisión actualizada con éxito');
        }
    }

}
