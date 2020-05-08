<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Academico extends Model{

	protected $table = 'academico';
	protected $primaryKey = 'rut';
	protected $fillable = ['rut','nombre','apellido','titulo','grado_academico','departamento','facultad','categoria','horas_contrato','tipo_planta','estado'];
}
