<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class HikingGuide extends Model
{
    use SoftDeletes;

    protected $table = 'hiking_guides';

    public function user()
    {
    	return $this->hasMany('App\Models\User');
    }

    public function applicant()
    {
    	return $this->belongsTo('App\Models\Applicant');
    }
}
