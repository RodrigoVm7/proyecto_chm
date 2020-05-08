<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->string('email')->unique();
            $table->string('permiso');
            $table->string('facultad');
            $table->string('rut');
            $table->string('password');
            $table->string('nombre');
            $table->string('apellidos');
            $table->string('estado');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    public function down(){
        Schema::dropIfExists('users');
    }
}
