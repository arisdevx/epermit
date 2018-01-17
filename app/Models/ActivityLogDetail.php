<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ActivityLogDetail extends Model
{
    use SoftDeletes;

    protected $table = 'activity_log_details';
}
