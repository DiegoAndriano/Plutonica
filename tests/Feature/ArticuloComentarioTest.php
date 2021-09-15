<?php

namespace Tests\Feature;

use App\Models\Articulo;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ArticuloComentarioTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function un_articulo_puede_ser_comentado_sin_mail()
    {
        $user = User::factory(['isAdmin' => true])->create();
        $this->signInAsUser($user);

        $articulo = Articulo::factory()->create();

        $attrs = [
            'articulo' => $articulo->id,
            'comentario' => '¡Me encantó tu artículo!',
            'email' => null,
            'nombre' => 'Juan pérez',
        ];

        $this
            ->post('/comentarios/' . $articulo->id, $attrs)
            ->assertRedirect();

        $this->assertDatabaseHas('comentarios', ['comentario' => $attrs['comentario']]);
    }

    /** @test */
    public function un_comentario_debe_tener_un_articulo_existente()
    {
        $attrs = [
            'articulo' => 1,
            'comentario' => '¡Me encantó tu artículo!',
            'email' => 'Juan@Perez.com',
            'nombre' => 'Juan pérez',
        ];

        $response = $this
            ->post('/comentarios/1' , $attrs)
            ->assertRedirect();

        $response->assertSessionHasErrors('articulo');
        $this->assertDatabaseMissing('comentarios', $attrs);
    }
}
