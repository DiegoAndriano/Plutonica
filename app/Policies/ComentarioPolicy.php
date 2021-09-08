<?php

namespace App\Policies;

use App\Models\Comentario;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Auth;

class ComentarioPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * @param Authenticatable $user
     * @param Comentario $comentario
     * @return bool
     */
    public function update(Authenticatable $user, Comentario $comentario)
    {
        return $user->is($comentario->invitado()->first());
    }
}
