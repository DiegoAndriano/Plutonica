<?php

namespace Tests\Unit;

use App\Models\Articulo;
use App\Models\Categoria;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Carbon;
use Tests\TestCase;

class ArticuloTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function un_articulo_tiene_una_propiedad_publicado(){
        $articulo = Articulo::factory(['fecha_publicacion' => Carbon::now()->subDay()])->create();

        $this->assertTrue($articulo->publicado);
    }

    /** @test */
    public function megustas_total(){
        $user = User::factory(['isAdmin' => true])->create();
        $this->signInAsUser($user);
        $cat = Categoria::factory()->create();

        $attrs = [
            'titulo' => 'Mi artículo de prueba',
            'portada' => 'images/MQQi4TaLIrkTJaEq6UE9NgZeErU66ppncD0POjeJ.jpg',
            'descripcion' => 'Este es un pequeño artículo de una pequeña prueba',
            'articulo' => 'lorem ipsum lorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsum',
            'fecha_publicacion' => null,
            'fijado' => true,
            'categoria' => $cat->nombre,
            'megusta' => 10,
        ];

        $this->post('articulos', $attrs);

        $this->assertEquals(10, Articulo::first()->megustas_total());
    }
}
