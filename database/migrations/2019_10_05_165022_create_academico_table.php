<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAcademicoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('academico', function (Blueprint $table) {
            $table->string('rut')->unique();
            $table->string('nombre');
            $table->string('apellido');
            $table->string('titulo');
            $table->string('grado_academico');
            $table->string('departamento');
            $table->string('facultad');
            $table->string('categoria');
            $table->string('horas_contrato');
            $table->string('tipo_planta');
            $table->string('estado')->default('ACTIVO');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('academico');
    }
}
