<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmployeeQualifications extends Model
{
    protected $fillable = [
        'employee_id',
        'qualification_id',
        'date_achieved',
        'grade'
    ];
}
