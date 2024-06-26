<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('proveedores', function (Blueprint $table) {
            $table->id('ID_proveedores');
            $table->string('Nom_proveedores');
            $table->string('RUC_proveedores', 10)->unique();
            $table->string('Telf_proveedores' );
            $table->string('Correo_proveedores')->unique();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('proveedores');
    }
};
