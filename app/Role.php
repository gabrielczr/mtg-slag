<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    //creating the relationships between roles and permissions
    public function permissions()
    {
        return $this->belongsToMany(Permission::class, 'roles_permissions');
    }
}
