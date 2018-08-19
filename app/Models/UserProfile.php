<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{
    protected $fillable = ['user_id'];

    public function state_user()
    {
    	return $this->belongsTo('App\Models\StateUser', 'state');
    }

    public function country()
    {
    	return $this->belongsTo('App\Models\Country', 'id', 'country');
    }
}
