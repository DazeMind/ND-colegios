<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SchoolUser extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'school_id',
        'user_id',
    ];
}
