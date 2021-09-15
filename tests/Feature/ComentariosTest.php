<?php

namespace Tests\Feature;

use App\Models\Articulo;
use App\Models\Comentario;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ComentariosTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function un_comentario_puede_ser_creado()
    {
        $user = User::factory(['isAdmin' => true])->create();
        $this->signInAsUser($user);

        $articulo = Articulo::factory()->create();

        $attrs = [
            'articulo' => $articulo->id,
            'comentario' => '¡Me encantó tu artículo!',
            'email' => 'Juan@Perez.com',
            'nombre' => 'Juan pérez',
        ];

        $this
            ->post('/comentarios/' . $articulo->id, $attrs)
            ->assertRedirect();

        $this->assertDatabaseHas('comentarios', ['comentario' => $attrs['comentario']]);
    }

    /** @test */
    public function un_comentario_puede_ser_borrado()
    {
        $comentario = Comentario::factory()->create();

        $user = User::factory(['isAdmin' => true])->create();
        $this->signInAsUser($user);

        $this->delete('/comentarios/ ' . $comentario->id);

        $this->assertDatabaseMissing('comentarios', ['comentario' => $comentario->comentario]);
    }

    /** @test */
    public function un_comentario_puede_ser_borrado_solo_por_el_admin()
    {
        $comentario = Comentario::factory()->create();

        $user = User::factory(['isAdmin' => false])->create();
        $this->signInAsUser($user);

        $this->delete('/comentarios/ ' . $comentario->id);

        $this->assertDatabaseHas('comentarios', ['comentario' => $comentario->comentario]);
    }
}
