<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Auth;

class UserPolicy
{
    use HandlesAuthorization;
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }
    public function before($authUser,$ability){
        if($authUser->isAdmin())
        {
            return true;
        }
    }
    
    public function edit(User $authUser, User $user)
    {
        return $authUser->id === $user->id;
    }
    public function update(User $authUser, User $user)
    {
        return $authUser->id === $user->id;
    }
    public function destroy(User $authUser, User $user)
    {
        return $authUser->id === $user->id;
    }
    
}
