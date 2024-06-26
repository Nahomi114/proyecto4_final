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
            $table->unsignedBigInteger('ID_productos');
            $table->unsignedBigInteger('ID_ventas');
            $table->integer('cantidad');
            $table->double('precio');
            $table->double('descuento');
            $table->timestamps();
        
            $table->foreign('ID_productos')->references('ID_producto')->on('productos');
            $table->foreign('ID_ventas')->references('ID_ventas')->on('ventas');
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
