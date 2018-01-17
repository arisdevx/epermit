<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{
    protected $fillable = ['user_id'];

    public function state()
    {
    	return $this->belongsTo('App\Models\State', 'state');
    }
}
