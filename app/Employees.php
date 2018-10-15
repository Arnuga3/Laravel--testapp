<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employees extends Model
{
    protected $fillable = [
        'firstname',
        'lastname',
        'company_id',
        'email',
        'phone'
    ];

    public function company()
    {
        return $this->belongsTo('App\Companies');
    }

    public function qualifications()
    {
        return $this->belongsToMany('App\Qualifications', 'employee_qualifications', 'employee_id', 'qualification_id')->withPivot('date_achieved', 'grade');
    }

}
