<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comision extends Model
{
	protected $table='comision';

	protected $primaryKey = 'id_comision'; 

    protected $fillable = ['id_comision','año','facultad','rut_academico','decano','miembro1','miembro2','fecha_pie','estado'];
}
