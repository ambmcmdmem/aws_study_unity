<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permisson extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function roles() {
        return $this->belongsToMany(Role::class, 'permission_role', 'permission_id', 'role_id');
    }

    public function users() {
        return $this->belongsToMany(User::class, 'permission_user', 'permission_id', 'role_id');
        
    }
}
