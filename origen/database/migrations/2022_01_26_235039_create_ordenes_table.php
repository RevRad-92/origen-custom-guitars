<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdenesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ordenes', function (Blueprint $table) {
            $table->tinyIncrements('idOrden');
            $table->tinyInteger('idCliente');
            $table->tinyInteger('idFormaPago');
            $table->tinyInteger('idEstado');
            $table->date('ordFecha'); // date('l jS \of F Y h:i:s A') = Monday 8th of August 2005 03:12:46 PM
            $table->text('ordComentarios')->nullable(true);

            // $table->foreign('idCliente')
            //         ->references('idCliente')->on('clientes');
            // $table->foreign('idFormaPago')
            //         ->references('idFormaPago')->on('pagos');
            // $table->foreign('idEstado')
            //         ->references('idEstado')->on('estados');                    

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ordenes_create');
    }
}
