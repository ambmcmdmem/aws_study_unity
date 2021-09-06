<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function roles() {
        return $this->belongsToMany(Role::class, 'permission_role', 'permission_id', 'role_id');
    }

    public function users() {
        return $this->belongsToMany(User::class, 'permission_user', 'permission_id', 'role_id');
        
    }

    public function hasRole($role_name) {
        foreach($this->roles as $role) {
            if($role->name == $role_name) {
                return true;
            }
        }
        return false;
    }
}
