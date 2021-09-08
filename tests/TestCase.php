<?php

namespace Tests;

use App\Models\Invitado;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    protected function signInAsInvitado($invitado = null)
    {
        $invitado = $invitado ?: Invitado::factory()->create();

        $this->actingAs($invitado);

        return $invitado;
    }
}
