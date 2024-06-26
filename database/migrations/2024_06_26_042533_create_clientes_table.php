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
        Schema::create('clientes', function (Blueprint $table) {
            $table->id('ID_clientes');
            $table->string('Nom_cliente');
            $table->string('Ape_cliente');
            $table->string('Tipo_documento');
            $table->string('DNI_cliente')->unique();
            $table->string('Cel_cliente');
            $table->string('Correo_cliente')->unique();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clientes');
    }
};

