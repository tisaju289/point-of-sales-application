<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'email',
        'portfolio',
        'resume',
        'cover_letter',
    ];


//     public function job()
//     {
//         return $this->belongsTo(Job::class);
//     }

//     public function user()
//     {
//         return $this->belongsTo(User::class);
// }
}
