<?php

use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Config;

if(!function_exists('is_admin')) {
    function is_admin(User $user)
    {
        $adminRole = Role::wgere(
            'name',
            '=',
            Config::get('constants.db.roles.admin')
        );
        return $user->roles_id === $adminRole->id;
    }
}