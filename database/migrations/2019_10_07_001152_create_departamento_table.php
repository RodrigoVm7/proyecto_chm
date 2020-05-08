<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDepartamentoTable extends Migration{

    public function up(){
        Schema::create('departamento', function (Blueprint $table) {
            $table->bigIncrements('cod_departamento');
            $table->string('nombre');
            $table->string('facultad');
            $table->string('estado')->default('ACTIVO');
            $table->timestamps();
        });
    }


    public function down(){
        Schema::dropIfExists('departamento');
    }
}
