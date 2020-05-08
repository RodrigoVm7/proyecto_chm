<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Departamento extends Model{

	protected $table='departamento';
	protected $primaryKey = 'cod_departamento';
    protected $fillable = ['cod_departamento','nombre','facultad','estado'];
}
