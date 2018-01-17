<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MountainCampground extends Model
{
    use SoftDeletes;

    protected $table = 'mountain_campgrounds';

    public function mountain()
    {
    	return $this->belongsTo('App\Models\Mountain');
    }
}
