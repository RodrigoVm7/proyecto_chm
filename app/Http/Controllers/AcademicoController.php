<?php

namespace App\Http\Controllers;

use App\Academico;
use App\Departamento;
use Illuminate\Http\Request;

class AcademicoController extends Controller{

    /* Funcion que retorna a la pagina principal de la pestaña academicos, junto con los datos de academicos de la facultad del usuario*/
    public function index(Request $request){
        $color=$request->user()->color;
        $request->user()->authorizeRoles(['Admin','Secretario']); 
        $datos=Academico::where('facultad','=',auth()->user()->facultad)->paginate(3);
    	return view('academico.index',compact('datos','color'));
    }

    /* Funcion que retorna a la pagina que permite crear un nuevo academico*/
    public function create(Request $request){
        $request->user()->authorizeRoles(['Admin','Secretario']); 
        $facultad=auth()->user()->facultad;
        $departamentos=Departamento::where('facultad','=',$facultad)->get();
        $color=$request->user()->color;
    	return view('academico.create',compact('departamentos','facultad','color'));
    }

    /* Funcion que recibe los datos del formulario para crear un nuevo academico, para posteriormente ingresarlo a la base de datos*/
    public function store(Request $request){
        $request->user()->authorizeRoles(['Admin','Secretario']);
    	$campos=[
            'rut' => 'required|numeric|min:8',
            'nombre' => 'required|string|max:100',
            'apellido' => 'required|string|max:100',
            'titulo' => 'required|string|max:100',
            'grado_academico' => 'required|string|max:100',
            'departamento' => 'required|string|min:2',
            'categoria' => 'required|string|min:2',
            'horas_contrato' => 'required|string|max:100',
            'tipo_planta' => 'required|string|max:100',
        ];
        $Mensaje=["required"=>'El :attribute es requerido'];
        $this->validate($request,$campos,$Mensaje);
    	$datosAcademico=request()->except('_token');
    	Academico::insert($datosAcademico);
        return redirect('academicos')->with('Mensaje','Académico agregado con éxito');
    }

    /* Funcion que retorna una vista con los datos del academico buscado mediante el rut*/
    public function buscar(Request $request){
        $request->user()->authorizeRoles(['Admin','Secretario']); 
        $color = $request->user()->color;
    	$rut=request()->input('rut');
    	$datos=Academico::where('rut','=',$rut)->get();
    	return view('academico.buscar',compact('datos','color'));
    }

    /* Funcion que retorna a la pagina que permite editar la informacion de un academico en particular*/
    public function edit(Request $request, $rut){
        $request->user()->authorizeRoles(['Admin','Secretario']); 
    	$academico=Academico::findOrFail($rut);
        $departamentos=Departamento::where('facultad','=',auth()->user()->facultad)->get();
        $facultad=auth()->user()->facultad;
        $color=$request->user()->color;
    	return view('academico.edit',compact('academico','departamentos','facultad','color'));
    }

    /* Funcion que recibe los datos del formulario para editar un academico, para posteriormente ingresar a la base de datos la 
       información actualizada*/
    public function update(Request $request, $rut){
        $request->user()->authorizeRoles(['Admin','Secretario']); 
    	$datosAcademico=request()->except('_token');
    	Academico::where('rut','=',$rut)->update($datosAcademico);
    	return redirect('academicos')->with('Mensaje','Académico actualizado con éxito');
    }
}
