<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\EvaluacionesExport;

use App\Periodo;
use App\Evaluacion;
use App\Firmas;

class ReportesController extends Controller{

    /* Función que retorna a la página principal de la pestaña Reportes, junto con los datos de los periodos disponibles. */
    public function index(){
        $periodos=Periodo::where('estado','=','INACTIVO')->paginate(5);
        $subida=0;
        return view('reportes.index',compact('periodos','subida'));
    }

    /* Función que se encarga de recolectar información de las evaluaciones del periodo seleccionado, para posteriormente generar
       un archivo en formato PDF con dicha información, el cuál es descargado por el usuario. */
    public function generarPDF($periodo){
        $datos=Evaluacion::where('año','=',$periodo)->where('facultad','=',auth()->user()->facultad)->get();
        if($datos=="[]"){
            return redirect('reportes')->with('Mensaje','Esta Facultad No Presenta Evaluaciones Para El Periodo Seleccionado');
        }else{
            $pdf=PDF::loadView('reportes.pdf',compact('datos'))->setPaper('a4','landscape');
            return $pdf->download('reporte-'.$periodo.'.pdf');
        }
    }

    /* Función que se encarga de recolectar información de las evaluaciones del periodo seleccionado, para posteriormente generar
       un archivo en formato Excel con dicha información, el cuál es descargado por el usuario. */
    public function generarExc($periodo){
        $datos=Evaluacion::where('año','=',$periodo)->where('facultad','=',auth()->user()->facultad)->get();
        if($datos=="[]"){
            return redirect('reportes')->with('Mensaje','Esta Facultad No Presenta Evaluaciones Para El Periodo Seleccionado');
        }else{
            return Excel::download(new EvaluacionesExport($periodo), 'reporte-'.$periodo.'.xlsx');
        }
    }

    /* Funcion que se encarga de habilitar el botón que permite subir un archivo con firmas junto a cada periodo disponible */
    public function habilitarSubida(Request $request){
        $periodos=Periodo::where('estado','=','INACTIVO')->paginate(5);
        $subida=1;
        return view('reportes.index',compact('periodos','subida'));
    }

    /* Función que retorna a la página que permite subir un archivo con firmas en un periodo determinado*/
    public function subirFirma($periodo){
        return view('reportes.firmas',compact('periodo'));
    }

    /* Función que recibe la información del formulario para subir un archivo con firmas, para posteriormente ingresarla a la base de datos*/
    public function guardarFirma(Request $request){
        $yaExiste=Firmas::where('periodo','=',$request->periodo)->where('facultad','=',auth()->user()->facultad)->first();
        $direccion=$request->file('file')->store('public');
        if($yaExiste==""){
            $firma = new Firmas();
            $firma->periodo=$request->periodo;
            $firma->facultad=auth()->user()->facultad;
            $firma->archivo=substr($direccion, 7);
            $firma->save();
        }else{
            $firma=Firmas::find($yaExiste->id);
            $firma->archivo=substr($direccion, 7);
            $firma->save();
        }
        return redirect('habilitarSubidaArchivos')->with('MensajeExito','Archivo Subido Correctamente');
    }

    /* Función que retorna a la página que permite visualizar el archivo subido a la pestaña de firmas de un periodo determinado*/
    public function verFirma($periodo){
        $data=Firmas::where('periodo','=',$periodo)->where('facultad','=',auth()->user()->facultad)->first();
        if($data==""){
            return redirect('reportes')->with('Mensaje','No hay archivos disponibles');
        }else{
            return view('reportes.verFirma',compact('data'));
        }
    }

    /* Función que retorna una vista con el periodo ingresado para buscar, junto con los botones poder generar los reportes de dicho periodo*/
    public function buscar(Request $request){
        $periodo=$request->input('periodo');
        $subida=0;
        $datos=Periodo::where('año','=',$periodo)->first();
        return view('reportes.buscar',compact('datos','subida'));
    }

    /* Función que retorna a la página principal de la pestaña Reportes, pero esta vez con un boton habilitado que permite subir un archivo
       a cada periodo visualizado. */
    public function habilitarSubidaBuscado($periodo){
        $subida=1;
        $datos=Periodo::where('año','=',$periodo)->first();
        return view('reportes.buscar',compact('datos','subida'));
    }

}