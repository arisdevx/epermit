<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StateForestry extends Model
{
    use SoftDeletes;

    protected $table = 'state_forestries';

    public function state()
    {
    	return $this->belongsTo('App\Models\State');
    }
}
