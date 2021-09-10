<?php

namespace Database\Factories;

use App\Models\Articulo;
use Illuminate\Database\Eloquent\Factories\Factory;

class ArticuloFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Articulo::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'titulo' => $this->faker->title,
            'descripcion' => $this->faker->paragraph(2),
            'articulo' => $this->faker->paragraphs(3, true),
            'fecha_publicacion' => null,
            'publicado' => false,
            'fijado' => false
        ];
    }
}
