<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class HikingBiodata extends Model
{
	use SoftDeletes;
    protected $table = 'hiking_biodatas';

    public function hikingParticipant()
    {
    	return $this->belongsTo('App\Models\HikingBiodata');
    }
}
