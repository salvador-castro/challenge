<?php

namespace App\Traits;


trait SuperAdminPolicy
{
    public function before($user)
    {
        if($user->hasRole('SuperAdmin'))
        {
            return true;
        }
    }
}
