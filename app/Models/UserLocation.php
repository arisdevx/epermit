<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserLocation extends Model
{
    use SoftDeletes;

    protected $table = 'user_locations';

    public function state()
    {
    	return $this->belongsTo('App\Models\State');
    }

    public function area()
    {
    	return $this->belongsTo('App\Models\Area');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
