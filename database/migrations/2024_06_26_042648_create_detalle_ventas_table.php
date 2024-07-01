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
        Schema::create('detalle_ventas', function (Blueprint $table) {
            $table->id('ID_det_ventas');
            $table->unsignedBigInteger('ID_producto');
            $table->unsignedBigInteger('ID_ventas');
            $table->integer('cantidad');
            $table->double('precio');
            $table->double('descuento')->default(0);
            $table->double('subtotal')->default(0.0);
            $table->timestamps();

            $table->foreign('ID_producto')->references('ID_producto')->on('productos')->onDelete('cascade');
            $table->foreign('ID_ventas')->references('ID_ventas')->on('ventas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detalle_ventas');
    }
};
