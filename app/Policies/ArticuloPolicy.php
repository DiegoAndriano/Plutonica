<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ArticuloPolicy
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
     * Perform pre-authorization checks.
     *
     * @param  \App\Models\User  $user
     * @param  string  $ability
     * @return void|bool
     */
    public function before(User $user, $ability)
    {
        return $user->isAdmin;
    }

    public function create()
    {
        return auth()->user()->isAdmin;
    }

    public function update()
    {
        return auth()->user()->isAdmin;
    }

    public function destroy()
    {
        return auth()->user()->isAdmin;
    }
}
