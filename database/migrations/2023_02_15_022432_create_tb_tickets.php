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
        Schema::create('tb_tickets', function (Blueprint $table) {
            $table->engine="InnoDB";
            $table->bigIncrements('id_ticket');
            $table->unsignedBigInteger('id_usu');
            $table->unsignedBigInteger('id_dpto');
            $table->date('fecha');
            $table->string('clasificacion');
            $table->string('detalle');
            $table->string('estatus');
            $table->timestamps();

            $table->foreign('id_usu')->references('id_usu')->onDelete('CASCADE')
            ->on('tb_usuarios');

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
        Schema::dropIfExists('tb_tickets');
    }
};
