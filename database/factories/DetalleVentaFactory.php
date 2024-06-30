<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\DetalleVenta;
use App\Models\Venta;
use App\Models\Producto;

class DetalleVentaFactory extends Factory
{
    protected $model = DetalleVenta::class;

    public function definition(): array
    {
        return [
            'ID_ventas' => Venta::factory(),
            'ID_producto' => Producto::factory(),
            'cantidad' => $this->faker->numberBetween(1, 100),
            'precio' => $this->faker->randomFloat(2, 1, 100),
            'descuento' => $this->faker->randomFloat(2, 0, 10),
        ];
    }
}
