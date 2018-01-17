<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class HikingHealth extends Model
{
    use SoftDeletes;

    protected $table = 'hiking_healths';
}
