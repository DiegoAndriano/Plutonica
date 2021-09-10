<?php

namespace Tests\Feature;

use App\Models\Articulo;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ArticuloTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function un_articulo_puede_ser_creado()
    {
        $user = User::factory(['admin' => true])->create();
        $this->signInAsUser($user);

        $attrs = [
            'titulo' => 'Mi artículo de prueba',
            'descripcion' => 'Este es un pequeño artículo de una pequeña prueba',
            'articulo' => 'lorem ipsum lorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsum',
            'fecha_publicacion' => null,
            'publicado' => true,
            'fijado' => true
        ];

        $this->get('articulos/create')
            ->assertOk();


        $this->post('articulos', $attrs)
            ->assertRedirect();

        $this->assertDatabaseHas('articulos', $attrs);
    }

    /** @test */
    public function un_articulo_puede_ser_editado()
    {
        $user = User::factory(['admin' => true])->create();
        $this->signInAsUser($user);

        $articulo = Articulo::factory()->create();

        $attrs = [
            'titulo' => 'Editado',
            'descripcion' => 'Este es un pequeño artículo de una pequeña prueba',
            'articulo' => 'lorem ipsum lorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsum',
            'fecha_publicacion' => null,
            'publicado' => true,
            'fijado' => true
        ];

        $this->get('articulos/edit/' . $articulo->id, $attrs)
            ->assertOk();

        $this->patch('articulos/' . $articulo->id, $attrs)
            ->assertRedirect();

        $this->assertDatabaseHas('articulos', $attrs);
    }

    /** @test */
    public function un_articulo_puede_ser_borrado()
    {
        $user = User::factory(['admin' => true])->create();
        $this->signInAsUser($user);

        $articulo = Articulo::factory()->create();

        $this->delete('articulos/' . $articulo->id)
            ->assertRedirect();

        $this->assertDatabaseMissing('articulos', ['id' => $articulo->id]);
    }

    /** @test */
    public function un_usuario_no_admin_no_puede_crear_un_articulo()
    {
        $user = User::factory(['admin' => false])->create();
        $this->signInAsUser($user);

        $attrs = [
            'titulo' => 'Mi artículo de prueba',
            'descripcion' => 'Este es un pequeño artículo de una pequeña prueba',
            'articulo' => 'lorem ipsum lorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsum',
            'fecha_publicacion' => null,
            'publicado' => true,
            'fijado' => true
        ];

        $this->get('articulos/create')
            ->assertForbidden();

        $this->post('articulos', $attrs)
            ->assertForbidden();
    }

    /** @test */
    public function un_usuario_no_admin_no_puede_editar_un_articulo()
    {
        $user = User::factory(['admin' => false])->create();
        $this->signInAsUser($user);

        $articulo = Articulo::factory()->create();

        $attrs = [
            'titulo' => 'Editado',
            'descripcion' => 'Este es un pequeño artículo de una pequeña prueba',
            'articulo' => 'lorem ipsum lorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsum',
            'fecha_publicacion' => null,
            'publicado' => true,
            'fijado' => true
        ];

        $this->get('articulos/edit/' . $articulo->id, $attrs)
            ->assertForbidden();

        $this->patch('articulos/' . $articulo->id, $attrs)
            ->assertForbidden();

        $this->assertDatabaseMissing('articulos', $attrs);
    }


    /** @test */
    public function un_usuario_no_admin_no_puede_borrar_un_articulo()
    {
        $user = User::factory(['admin' => false])->create();
        $this->signInAsUser($user);

        $articulo = Articulo::factory()->create();

        $this->delete('articulos/' . $articulo->id)
            ->assertForbidden();

        $this->assertDatabaseHas('articulos', ['id' => $articulo->id]);
    }

//    /** @test */
//    public function un_articulo_puede_ser_comentado()
//    {
//        $attrs = [
//            'articulo' => 'my-first-post',
//            'nombre' => 'Juan Carlos',
//            'email' => 'Juan@gmail.com',
//            'comentario' => '¡Me encantó tu artículo!'
//        ];
//
//        $this->followingRedirects()
//            ->post('/articulos/my-first-post', $attrs)
//            ->assertOk()
//            ->assertSee([$attrs['comentario'], $attrs['nombre'], $attrs['email']]);
//
//        $attrs = [
//            'articulo' => 'my-first-post',
//            'invitado_id' => 1,
//            'comentario' => '¡Me encantó tu artículo!'
//        ];
//
//        $this->assertDatabaseHas('comentarios', $attrs);
//
//    }
//
//    /** @test */
//    public function un_articulo_puede_ser_comentado_sin_mail()
//    {
//        $this->withoutExceptionHandling();
//        $attrs = [
//            'articulo' => 'my-first-post',
//            'nombre' => 'Juan Carlos',
//            'email' => null,
//            'comentario' => '¡Me encantó tu artículo!'
//        ];
//
//        $this->followingRedirects()
//            ->post('/articulos/my-first-post', $attrs)
//            ->assertOk()
//            ->assertSee([$attrs['comentario'], $attrs['nombre']]);
//
//        $attrs = [
//            'articulo' => 'my-first-post',
//            'invitado_id' => 1,
//            'comentario' => '¡Me encantó tu artículo!'
//        ];
//
//        $this->assertDatabaseHas('comentarios', $attrs);
//
//    }
//
//    /** @test */
//    public function un_comentario_debe_tener_un_articulo_existente()
//    {
//        $attrs = [
//            'articulo' => 'yo-no-existo',
//            'nombre' => 'Juan Carlos',
//            'email' => 'Juan@gmail.com',
//            'comentario' => '¡Me encantó tu artículo!'
//        ];
//
//        $response = $this->post('/articulos/my-first-post', $attrs);
//
//        $response->assertSessionHasErrors('articulo');
//        $this->assertDatabaseMissing('comentarios', $attrs);
//
//    }
//
//
//    /** @test */
//    public function un_comentario_puede_tener_un_dueño_invitado()
//    {
////        $this->withoutExceptionHandling();
//        $attrs = [
//            'articulo' => 'my-first-post',
//            'nombre' => 'Juan Carlos',
//            'email' => null,
//            'comentario' => '¡Me encantó tu artículo!'
//        ];
//
//        $this->post('/articulos/my-first-post', $attrs);
//
//        $attrs = [
//            'articulo' => 'my-first-post',
//            'invitado_id' => 1,
//            'comentario' => '¡Me encantó tu artículo!'
//        ];
//
//        $this->assertDatabaseHas('comentarios', $attrs);
//        $this->assertDatabaseHas('invitados', ['nombre' => 'Juan Carlos']);
//    }
//
//    /** @test */
//    public function dos_comentarios_del_mismo_invitado_deben_ser_reconocidos_como_escritos_por_el_mismo_invitado()
//    {
//        $this->withoutExceptionHandling();
//        $attrs = [
//            'articulo' => 'my-first-post',
//            'nombre' => 'Juan Carlos',
//            'email' => null,
//            'comentario' => '¡Me encantó tu artículo!'
//        ];
//
//        $this->post('/articulos/my-first-post', $attrs);
//
//        $attrs = [
//            'articulo' => 'my-first-post',
//            'nombre' => 'Juan Carlos',
//            'email' => null,
//            'comentario' => '¡Me volvió a encantar tu artículo!'
//        ];
//
//        $this->post('/articulos/my-first-post', $attrs);
//
//        $attrs = [
//            'articulo' => 'my-first-post',
//            'invitado_id' => 1,
//            'comentario' => '¡Me encantó tu artículo!'
//        ];
//
//        $attrs_dos = [
//            'articulo' => 'my-first-post',
//            'invitado_id' => 1,
//            'comentario' => '¡Me volvió a encantar tu artículo!'
//        ];
//
//        $this->assertDatabaseHas('comentarios', $attrs);
//        $this->assertDatabaseHas('comentarios', $attrs_dos);
//        $this->assertDatabaseHas('invitados', ['nombre' => 'Juan Carlos']);
//    }
//
//    /** @test */
//    public function un_articulo_puede_ser_liked_multiples_veces_por_un_invitado_no_registrado()
//    {
//        $this->withoutExceptionHandling();
//
//        $attrs = [
//            'articulo' => 'my-first-post',
//        ];
//
//        $this->followingRedirects()
//            ->post('/articulos/my-first-post/like', $attrs)
//            ->assertSee('Me Gusta');
//
//        $this->assertDatabaseHas('megustas', [
//            'articulo' => 'my-first-post',
//            'cantidad' => 1,
//        ]);
//
//        $this->post('/articulos/my-first-post/like', $attrs);
//
//        $this->assertDatabaseHas('megustas', [
//            'articulo' => 'my-first-post',
//            'cantidad' => 2,
//        ]);
//    }
//
//    /** @test */
//    public function un_articulo_puede_ser_liked_un_maximo_de_10_veces_por_un_invitado_no_registrado()
//    {
//        $this->withoutExceptionHandling();
//
//        $attrs = [
//            'articulo' => 'my-first-post',
//        ];
//
//        $this->followingRedirects()
//            ->post('/articulos/my-first-post/like', $attrs)
//            ->assertSee('Me Gusta');
//
//        $this->assertDatabaseHas('megustas', [
//            'articulo' => 'my-first-post',
//            'cantidad' => 1,
//        ]);
//
//        $this->post('/articulos/my-first-post/like', $attrs);
//        $this->post('/articulos/my-first-post/like', $attrs);
//        $this->post('/articulos/my-first-post/like', $attrs);
//        $this->post('/articulos/my-first-post/like', $attrs);
//        $this->post('/articulos/my-first-post/like', $attrs);
//        $this->post('/articulos/my-first-post/like', $attrs);
//        $this->post('/articulos/my-first-post/like', $attrs);
//        $this->post('/articulos/my-first-post/like', $attrs);
//        $this->post('/articulos/my-first-post/like', $attrs);
//        $this->post('/articulos/my-first-post/like', $attrs);
//
//        $this->assertDatabaseHas('megustas', [
//            'articulo' => 'my-first-post',
//            'cantidad' => 10,
//        ]);
//    }
//
//    /** @test */
//    public function un_articulo_puede_ser_liked_por_un_invitado_registrado()
//    {
//        $attrs = [
//            'articulo' => 'my-first-post',
//            'nombre' => 'Juan Carlos',
//            'email' => 'Juan@gmail.com',
//            'comentario' => '¡Me encantó tu artículo!'
//        ];
//
//        $this->post('/articulos/my-first-post', $attrs);
//        $this->post('/articulos/my-first-post/like', $attrs);
//
//        $this->assertEquals(MeGusta::first()->invitado_id, Comentario::first()->invitado_id);
//
//    }
//
//    /** @test */
//    public function un_comentario_puede_ser_editado()
//    {
//        $comentario = Comentario::factory()->withInvitado()->create();
//
//        $this->signInAsInvitado($comentario->invitado()->first());
//
//        $attrs = [
//            'comentario' => 'Esta es la modificacion',
//            'nombre' => $comentario->invitado()->first()->nombre,
//            'articulo' => 'my-first-post',
//        ];
//
//        $this->patch('/articulos/my-first-post/' . $comentario->id, $attrs);
//
//        $attrs = [
//            'comentario' => 'Esta es la modificacion',
//            'articulo' => 'my-first-post',
//        ];
//
//        $this->assertDatabaseHas('comentarios', $attrs);
//    }
//
//    /** @test */
//    public function un_comentario_puede_ser_editado_solo_por_su_creador()
//    {
//        $comentario = Comentario::factory()->withInvitado()->create();
//
//        $this->signInAsInvitado();
//
//        $attrs = [
//            'comentario' => 'Esta es la modificacion',
//            'nombre' => $comentario->invitado()->first()->nombre,
//            'articulo' => 'my-first-post',
//        ];
//
//        $this->patch('/articulos/my-first-post/' . $comentario->id, $attrs)->assertForbidden();
//    }
//
//    /** @test */
//    public function un_comentario_puede_ser_borrado()
//    {
//        $comentario = Comentario::factory()->withInvitado()->create();
//
//        $this->signInAsInvitado($comentario->invitado()->first());
//
//        $attrs = [
//            'comentario' => 'Esta es la modificacion',
//        ];
//
//        $this->delete('/articulos/my-first-post/' . $comentario->id);
//
//        $this->assertDatabaseMissing('comentarios', $attrs);
//    }
//
//    /** @test */
//    public function un_comentario_puede_ser_borrado_solo_por_su_creador()
//    {
//        $comentario = Comentario::factory()->withInvitado()->create();
//
//        $this->signInAsInvitado();
//
//        $attrs = [
//            'comentario' => 'Esta es la modificacion',
//            'nombre' => $comentario->invitado()->first()->nombre,
//            'articulo' => 'my-first-post',
//        ];
//
//        $this->delete('/articulos/my-first-post/' . $comentario->id, $attrs)->assertForbidden();
//    }


}
