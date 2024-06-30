<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('ventas', function (Blueprint $table) {
            $table->id('ID_ventas');
            $table->unsignedBigInteger('ID_clientes');
            $table->unsignedBigInteger('user_id'); 
            $table->string('tipo_comprobante');
            $table->string('serie_comprobante');
            $table->string('num_comprobante');
            $table->dateTime('fecha_venta');
            $table->double('impuesto_venta');
            $table->double('total');
            $table->string('Estado');
            $table->timestamps();

            $table->foreign('ID_clientes')->references('ID_clientes')->on('clientes');
            $table->foreign('user_id')->references('id')->on('users'); // Clave foránea a la tabla users
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ventas');
    }
};