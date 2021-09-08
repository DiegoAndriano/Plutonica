<?php

namespace Database\Factories;

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
    public function definition()
    {
        return [
            'articulo' => 'my-first-post',
            'comentario' => $this->faker->sentences(3, true),
            'invitado_id' => Invitado::factory()->create()->id,
        ];
    }

    public function withInvitado($email = null, $nombre = null)
    {
        return $this->state(function (array $attributes) use ($email, $nombre) {
            if ($email && $nombre) {
                return [
                    'invitado_id' => Invitado::factory($nombre)->withEmail($email)->create()->id,
                ];
            }
            if ($email) {
                return [
                    'invitado_id' => Invitado::factory($nombre)->withEmail($email)->create()->id
                ];
            }
            return [
                'invitado_id' => Invitado::factory($nombre)->create()->id
            ];
        });
    }

    public function withArticulo($articulo = null)
    {
        return $this->state(function (array $attributes) use ($articulo) {
            return [
                'articulo' => $articulo ? $articulo : 'my-first-post',
            ];
        });
    }
}
