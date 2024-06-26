<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Categoria;

class CategoriaFactory extends Factory
{
    protected $model = Categoria::class;

    public function definition(): array
    {
        return [
            'Nom_categorias' => $this->faker->word,
            'Desc_categorias' => $this->faker->sentence,
        ];
    }
}