<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employees extends Model
{
    protected $fillable = [
        'firstname',
        'lastname',
        'company',
        'email',
        'phone'
    ];
}
