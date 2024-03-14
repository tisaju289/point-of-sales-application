<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    protected $fillable = ['admin_name','email','password','otp'] ;

    protected $attributes = [
        'otp' => '0'
    ];
    protected $hidden = ['password', 'otp'];


    
}
