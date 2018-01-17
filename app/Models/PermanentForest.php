<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PermanentForest extends Model
{
    protected $table = 'permanent_forests';

    public function state()
    {
    	return $this->belongsTo('App\Models\State');
    }

    public function area()
    {
    	return $this->belongsTo('App\Models\Area');
    }

    public function mountain()
    {
    	return $this->belongsTo('App\Models\Mountain');
    }
}
