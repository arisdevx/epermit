<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ApplicantOtherActivityDeclaration extends Model
{
    use SoftDeletes;

    protected $table = 'applicant_other_activity_declarations';
}
