<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ApplicantOtherActivityDetail extends Model
{
    use SoftDeletes;

    protected $table = 'applicant_other_activity_details';

    public function country()
    {
    	return $this->belongsTo('App\Models\Country');
    }

    public function state()
    {
    	return $this->belongsTo('App\Models\State');
    }

    public function applicant_other_activity()
    {
        return $this->belongsTo('App\Models\ApplicantOtherActivity');
    }
}
