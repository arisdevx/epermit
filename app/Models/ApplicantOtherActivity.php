<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ApplicantOtherActivity extends Model
{
    use SoftDeletes;

    protected $table = 'applicant_other_activities';

    public function state()
    {
    	return $this->belongsTo('App\Models\State');
    }

    public function area()
    {
    	return $this->belongsTo('App\Models\Area');
    }

    public function othersActivity()
    {
    	return $this->belongsTo('App\Models\OthersActivity', 'other_activity_id', 'id');
    }

    public function eco_park()
    {
        return $this->belongsTo('App\Models\EcoPark', 'relation_id', 'id');
    }

    public function permanent_forest()
    {
        return $this->belongsTo('App\Models\PermanentForest', 'relation_id', 'id');
    }

    public function applicant_other_activity_detail()
    {
        return $this->belongsTo('App\Models\ApplicantOtherActivityDetail', 'id', 'applicant_other_activity_id');
    }

    public function applicant_other_activity_declaration()
    {
        return $this->belongsTo('App\Models\ApplicantOtherActivityDeclaration', 'id', 'applicant_other_activity_id');
    }
}
