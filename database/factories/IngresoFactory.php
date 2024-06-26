<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Ingreso;
use App\Models\Proveedor;
use App\Models\User;

class IngresoFactory extends Factory
{
    protected $model = Ingreso::class;

    public function definition(): array
    {
        return [
            'ID_proveedores' => Proveedor::factory(),
            'user_id' => User::factory(),
            'tipo_comprob' => $this->faker->randomElement(['Factura', 'Boleta']),
            'serie_comprob' => $this->faker->bothify('??###'),
            'num_comprob' => $this->faker->unique()->numerify('##########'),
            'fec_ingreso' => $this->faker->dateTime,
            'impuesto' => $this->faker->randomFloat(2, 0, 100),
            'total' => $this->faker->randomFloat(2, 100, 1000),
        ];
    }
}