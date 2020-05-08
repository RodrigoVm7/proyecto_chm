<?php

namespace App\Exports;

use App\Evaluacion;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class EvaluacionesExport implements FromView{

	protected $año;

	public function __construct($periodo){
        $this->año = $periodo;
	}

    public function view(): View{
    	return view('reportes.excel',['datos' => Evaluacion::where('año','=',$this->año)->where('facultad','=',auth()->user()->facultad)->get()]);
    }
}
