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
        Schema::create('tb_seguimientos', function (Blueprint $table) {
            $table->engine="InnoDB";
            $table->bigIncrements('id_seguimiento');
            $table->unsignedBigInteger('id_ticket');
            $table->string('coment_jefe');
            $table->string('detalle_aux');
            $table->timestamps();

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
        Schema::dropIfExists('tb_seguimientos');
    }
};
