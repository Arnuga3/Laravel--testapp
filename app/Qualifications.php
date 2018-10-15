<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Qualifications extends Model
{
    protected $fillable = [
        'title'
    ];

    public function employees()
    {
        return $this->belongsToMany('App\Employees', 'employee_qualifications', 'qualification_id', 'employee_id');
    }
}
