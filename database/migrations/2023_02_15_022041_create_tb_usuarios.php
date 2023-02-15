<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_usuarios', function (Blueprint $table) {
            $table->engine="InnoDB";
            $table->bigIncrements('id_usu');
            $table->string('nombre');
            $table->string('apellido');
            $table->string('perfil');
            $table->unsignedBigInteger('id_dpto');
            $table->timestamps();

            $table->foreign('id_dpto')->references('id_dpto')->onDelete('CASCADE')
            ->on('tb_departamentos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_usuarios');
    }
};
