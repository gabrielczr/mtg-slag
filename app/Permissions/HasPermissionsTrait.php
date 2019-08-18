<?php

namespace App\Permissions;

use App\Permission;
use App\Role;

trait HasPermissionsTrait
{

  public function roles()
  {
    return $this->belongsToMany(Role::class, 'users_roles');
  }


  public function permissions()
  {
    return $this->belongsToMany(Permission::class, 'users_permissions');
  }


  // setting up the roles of the users
  public function hasRole(...$roles)
  {
    foreach ($roles as $role) {
      if ($this->roles->contains('slug', $role)) {
        return true;
      }
    }
    return false;
  }

  protected function hasPermissionTo($permission)
  {
    //return $this->hasPermission($permission);
    return $this->hasPermissionThroughRole($permission) || $this->hasPermission($permission);
  }

  protected function hasPermission($permission)
  {
    return (bool) $this->permissions->where('slug', $permission->slug)->count();
  }

  /*
  We’ll be utilizing the Laravel’s “can” directive to check if the User have Permission. and instead of using $user->hasPermissionTo(), we’ll use $user->can() 
  */

  public function hasPermissionThroughRole($permission)
  {
    foreach ($permission->roles as $role) {
      if ($this->roles->contains($role)) {
        return true;
      }
    }
    return false;
  }

  //give a set of permissions to a logged in user
  public function givePermissionsTo(...$permissions)
  {
    $permissions = $this->getAllPermissions($permissions);
    dd($permissions);
    if ($permissions === null) {
      return $this;
    }
    $this->permissions()->saveMany($permissions);
    return $this;
  }
  // deleting or removing permissions from the user scop
  public function deletePermissions(...$permissions)
  {
    $permissions = $this->getAllPermissions($permissions);
    $this->permissions()->detach($permissions);
    return $this;
  }
}
