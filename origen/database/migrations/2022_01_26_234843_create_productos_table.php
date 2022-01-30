<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->tinyIncrements('idProducto'); 
            $table->tinyInteger('idCategoria');
            $table->float('prdPrecio', 10, 2)->unsigned()->nullable(true);
            $table->integer('prdStock')->nullable(true);
            $table->tinyInteger('idModelo');
            $table->tinyInteger('idMadera');
            $table->string('prdImagen')->nullable(true);
            $table->string('prdCustonMod')->nullable(true);
            $table->string('prdCustonMad')->nullable(true);
            $table->text('prdDetalles')->nullable(true);

            // $table->foreign('idCategoria')
            //         ->references('idCategoria')->on('categorias');
            // $table->foreign('idModelo')
            //         ->references('idModelo')->on('modelos');
            // $table->foreign('idMadera')
            //         ->references('idMadera')->on('maderas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('productos');
    }
}
