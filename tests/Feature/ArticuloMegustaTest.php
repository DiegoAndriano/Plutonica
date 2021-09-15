<?php

namespace Tests\Feature;

use App\Models\Articulo;
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

        $this->post('articulos/' . $articulo->id . '/like');
        $this->post('articulos/' . $articulo->id . '/like');
        $this->post('articulos/' . $articulo->id . '/like');
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
}
