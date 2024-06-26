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
        Schema::create('detalle_ingreso', function (Blueprint $table) {
            $table->id('ID_det_ingreso');
            $table->unsignedBigInteger('ID_producto');
            $table->unsignedBigInteger('ID_ingreso');
            $table->integer('cant_det_ingreso');
            $table->double('precio_det_ingreso');
            $table->timestamps();

            $table->foreign('ID_producto')->references('ID_producto')->on('productos');
            $table->foreign('ID_ingreso')->references('ID_ingreso')->on('ingresos');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detalle_ingreso');
    }
};
