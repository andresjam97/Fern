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
        Schema::create('pedido__detalles', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_cabeza');
            $table->unsignedBigInteger('id_producto');
            $table->integer('cantidad');
            $table->integer('bonificadas')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('id_cabeza')->references('id')->on('pedido__cabezas');
            $table->foreign('id_producto')->references('id')->on('products');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pedido__detalles');
    }
};
