<?php

namespace Tests\Unit;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UploadImageTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function una_imagen_puede_ser_subida(){
        $user = User::factory(['isAdmin' => true])->create();
        $this->signInAsUser($user);

        $this->markTestSkipped();
//        $this->postJson('/upload', [
//            'imagen' => new \Illuminate\Http\UploadedFile(storage_path('images/cielita.jpg'), 'cielita.jpg', null, null, true),
//        ])->assertOk();
    }
}
