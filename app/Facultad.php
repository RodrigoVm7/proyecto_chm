<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Facultad extends Model
{
	protected $table='facultad';

	protected $primaryKey = 'cod_facultad';

    protected $fillable = ['cod_facultad','nombre','decano','estado'];
}
