<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StateUser extends Model
{
    use SoftDeletes;

    protected $table = 'state_users';
}
