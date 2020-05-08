<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFirmasTable extends Migration{

    public function up(){
        Schema::create('firmas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('periodo');
            $table->string('facultad');
            $table->string('archivo');
            $table->timestamps();
        });
    }

    public function down(){
        Schema::dropIfExists('firmas');
    }
}
