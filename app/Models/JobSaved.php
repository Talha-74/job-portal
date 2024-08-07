<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobSaved extends Model
{
    use HasFactory;

    protected $fillable = [
        'job_id',
        'user_id',
        'image_path',
        'job_title',
        'job_region',
        'job_type',
        'company',
    ];
}
