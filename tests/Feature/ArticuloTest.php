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
        $user = User::factory(['isAdmin' => true])->create();
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
        $user = User::factory(['isAdmin' => true])->create();
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
        $user = User::factory(['isAdmin' => true])->create();
        $this->signInAsUser($user);

        $articulo = Articulo::factory()->create();

        $this->delete('articulos/' . $articulo->id)
            ->assertRedirect();

        $this->assertDatabaseMissing('articulos', ['id' => $articulo->id]);
    }

    /** @test */
    public function un_usuario_no_admin_no_puede_crear_un_articulo()
    {
        $user = User::factory(['isAdmin' => false])->create();
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
        $user = User::factory(['isAdmin' => false])->create();
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
        $user = User::factory(['isAdmin' => false])->create();
        $this->signInAsUser($user);

        $articulo = Articulo::factory()->create();

        $this->delete('articulos/' . $articulo->id)
            ->assertForbidden();

        $this->assertDatabaseHas('articulos', ['id' => $articulo->id]);
    }
}
