<?php

namespace App\Http\Controllers;

use App\Departamento;
use App\Facultad;
use Illuminate\Http\Request;

class DepartamentoController extends Controller{

    /* Funcion que retorna a la pagina principal de la pestaña Departamento, junto con los datos de los departamentos existentes*/
    public function index(Request $request){
        $color=$request->user()->color;
        $request->user()->authorizeRoles(['Admin']);
        $datos=Departamento::where('facultad','=',auth()->user()->facultad)->paginate(3);
        return view('departamento.index',compact('datos','color'));
    }

    /* Funcion que retorna a la pagina que permite crear un nuevo departamento*/
    public function create(Request $request){
        $request->user()->authorizeRoles(['Admin']);
        $facultades=facultad::all();
        $color=$request->user()->color;
    	return view('departamento.create',compact('facultades','color'));
    }

    /* Funcion que recibe los datos del formulario para crear un nuevo departamento, para posteriormente ingresarlo a la base de datos*/
    public function store(Request $request){
        $request->user()->authorizeRoles(['Admin']);
    	$campos=[
            'nombre' => 'required|string|min:2',
            'facultad' => 'required|string|min:2'
        ];
        $Mensaje=["required"=>'El campo :attribute es requerido'];
        $this->validate($request,$campos,$Mensaje);
        $datosDepartamento=request()->except('_token');
        Departamento::insert($datosDepartamento);
        return redirect('admin/departamentos')->with('Mensaje','Departamento agregado correctamente');
    }
 
    /* Funcion que retorna a la pagina que permite editar la informacion de un departameno en particular*/
    public function edit(Request $request, $cod_departamento){
        $request->user()->authorizeRoles(['Admin']);
    	$departamento=Departamento::findOrFail($cod_departamento);
        $facultades=facultad::all();
        $color=$request->user()->color;
    	return view('departamento.edit',compact('departamento','facultades','color'));
    }

    /* Funcion que recibe los datos del formulario para editar un departamento, para posteriormente ingresar a la base de datos la 
       información actualizada*/
    public function update(Request $request, $cod_departamento){
        $request->user()->authorizeRoles(['Admin']);
    	$datosDepartamento=request()->except('_token');
    	Departamento::where('cod_departamento','=',$cod_departamento)->update($datosDepartamento);
    	return redirect('admin/departamentos')->with('Mensaje','Departamento actualizado correctamente');
    }

    /* Funcion que retorna una vista con los datos del departamento buscado mediante el codigo*/
    public function buscar(Request $request){
        $request->user()->authorizeRoles(['Admin']);
    	$cod_departamento=request()->input('cod_departamento');
    	$datos=Departamento::where('cod_departamento','=',$cod_departamento)->get();
    	return view('departamento.buscar',compact('datos'));
    }

    public function depasporfacu(Request $request,$nombre_facultad){
        $request->user()->authorizeRoles(['Admin']);
        if($nombre_facultad != "Todas las facultades"){
            $departamentos = Departamento::where('facultad','=',$nombre_facultad)->get();
            return $departamentos;
        }
        else{
            $departamentos = Departamento::all();
            return $departamentos;
        }
    }

}
