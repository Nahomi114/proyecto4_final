<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Proveedor;

class ProveedorFactory extends Factory
{
    protected $model = Proveedor::class;
    
    public function definition(): array
    {
        return [
            'Nom_proveedores' => $this->faker->company,
            'RUC_proveedores' => $this->faker->unique()->numerify('##########'),
            'Telf_proveedores' => $this->faker->numerify('9########'),
            'Correo_proveedores' => $this->faker->unique()->safeEmail,
        ];
    }
}