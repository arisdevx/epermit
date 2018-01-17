<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class HikingParticipant extends Model
{
    use SoftDeletes;

    protected $table = 'hiking_participants';

    public function user()
    {
    	return $this->belongsTo('App\Models\User');
    }

    public function hikingBiodata()
    {
    	return $this->belongsTo('App\Models\HikingBiodata', 'id', 'hiking_participant_id');
    }
}
