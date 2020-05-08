<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEvaluacionesTable extends Migration{

    public function up(){
        Schema::create('evaluaciones', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('rut_academico');
            $table->string('nombre_academico');
            $table->string('apellido_academico');
            $table->string('departamento_academico');
            $table->string('tp_academico');
            $table->string('facultad');
            $table->string('decano');
            $table->string('miembro1');
            $table->string('miembro2');
            $table->string('id_comision');
            $table->string('año');
            $table->string('tiempoActividad1')->nullable();
            $table->string('e1')->nullable();
            $table->string('mb1')->nullable();
            $table->string('b1')->nullable();
            $table->string('r1')->nullable();
            $table->string('d1')->nullable();
            $table->string('t1c')->nullable();
            $table->string('tiempoActividad2')->nullable();
            $table->string('e2')->nullable();
            $table->string('mb2')->nullable();
            $table->string('b2')->nullable();
            $table->string('r2')->nullable();
            $table->string('d2')->nullable();
            $table->string('t2c')->nullable();
            $table->string('tiempoActividad3')->nullable();
            $table->string('e3')->nullable();
            $table->string('mb3')->nullable();
            $table->string('b3')->nullable();
            $table->string('r3')->nullable();
            $table->string('d3')->nullable();
            $table->string('t3c')->nullable();
            $table->string('tiempoActividad4')->nullable();
            $table->string('e4')->nullable();
            $table->string('mb4')->nullable();
            $table->string('b4')->nullable();
            $table->string('r4')->nullable();
            $table->string('d4')->nullable();
            $table->string('t4c')->nullable();
            $table->string('tiempoActividad5')->nullable();
            $table->string('e5')->nullable();
            $table->string('mb5')->nullable();
            $table->string('b5')->nullable();
            $table->string('r5')->nullable();
            $table->string('d5')->nullable();
            $table->string('t5c')->nullable();
            $table->string('nota_final')->nullable();
            $table->string('comentarios')->nullable();
            $table->timestamps();
        });
    }

    public function down(){
        Schema::dropIfExists('evaluaciones');
    }
}
