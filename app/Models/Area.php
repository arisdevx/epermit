<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Area extends Model
{

    protected $table = 'areas';

    public function state()
    {
    	return $this->belongsTo('App\Models\State');
    }
}
