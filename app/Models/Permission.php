<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    use HasFactory;

    protected $table = 'permissions';

    public $timestamps = true;

    protected $guarded = [];

    public function roles()
    {
        return $this->belongsToMany(Role::class, 'role_permission', 'permission_id', 'role_id');
    }

    public function childPermission()
    {
        return $this->hasMany(Permission::class, 'parent_id')
            ->with('childPermission');
    }
}
