<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class PembeliPolicy
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
    public function pembeliPermission(User $user)
    {
        return ($user->role == "pembeli" ? Response::allow() : Response::deny("Access denied!"));
    }
}
