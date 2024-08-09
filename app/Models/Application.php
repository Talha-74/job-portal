<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;

    protected $fillable = [
        'id', 'job_id', 'cv', 'user_id', 'image_path', 'job_title', 'job_region', 'company', 'job_type'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }
}
