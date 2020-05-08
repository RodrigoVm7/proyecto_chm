<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Evaluacion extends Model{

    protected $table = 'evaluaciones';

	protected $primaryKey = 'id';

	protected $fillable = ['id','rut_academico','nombre_academico','apellido_academico','departamento_academico','tp_academico','facultad','decano','miembro1','miembro2','id_comision','año','tiempoActividad1','e1','mb1','b1','r1','d1','t1c','tiempoActividad2','e2','mb2','b2','r2','d2','t2c','tiempoActividad3','e3','mb3','b3','r3','d3','t3c','tiempoActividad4','e4','mb4','b4','r4','d4','t4c','tiempoActividad5','e5','mb5','b5','r5','d5','t5c','nota_final','comentarios'];
}
