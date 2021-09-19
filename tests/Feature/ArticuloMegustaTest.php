<?php

namespace Tests\Feature;

use App\Models\Articulo;
use App\Models\Megusta;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ArticuloMegustaTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function un_articulo_puede_ser_liked()
    {
        $user = User::factory(['isAdmin' => true])->create();
        $this->signInAsUser($user);

        $articulo = Articulo::factory()->create();

        $this->postJson('articulos/' . $articulo->id . '/like');
        $this->assertDatabaseHas('megustas', ['id' => 1, 'cantidad' => 1]);

        $this->postJson('articulos/' . $articulo->id . '/like');
        $this->assertDatabaseHas('megustas', ['id' => 1, 'cantidad' => 2]);

        $this->postJson('articulos/' . $articulo->id . '/like');
        $this->assertDatabaseHas('megustas', ['id' => 1, 'cantidad' => 3]);
        $this->assertDatabaseMissing('megustas', ['id' => 2]);

    }

    /** @test */
    public function un_articulo_puede_ser_liked_un_maximo_de_10_veces_por_un_invitado_no_registrado()
    {
        $user = User::factory(['isAdmin' => true])->create();
        $this->signInAsUser($user);

        $articulo = Articulo::factory()->create();

        $this->postJson('articulos/' . $articulo->id . '/like');
        $this->postJson('articulos/' . $articulo->id . '/like');
        $this->postJson('articulos/' . $articulo->id . '/like');
        $this->postJson('articulos/' . $articulo->id . '/like');
        $this->postJson('articulos/' . $articulo->id . '/like');
        $this->postJson('articulos/' . $articulo->id . '/like');
        $this->postJson('articulos/' . $articulo->id . '/like');
        $this->postJson('articulos/' . $articulo->id . '/like');
        $this->postJson('articulos/' . $articulo->id . '/like');
        $this->postJson('articulos/' . $articulo->id . '/like');
        $this->postJson('articulos/' . $articulo->id . '/like');
        $this->assertDatabaseHas('megustas', ['id' => 1, 'cantidad' => 10]);

    }
}
