<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCargaBancosDetalleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carga_bancos_detalle', function (Blueprint $table) {
            $table->id();
            $table->foreignId('carga_bancos_id')->constrained('carga_bancos')->onDelete('cascade');;
            $table->string('fecha');
            $table->string('descripcion');
            $table->string('cargo');
            $table->string('abono');
            $table->string('saldo');
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
        Schema::dropIfExists('carga_bancos_detalle');
    }
}
