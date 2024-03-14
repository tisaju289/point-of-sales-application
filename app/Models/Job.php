<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;
    protected $fillable =[
        'title',
        'company_id',
        'category_id',
        'jobtype_id',
        'vacancy',
        'salary',
        'location',
        'description',
        'benefits',
        'experience',
        'responsibility',
        'qualification',
        'keyword',
        'company_name',
        'company_location',
        'website',
        'published_date',
        'company_img',
        'apply_last_date'
    ];


    public function Company()
    {
        return $this->belongsTo(Company::class);
    }
}
