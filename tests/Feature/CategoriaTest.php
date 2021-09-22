<?php

namespace Tests\Feature;

use App\Models\Categoria;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CategoriaTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function una_categoria_puede_ser_creada_junto_a_un_articulo(){
        $user = User::factory(['isAdmin' => true])->create();
        $this->signInAsUser($user);

        $attrs = [
            'titulo' => 'Mi artículo de prueba',
            'portada' => 'images/MQQi4TaLIrkTJaEq6UE9NgZeErU66ppncD0POjeJ.jpg',
            'descripcion' => 'Este es un pequeño artículo de una pequeña prueba',
            'articulo' => 'lorem ipsum lorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsum',
            'fecha_publicacion' => null,
            'fijado' => true,
            'categoria' => 'Gatitos y perritos.',
            'megusta' => 10,
        ];

        $this->get('articulos/create')
            ->assertOk();

        $this
            ->followingRedirects()
            ->post('articulos', $attrs)
            ->assertSee($attrs['titulo'])
            ->assertSee('Gatitos y perritos.');


        $attrs = [
            'titulo' => 'Mi artículo de prueba',
            'portada' => 'images/MQQi4TaLIrkTJaEq6UE9NgZeErU66ppncD0POjeJ.jpg',
            'descripcion' => 'Este es un pequeño artículo de una pequeña prueba',
            'articulo' => 'lorem ipsum lorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsum',
            'fecha_publicacion' => null,
            'fijado' => true,
        ];

        $this->assertDatabaseHas('articulos', $attrs);
        $this->assertDatabaseHas('categorias', ['nombre' => 'Gatitos y perritos.']);
    }

    /** @test */
    public function una_categoria_solo_puede_ser_borrada_por_el_admin()
    {
        $cat = Categoria::factory()->create();

        $this
            ->followingRedirects()
            ->delete('/categorias/ ' . $cat->id);

        $this->assertDatabaseHas('categorias', ['nombre' => $cat->nombre]);

        $user = User::factory(['isAdmin' => true])->create();
        $this->signInAsUser($user);

        $this
            ->followingRedirects()
            ->delete('/categorias/ ' . $cat->id);

        $this->assertDatabaseMissing('categorias', ['nombre' => $cat->nombre]);
    }

    /** @test */
    public function una_categoria_solo_puede_ser_editada_por_el_admin()
    {
        $cat = Categoria::factory()->create();
        $attrs = [
            'nombre' => 'De gatos y perros!',
        ];
        $this
            ->followingRedirects()
            ->patch('/categorias/ ' . $cat->id, $attrs);

        $this->assertDatabaseHas('categorias', ['nombre' => $cat->nombre]);

        $user = User::factory(['isAdmin' => true])->create();
        $this->signInAsUser($user);

        $this
            ->followingRedirects()
            ->patch('/categorias/ ' . $cat->id, $attrs);

        $this->assertDatabaseHas('categorias', $attrs);
    }
}
