<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ConvenienceSubCategory extends Model
{
    use SoftDeletes;

    protected $table = 'convenience_sub_categories';

    public function convenience_category()
    {
    	return $this->belongsTo('App\Models\ConvenienceCategory');
    }
}
