<?php

namespace Database\Factories;

use App\Models\Articulo;
use App\Models\Comentario;
use App\Models\Invitado;
use Illuminate\Database\Eloquent\Factories\Factory;

class ComentarioFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Comentario::class;

    /**
     * Define the model's default state.
     *
     * @param null $invitado
     * @param null $articulo
     * @return array
     */
    public function definition($articulo = null)
    {
        return [
            'articulo_id' => $articulo ?? Articulo::factory()->create(),
            'comentario' => $this->faker->sentences(3, true),
            'nombre' => $this->faker->name,
            'email' => $this->faker->email,
        ];
    }
}
