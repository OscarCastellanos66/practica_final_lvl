<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class OperadorPolicy
{
    use HandlesAuthorization;
    
/*
    public function update(User $user){
        return true;
    }*/
}
