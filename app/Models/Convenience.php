<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Convenience extends Model
{
    use SoftDeletes;

    protected $table = 'conveniences';

    public function state()
    {
    	return $this->belongsTo('App\Models\State');
    }

    public function area()
    {
    	return $this->belongsTo('App\Models\Area');
    }

    public function ecoPark()
    {
        return $this->belongsTo('App\Models\EcoPark');
    }

    public function convenience_category()
    {
        return $this->belongsTo('App\Models\ConvenienceCategory')->orderBy('name');
    }

    public function convenience_sub_category()
    {
        return $this->belongsTo('App\Models\ConvenienceSubCategory', 'id', 'convenience_id');
    }

    public function convenience_price()
    {
        return $this->hasMany('App\Models\ConveniencePrice');
    }

    public function capacity_category()
    {
        return $this->belongsTo('App\Models\CapacityCategory');
    }
}
