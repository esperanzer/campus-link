<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = ([
        'name',
        'gender',
        'course',
        'email',
        'registration_number',
        'year',
        'contact_number',
        'address',
        'photo'
    ]);
}
