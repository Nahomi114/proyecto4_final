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
        Schema::create('ingresos', function (Blueprint $table) {
            $table->id('ID_ingreso');
            $table->unsignedBigInteger('ID_proveedores');
            $table->unsignedBigInteger('user_id'); // Referencia a la tabla users
            $table->string('tipo_comprob');
            $table->string('serie_comprob');
            $table->string('num_comprob');
            $table->dateTime('fec_ingreso');
            $table->double('impuesto');
            $table->double('total');
            $table->timestamps();

            $table->foreign('ID_proveedores')->references('ID_proveedores')->on('proveedores');
            $table->foreign('user_id')->references('id')->on('users'); // Clave foránea a la tabla users
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ingresos');
    }
};
