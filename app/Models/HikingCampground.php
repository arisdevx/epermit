<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class HikingCampground extends Model
{
    use SoftDeletes;

    protected $table = 'hiking_campgrounds';

    public function mountain_campground()
    {
    	return $this->belongsTo('App\Models\MountainCampground');
    }
}
