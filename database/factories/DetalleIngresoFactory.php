<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\DetalleIngreso;
use App\Models\Ingreso;
use App\Models\Producto;

class DetalleIngresoFactory extends Factory
{
    protected $model = DetalleIngreso::class;

    public function definition(): array
    {
        return [
            'ID_ingreso' => Ingreso::factory(),
            'ID_producto' => Producto::factory(),
            'cant_det_Ingreso' => $this->faker->numberBetween(1, 100),
            'precio_det_ingreso' => $this->faker->randomFloat(2, 1, 100),
        ];
    }
}
