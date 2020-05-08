<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePeriodosTable extends Migration{

    public function up(){
        Schema::create('periodos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('año');
            $table->string('estado')->default('INACTIVO');
            $table->timestamps();
        });
    }

    public function down(){
        Schema::dropIfExists('periodos');
    }
}
