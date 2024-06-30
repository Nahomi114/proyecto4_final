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
        Schema::create('productos', function (Blueprint $table) {
            $table->id('ID_producto');
            $table->unsignedBigInteger('ID_categorias');
            $table->string('Cod_Barra_producto');
            $table->string('Nom_producto');
            $table->double('Precio_producto');
            $table->integer('Cantida_producto');
            $table->string('Img_producto')->nullable();
            $table->integer('Stock_producto');
            $table->string('Desc_producto');
            $table->string('Estado_producto');
            $table->timestamps();

            $table->foreign('ID_categorias')->references('ID_categorias')->on('categorias');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('productos');
    }
};

