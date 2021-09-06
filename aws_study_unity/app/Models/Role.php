<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Permission;

class Role extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function permissions() {
        return $this->belongsToMany(Permission::class, 'permission_role', 'role_id', 'permission_id');
    }

    public function users() {
        return $this->belongsToMany(User::class, 'role_user', 'role_id', 'user_id');
    }

    // public function hasPermission($permission) {
    //     // foreach($this->permissions as $permission) {
    //     //     if($permission->name == $permission_name) {
    //     //         return true;
    //     //     }
    //     // }
    //     if($this->permissions->contains($permission))
    //         return true;
    //     else
    //         return false;
    // }
}
