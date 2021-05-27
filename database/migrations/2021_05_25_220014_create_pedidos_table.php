<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePedidosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pedidos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_servicio')
                ->references('id')
                ->on('servicios')
                ->constrained('servicios')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreignId('id_cliente')
                ->references('id')
                ->on('users')
                ->constrained('users')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreignId('id_restaurant')
                ->references('id')
                ->on('users')
                ->constrained('users')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreignId('id_deliver')
                ->nullable()
                ->references('id')
                ->on('users')
                ->constrained('users')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->integer('status')->default(0);
            $table->integer('hour')->nullable();
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
        Schema::dropIfExists('_pedidos');
    }
}
