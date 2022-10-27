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
        Schema::create('pedido__cabezas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('client_id');
            $table->date('fecha_registro');
            $table->unsignedBigInteger('user_id');
            $table->string('estado');
            $table->string('observacion')->nullable();
            $table->string('orden_compra')->nullable();
            $table->date('fecha_orden')->nullable();
            $table->string('adjunto')->nullable();
            $table->date('fecha_entrega')->nullable();
            $table->boolean('procesado')->nullable();
            $table->string('observacion_rechazo')->nullable();
            $table->string('tipo_ingreso')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('client_id')->references('id')->on('clients');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pedido__cabezas');
    }
};
