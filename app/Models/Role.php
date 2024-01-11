<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    
    protected $table = 'roles';

    public $timestamps = true;

    protected $guarded = [];

    public function permissions()
    {
        return $this->belongsToMany(Permission::class, 'role_permission', 'role_id', 'permission_id');
    }

    public function roles()
    {
        return $this->belongsToMany(User::class, 'user_role', 'role_id', 'user_id');
    }

}
