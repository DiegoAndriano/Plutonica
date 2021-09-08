<?php

namespace App\Services;

use App\Models\Invitado;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class CrearInvitado{

    private $nombre;
    private $email;
    private $passcode;

    public function __construct($nombre = null, $email = null)
    {
        $this->nombre = $nombre;
        $this->email = $email;
        $this->passcode = Hash::make(Str::random(16));
    }

    public function perform()
    {
        $this->handle();
    }

    private function handle()
    {
        $invitado = Invitado::create([
            'nombre' => $this->nombre,
            'email' => $this->email,
            'passcode' => $this->passcode,
        ]);

        auth()->login($invitado);
    }

}
