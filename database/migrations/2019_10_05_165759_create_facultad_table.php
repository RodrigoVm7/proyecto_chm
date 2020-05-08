<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFacultadTable extends Migration
{
    public function up()
    {
        Schema::create('facultad', function (Blueprint $table) {
            $table->bigIncrements('cod_facultad');
            $table->string('nombre');
            $table->string('decano');
            $table->string('estado')->default('ACTIVO');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('facultad');
    }
}
