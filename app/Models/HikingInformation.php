<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class HikingInformation extends Model
{
    use SoftDeletes;

    protected $table = 'hiking_informations';

    public function mountain()
    {
    	return $this->belongsTo('App\Models\Mountain');
    }

    public function permanent_forest()
    {
    	return $this->belongsTo('App\Models\PermanentForest');
    }
}
