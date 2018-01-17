<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PriceCategory extends Model
{
    use SoftDeletes;

    protected $table = 'price_categories';

    public function convenience_price()
    {
    	return $this->belongsTo('App\Models\ConveniencePrice');
    }
}
