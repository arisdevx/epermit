<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ApplicantConvenience extends Model
{
	use SoftDeletes;
	
    protected $table = 'applicant_conveniences';

    public function convenience()
    {
    	return $this->belongsTo('App\Models\Convenience');
    }

    public function state()
    {
    	return $this->belongsTo('App\Models\State');
    }

    public function area()
    {
    	return $this->belongsTo('App\Models\Area');
    }

    public function applicant_convenience_people()
    {
        return $this->hasMany('App\Models\ApplicantConveniencePeople');
    }

    public function applicant_convenience_unit()
    {
        return $this->belongsTo('App\Models\ApplicantConvenienceUnit', 'id', 'applicant_convenience_id');
    }

    public function eco_park()
    {
        return $this->belongsTo('App\Models\EcoPark');
    }

    public function applicant_convenience_declaration()
    {
        return $this->belongsTo('App\Models\ApplicantConvenienceDeclaration', 'id', 'applicant_id');
    }

    public function convenience_category()
    {
        return $this->belongsTo('App\Models\ConvenienceCategory');
    }
}
