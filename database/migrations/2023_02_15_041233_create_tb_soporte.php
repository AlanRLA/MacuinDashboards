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
        Schema::create('tb_soportes', function (Blueprint $table) {
            $table->engine="InnoDB";
            $table->bigIncrements('id_soporte');
            $table->unsignedBigInteger('id_jefe');
            $table->unsignedBigInteger('id_aux');
            $table->unsignedBigInteger('id_ticket');
            $table->string('observaciones');
            $table->timestamps();

            $table->foreign('id_jefe')->references('id')->onDelete('CASCADE')
            ->on('users');

            $table->foreign('id_aux')->references('id')->onDelete('CASCADE')
            ->on('users');

            $table->foreign('id_ticket')->references('id_ticket')->onDelete('CASCADE')
            ->on('tb_tickets');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_soporte');
    }
};
