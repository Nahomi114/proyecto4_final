<?php

namespace Database\Factories;

use App\Models\Ingreso;
use Illuminate\Database\Eloquent\Factories\Factory;

class IngresoFactory extends Factory
{
    protected $model = Ingreso::class;

    public function definition()
    {
        // Obtener IDs válidos de proveedores y usuarios
        $proveedorId = \App\Models\Proveedor::inRandomOrder()->first()->ID_proveedores;
        $userId = \App\Models\User::inRandomOrder()->first()->id;

        return [
            'ID_proveedores' => $proveedorId,
            'user_id' => $userId,
            'serie_comprob' => $this->faker->bothify('??###'),
            'fec_ingreso' => $this->faker->date(),
            'impuesto' => $this->faker->randomFloat(2, 0, 100),
            'total' => $this->faker->randomFloat(2, 100, 1000),
        ];
    }
}

