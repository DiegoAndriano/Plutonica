<?php

namespace Tests\Feature;

use App\Models\Articulo;
use App\Models\comentario;
use App\Models\Invitado;
use App\Models\megusta;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ArticuloTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function un_articulo_puede_ser_comentado()
    {
        $attrs = [
            'articulo' => 'my-first-post',
            'nombre' => 'Juan Carlos',
            'email' => 'Juan@gmail.com',
            'comentario' => '¡Me encantó tu artículo!'
        ];

        $this->followingRedirects()
            ->post('/articulos/my-first-post', $attrs)
            ->assertOk()
            ->assertSee([$attrs['comentario'], $attrs['nombre'], $attrs['email']]);

        $attrs = [
            'articulo' => 'my-first-post',
            'invitado_id' => 1,
            'comentario' => '¡Me encantó tu artículo!'
        ];

        $this->assertDatabaseHas('comentarios', $attrs);

    }

    /** @test */
    public function un_articulo_puede_ser_comentado_sin_mail()
    {
        $this->withoutExceptionHandling();
        $attrs = [
            'articulo' => 'my-first-post',
            'nombre' => 'Juan Carlos',
            'email' => null,
            'comentario' => '¡Me encantó tu artículo!'
        ];

        $this->followingRedirects()
            ->post('/articulos/my-first-post', $attrs)
            ->assertOk()
            ->assertSee([$attrs['comentario'], $attrs['nombre']]);

        $attrs = [
            'articulo' => 'my-first-post',
            'invitado_id' => 1,
            'comentario' => '¡Me encantó tu artículo!'
        ];

        $this->assertDatabaseHas('comentarios', $attrs);

    }

    /** @test */
    public function un_comentario_debe_tener_un_articulo_existente()
    {
        $attrs = [
            'articulo' => 'yo-no-existo',
            'nombre' => 'Juan Carlos',
            'email' => 'Juan@gmail.com',
            'comentario' => '¡Me encantó tu artículo!'
        ];

        $response = $this->post('/articulos/my-first-post', $attrs);

        $response->assertSessionHasErrors('articulo');
        $this->assertDatabaseMissing('comentarios', $attrs);

    }


    /** @test */
    public function un_comentario_puede_tener_un_dueño_invitado()
    {
//        $this->withoutExceptionHandling();
        $attrs = [
            'articulo' => 'my-first-post',
            'nombre' => 'Juan Carlos',
            'email' => null,
            'comentario' => '¡Me encantó tu artículo!'
        ];

        $this->post('/articulos/my-first-post', $attrs);

        $attrs = [
            'articulo' => 'my-first-post',
            'invitado_id' => 1,
            'comentario' => '¡Me encantó tu artículo!'
        ];

        $this->assertDatabaseHas('comentarios', $attrs);
        $this->assertDatabaseHas('invitados', ['nombre' => 'Juan Carlos']);
    }

    /** @test */
    public function dos_comentarios_del_mismo_invitado_deben_ser_reconocidos_como_escritos_por_el_mismo_invitado()
    {
        $this->withoutExceptionHandling();
        $attrs = [
            'articulo' => 'my-first-post',
            'nombre' => 'Juan Carlos',
            'email' => null,
            'comentario' => '¡Me encantó tu artículo!'
        ];

        $this->post('/articulos/my-first-post', $attrs);

        $attrs = [
            'articulo' => 'my-first-post',
            'nombre' => 'Juan Carlos',
            'email' => null,
            'comentario' => '¡Me volvió a encantar tu artículo!'
        ];

        $this->post('/articulos/my-first-post', $attrs);

        $attrs = [
            'articulo' => 'my-first-post',
            'invitado_id' => 1,
            'comentario' => '¡Me encantó tu artículo!'
        ];

        $attrs_dos = [
            'articulo' => 'my-first-post',
            'invitado_id' => 1,
            'comentario' => '¡Me volvió a encantar tu artículo!'
        ];

        $this->assertDatabaseHas('comentarios', $attrs);
        $this->assertDatabaseHas('comentarios', $attrs_dos);
        $this->assertDatabaseHas('invitados', ['nombre' => 'Juan Carlos']);
    }

    /** @test */
    public function un_articulo_puede_ser_liked_multiples_veces_por_un_invitado_no_registrado()
    {
        $this->withoutExceptionHandling();

        $attrs = [
            'articulo' => 'my-first-post',
        ];

        $this->followingRedirects()
            ->post('/articulos/my-first-post/like', $attrs)
            ->assertSee('Me Gusta');

        $this->assertDatabaseHas('megustas', [
            'articulo' => 'my-first-post',
            'cantidad' => 1,
        ]);

        $this->post('/articulos/my-first-post/like', $attrs);

        $this->assertDatabaseHas('megustas', [
            'articulo' => 'my-first-post',
            'cantidad' => 2,
        ]);
    }

    /** @test */
    public function un_articulo_puede_ser_liked_un_maximo_de_10_veces_por_un_invitado_no_registrado()
    {
        $this->withoutExceptionHandling();

        $attrs = [
            'articulo' => 'my-first-post',
        ];

        $this->followingRedirects()
            ->post('/articulos/my-first-post/like', $attrs)
            ->assertSee('Me Gusta');

        $this->assertDatabaseHas('megustas', [
            'articulo' => 'my-first-post',
            'cantidad' => 1,
        ]);

        $this->post('/articulos/my-first-post/like', $attrs);
        $this->post('/articulos/my-first-post/like', $attrs);
        $this->post('/articulos/my-first-post/like', $attrs);
        $this->post('/articulos/my-first-post/like', $attrs);
        $this->post('/articulos/my-first-post/like', $attrs);
        $this->post('/articulos/my-first-post/like', $attrs);
        $this->post('/articulos/my-first-post/like', $attrs);
        $this->post('/articulos/my-first-post/like', $attrs);
        $this->post('/articulos/my-first-post/like', $attrs);
        $this->post('/articulos/my-first-post/like', $attrs);

        $this->assertDatabaseHas('megustas', [
            'articulo' => 'my-first-post',
            'cantidad' => 10,
        ]);
    }

    /** @test */
    public function un_articulo_puede_ser_liked_por_un_invitado_registrado()
    {
        $attrs = [
            'articulo' => 'my-first-post',
            'nombre' => 'Juan Carlos',
            'email' => 'Juan@gmail.com',
            'comentario' => '¡Me encantó tu artículo!'
        ];

        $this->post('/articulos/my-first-post', $attrs);
        $this->post('/articulos/my-first-post/like', $attrs);

        $this->assertEquals(MeGusta::first()->invitado_id, Comentario::first()->invitado_id);

    }

    /** @test */
    public function un_comentario_puede_ser_editado()
    {
        $comentario = Comentario::factory()->withInvitado()->create();

        $this->signInAsInvitado($comentario->invitado()->first());

        $attrs = [
            'comentario' => 'Esta es la modificacion',
            'nombre' => $comentario->invitado()->first()->nombre,
            'articulo' => 'my-first-post',
        ];

        $this->patch('/articulos/my-first-post/' . $comentario->id, $attrs);

        $attrs = [
            'comentario' => 'Esta es la modificacion',
            'articulo' => 'my-first-post',
        ];

        $this->assertDatabaseHas('comentarios', $attrs);
    }

    /** @test */
    public function un_comentario_puede_ser_editado_solo_por_su_creador()
    {
        $comentario = Comentario::factory()->withInvitado()->create();

        $this->signInAsInvitado();

        $attrs = [
            'comentario' => 'Esta es la modificacion',
            'nombre' => $comentario->invitado()->first()->nombre,
            'articulo' => 'my-first-post',
        ];

        $this->patch('/articulos/my-first-post/' . $comentario->id, $attrs)->assertForbidden();
    }

    /** @test */
    public function un_comentario_puede_ser_borrado()
    {
        $comentario = Comentario::factory()->withInvitado()->create();

        $this->signInAsInvitado($comentario->invitado()->first());

        $attrs = [
            'comentario' => 'Esta es la modificacion',
        ];

        $this->delete('/articulos/my-first-post/' . $comentario->id);

        $this->assertDatabaseMissing('comentarios', $attrs);
    }

    /** @test */
    public function un_comentario_puede_ser_borrado_solo_por_su_creador()
    {
        $comentario = Comentario::factory()->withInvitado()->create();

        $this->signInAsInvitado();

        $attrs = [
            'comentario' => 'Esta es la modificacion',
            'nombre' => $comentario->invitado()->first()->nombre,
            'articulo' => 'my-first-post',
        ];

        $this->delete('/articulos/my-first-post/' . $comentario->id, $attrs)->assertForbidden();
    }


}
