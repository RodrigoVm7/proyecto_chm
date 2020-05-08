<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComisionTable extends Migration
{

    public function up()
    {
        Schema::create('comision', function (Blueprint $table) {
            $table->bigIncrements('id_comision');
            $table->integer('año');
            $table->string('facultad');
            $table->string('rut_academico');
            $table->string('decano');
            $table->string('miembro1');
            $table->string('miembro2');
            $table->string('fecha_pie');
            $table->string('estado')->default('ACTIVO');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('comision');
    }
}
