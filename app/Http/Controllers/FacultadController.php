<?php

namespace App\Http\Controllers;

use App\Facultad;
use Illuminate\Http\Request;

class FacultadController extends Controller{

    /* Función que retorna a la pagina principal de la pestaña Facultad, junto con los datos de las Facultades existentes*/
    public function index(Request $request){
        $color=$request->user()->color;
        $request->user()->authorizeRoles(['Admin']);
    	$datos=Facultad::paginate(3);
    	return view('facultad.index',compact('datos','color'));
    }

    /* Funcion que retorna a la pagina que permite crear una nueva Facultad*/
    public function create(Request $request){
        $request->user()->authorizeRoles(['Admin']);
        $color=$request->user()->color;
    	return view('facultad.create',compact('color'));
    }

    /* Funcion que recibe los datos del formulario para crear una nueva facultad, para posteriormente ingresarla a la base de datos*/
    public function store(Request $request){
        $request->user()->authorizeRoles(['Admin']);
    	$campos=[
            'nombre' => 'required|string|min:2',
            'decano' => 'required|string|max:100'
        ];
        $Mensaje=["required"=>'El campo :attribute es requerido'];
        $this->validate($request,$campos,$Mensaje);
        $datosFacultad=request()->except('_token');
        Facultad::insert($datosFacultad);
        return redirect('admin/facultades')->with('Mensaje','Facultad agregada con éxito');
    }

    /* Funcion que retorna a la pagina que permite editar la informacion de una facultad en particular*/
    public function edit(Request $request,$cod_facultad){
        $request->user()->authorizeRoles(['Admin']);
    	$facultad=Facultad::findOrFail($cod_facultad);
        $color=$request->user()->color;
    	return view('facultad.edit',compact('facultad','color'));
    }

    /* Funcion que recibe los datos del formulario para editar una facultad, para posteriormente ingresar a la base de datos la 
       información actualizada*/
    public function update(Request $request, $cod_facultad){
        $request->user()->authorizeRoles(['Admin']);
    	$datosFacultad=request()->except('_token');
    	Facultad::where('cod_facultad','=',$cod_facultad)->update($datosFacultad);
    	return redirect('admin/facultades')->with('Mensaje','Facultad actualizada con éxito');
    }

    /* Funcion que retorna una vista con los datos de la facultad buscada mediante el codigo*/
    public function buscar(Request $request){
        $request->user()->authorizeRoles(['Admin']);
        $color = $request->user()->color;
    	$nom_facultad=request()->input('nom_facultad');
    	$datos=Facultad::where('nombre','=',$nom_facultad)->get();
    	return view('facultad.buscar',compact('datos','color'));
    }

}
