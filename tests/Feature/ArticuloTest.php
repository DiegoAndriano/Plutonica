<?php

namespace Tests\Feature;

use App\Models\Articulo;
use App\Models\Categoria;
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
        $cat = Categoria::factory()->create();

        $attrs = [
            'titulo' => 'Mi artículo de prueba',
            'descripcion' => 'Este es un pequeño artículo de una pequeña prueba',
            'articulo' => 'lorem ipsum lorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsum',
            'fecha_publicacion' => null,
            'publicado' => true,
            'fijado' => true,
            'categoria' => $cat->nombre,
        ];

        $this->get('articulos/create')
            ->assertOk();

        $this
            ->followingRedirects()
            ->post('articulos', $attrs)
            ->assertSee($attrs['titulo'])
            ->assertSee($cat->nombre);

        $attrs = [
            'titulo' => 'Mi artículo de prueba',
            'descripcion' => 'Este es un pequeño artículo de una pequeña prueba',
            'articulo' => 'lorem ipsum lorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsum',
            'fecha_publicacion' => null,
            'publicado' => true,
            'fijado' => true,
        ];

        $this->assertDatabaseHas('articulos', $attrs);
    }

    /** @test */
    public function un_articulo_puede_ser_creado_sin_categoria()
    {
        $user = User::factory(['isAdmin' => true])->create();
        $this->signInAsUser($user);

        $attrs = [
            'titulo' => 'Mi artículo de prueba',
            'descripcion' => 'Este es un pequeño artículo de una pequeña prueba',
            'articulo' => 'lorem ipsum lorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsum',
            'fecha_publicacion' => null,
            'publicado' => true,
            'fijado' => true,
            'categoria' => null,
        ];

        $this->get('articulos/create')
            ->assertOk();

        $this
            ->followingRedirects()
            ->post('articulos', $attrs)
            ->assertSee($attrs['titulo']);


        $attrs = [
            'titulo' => 'Mi artículo de prueba',
            'descripcion' => 'Este es un pequeño artículo de una pequeña prueba',
            'articulo' => 'lorem ipsum lorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsum',
            'fecha_publicacion' => null,
            'publicado' => true,
            'fijado' => true,
        ];

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

        $this
            ->followingRedirects()
            ->patch('articulos/' . $articulo->id, $attrs)
            ->assertSee($attrs['titulo']);

        $this->assertDatabaseHas('articulos', $attrs);
    }

    /** @test */
    public function la_categoria_de_un_articulo_puede_ser_editado()
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
            'fijado' => true,
            'categoria' => 'De gatitos y de perritos.'
        ];

        $this->get('articulos/edit/' . $articulo->id, $attrs)
            ->assertOk();

        $this
            ->followingRedirects()
            ->patch('articulos/' . $articulo->id, $attrs)
            ->assertSee($attrs['titulo']);

        $attrs = [
            'titulo' => 'Editado',
            'descripcion' => 'Este es un pequeño artículo de una pequeña prueba',
            'articulo' => 'lorem ipsum lorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsum',
            'fecha_publicacion' => null,
            'publicado' => true,
            'fijado' => true,
        ];

        $this->assertDatabaseHas('articulos', $attrs);
        $this->assertDatabaseHas('categorias', ['nombre' => 'De gatitos y de perritos.']);
    }

    /** @test */
    public function un_articulo_puede_ser_borrado()
    {
        $user = User::factory(['isAdmin' => true])->create();
        $this->signInAsUser($user);

        $articulo = Articulo::factory()->create();

        $this
            ->followingRedirects()
            ->delete('articulos/' . $articulo->id)
            ->assertDontSee($articulo->titulo);

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

        $this
            ->followingRedirects()
            ->post('articulos', $attrs)
            ->assertForbidden()
            ->assertDontSee($attrs['titulo']);

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

        $this
            ->followingRedirects()
            ->patch('articulos/' . $articulo->id, $attrs)
            ->assertForbidden();

        $this->assertDatabaseMissing('articulos', $attrs);
    }


    /** @test */
    public function un_usuario_no_admin_no_puede_borrar_un_articulo()
    {
        $user = User::factory(['isAdmin' => false])->create();
        $this->signInAsUser($user);

        $articulo = Articulo::factory()->create();

        $this
            ->followingRedirects()
            ->delete('articulos/' . $articulo->id)
            ->assertForbidden();

        $this->assertDatabaseHas('articulos', ['id' => $articulo->id]);
    }
}
