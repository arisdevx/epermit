<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Mountain extends Model
{
    use SoftDeletes;

    protected $table = 'mountains';

    public function state()
    {
    	return $this->belongsTo('App\Models\State');
    }

    public function area()
    {
    	return $this->belongsTo('App\Models\Area');
    }

    public function permanent_forest()
    {
        return $this->belongsTo('App\Models\PermanentForest');
    }

    public function mountain_related()
    {
        return $this->hasMany('App\Models\MountainRelated');
    }
}
