<?php

namespace Database\Factories;

use App\Models\invitado;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class InvitadoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = invitado::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition($nombre = null)
    {
        return [
            'nombre' => $nombre ? $nombre : $this->faker->name,
            'passcode' => Hash::make(Str::random(16)),
        ];
    }

    public function withEmail($email = null)
    {
        return $this->state(function (array $attributes) use ($email){
            return [
                'email' => $email ? $email : $this->faker->email,
            ];
        });
    }
}
