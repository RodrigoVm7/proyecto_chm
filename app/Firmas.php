<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Firmas extends Model{
	protected $table='firmas';

	protected $primaryKey = 'id';

    protected $fillable = ['id','periodo','facultad','archivo'];
}
