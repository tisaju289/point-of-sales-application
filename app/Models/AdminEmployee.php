<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminEmployee extends Model
{
    use HasFactory;
    protected $fillable =[
        'fullName',
        'email',
        'admin_id',
        'role',

    ];
}
