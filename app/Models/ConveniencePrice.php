<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ConveniencePrice extends Model
{
    use SoftDeletes;

    protected $table = 'convenience_prices';

    public function price_category()
    {
    	return $this->belongsTo('App\Models\PriceCategory');
    }
}
