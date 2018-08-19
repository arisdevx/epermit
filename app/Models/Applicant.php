<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Applicant extends Model
{
    use SoftDeletes;

    protected $table = 'applicants';

    public function hikingInformation()
    {
    	return $this->belongsTo('App\Models\HikingInformation', 'id', 'applicant_id');
    }
    public function hikingDeclaration()
    {
        return $this->belongsTo('App\Models\HikingDeclaration', 'id', 'applicant_id');
    }

    public function applicantOtherActivity()
    {
    	return $this->belongsTo('App\Models\ApplicantOtherActivity', 'id', 'applicant_id');
    }

    public function hikingParticipant()
    {
        return $this->hasMany('App\Models\HikingParticipant');
    }
    public function hikingGuide()
    {
        return $this->hasMany('App\Models\HikingGuide');
    }
    
    public function applicantConvenience()
    {
        return $this->belongsTo('App\Models\ApplicantConvenience', 'id', 'applicant_id');
    }

    public function applicantConveniences()
    {
        return $this->hasMany('App\Models\ApplicantConvenience');
    }

    public function applicant_convenience()
    {
        return $this->hasMany('App\Models\ApplicantConvenience');
    }

    public function applicant_convenience_declaration()
    {
        return $this->belongsTo('App\Models\ApplicantConvenienceDeclaration', 'id', 'applicant_id');
    }

    public function hikingLocation()
    {
        return $this->belongsTo('App\Models\HikingLocation', 'id', 'applicant_id');
    }

    public function hiking_campground()
    {
        return $this->hasMany('App\Models\HikingCampground');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
