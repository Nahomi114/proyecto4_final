<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Venta;
use App\Models\Cliente;
use App\Models\User;

class VentaFactory extends Factory
{
    protected $model = Venta::class;
    public function definition(): array
    {
        return [
            'ID_clientes' => Cliente::factory(),
            'user_id' => User::factory(),
            'tipo_comprobante' => $this->faker->randomElement(['Factura', 'Boleta']),
            'serie_comprobante' => $this->faker->bothify('??###'),
            'num_comprobante' => $this->faker->unique()->numerify('##########'),
            'fecha_venta' => $this->faker->dateTime,
            'impuesto_venta' => $this->faker->randomFloat(2, 0, 100),
            'total' => $this->faker->randomFloat(2, 100, 1000),
            'Estado' => $this->faker->randomElement(['Pendiente', 'Completado', 'Cancelado']),
        ];
    }
}