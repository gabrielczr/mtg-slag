<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    //creating the relationships between roles and permissions
    public function roles()
    {
        return $this->belongsToMany(Role::class, 'roles_permissions');
    }
}
