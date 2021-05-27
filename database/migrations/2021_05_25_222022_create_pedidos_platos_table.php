<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePedidosPlatosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pedidos_platos', function (Blueprint $table) {
            $table->foreignId('id_pedido')
                ->constrained('pedidos')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreignId('id_plato')
                ->constrained('platos')
                ->onUpdate('cascade')
                ->onDelete('cascade');
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
        Schema::dropIfExists('_pedidos_platos');
    }
}
