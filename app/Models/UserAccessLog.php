<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserAccessLog extends Model
{
    use SoftDeletes;

    protected $table = 'user_access_logs';

    public function user()
    {
    	return $this->belongsTo('App\Models\User');
    }
}
