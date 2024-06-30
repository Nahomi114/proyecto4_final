<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Cliente;

class ClienteFactory extends Factory
{
    protected $model = Cliente::class;

    public function definition(): array
    {
        return [
            'Nom_cliente' => $this->faker->firstName,
            'Ape_cliente' => $this->faker->lastName,
            'Tipo_documento' => $this->faker->randomElement(['DNI', 'RUC', 'Pasaporte']),
            'DNI_cliente' => $this->faker->unique()->numerify('###########'),
            'Cel_cliente' => $this->faker->numerify('9########'),
            'Correo_cliente' => $this->faker->unique()->safeEmail,
        ];
    }
}