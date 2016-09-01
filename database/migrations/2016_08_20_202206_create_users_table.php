<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->string('apellidoP');
            $table->string('apellidoM');
            $table->string('ci')->unique();
            $table->string('email')->unique();
            $table->string('password');
            $table->integer('id_estado')->unsigned()->nullable();
            $table->foreign('id_estado')->references('id')->on('estados');
            $table->integer('id_unidad')->unsigned()->nullable();
            $table->foreign('id_unidad')->references('id')->on('unidads');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('users');
    }
}
