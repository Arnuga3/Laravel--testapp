<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Companies extends Model
{
    protected $fillable = [
        'name',
        'email',
        'logo',
        'website'
    ];

    public function employees()
    {
        return $this->hasMany('App\Employees', 'company_id');
    }
}
