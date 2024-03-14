<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable = ['company_name','location','email','mobile','password','otp'] ;

    protected $attributes = [
        'otp' => '0'
    ];
    protected $hidden = ['password', 'otp'];


    public function Job()
    {
        return $this->hasMany(Job::class);
    }
}

