<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ApplicantConveniencePeople extends Model
{
    use SoftDeletes;

    protected $table = 'applicant_convenience_people';
}
