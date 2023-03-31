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
        Schema::create('users', function (Blueprint $table) {
            $table->engine="InnoDB";
            $table->id();
            $table->string('name');
            $table->string('apellido')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('perfil')->nullable();
            $table->string('password');
            $table->unsignedBigInteger('id_dpto')->nullable();
            $table->string('img_perfil')->nullable();
            $table->integer('estatus')->default(1);
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
};
