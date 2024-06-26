<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Producto;
use App\Models\Categoria;

class ProductoFactory extends Factory
{
    protected $model = Producto::class;

    public function definition(): array
    {
        return [
            'ID_categorias' => Categoria::factory(),
            'Cod_Barra_producto' => $this->faker->ean13,
            'Nom_producto' => $this->faker->word,
            'Precio_producto' => $this->faker->randomFloat(2, 1, 100),
            'Cantida_producto' => $this->faker->numberBetween(1, 100),
            'Img_producto' => $this->faker->imageUrl(),
            'stock_producto' => $this->faker->numberBetween(1, 100),
            'Desc_producto' => $this->faker->sentence,
            'Estado_producto' => $this->faker->randomElement(['Disponible', 'No disponible']),
        ];
    }
}