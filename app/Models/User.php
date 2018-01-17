<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laratrust\Traits\LaratrustUserTrait;

class User extends Authenticatable
{
    use LaratrustUserTrait;
    use Notifiable;

    protected $fillable = [
        'name', 'email', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function profile() {
        return $this->hasOne('App\Models\UserProfile');
    }

    public function user_profile()
    {
        return $this->belongsTo('App\Models\UserProfile', 'id', 'user_id');
    }

    public function user_role() {
        return $this->hasMany('App\Models\RoleUser');
    }

    public function user_role2() {
        return $this->belongsTo('App\Models\RoleUser', 'id', 'user_id');
    }

    public function user_permission() {
        return $this->hasMany('App\Models\PermissionUser');
    }

    public function userLocation()
    {
        return $this->belongsTo('App\Models\UserLocation', 'id', 'user_id');
    }

    public function allowed_roles($type = 'read') {
        $roles = Role::get()->pluck('name', 'id')->toArray();
        foreach ($roles as $role) {
            if(!$this->can(sprintf("%s-role-%s", $type, $role))) {
                unset($roles[array_search($role, $roles)]);
            }
        }
        return $roles;
    }
}
