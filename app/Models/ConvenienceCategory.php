<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ConvenienceCategory extends Model
{
    use SoftDeletes;

    protected $table = 'convenience_categories';
}
