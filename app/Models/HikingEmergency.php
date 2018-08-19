<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class HikingEmergency extends Model
{
    use SoftDeletes;

    protected $table = 'hiking_emergencies';

    public function state()
    {
    	return $this->belongsTo('App\Models\State');
    }

    public function country()
    {
    	return $this->belongsTo('App\Models\Country');
    }
}
