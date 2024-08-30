<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrendingKeywords extends Model
{
    use HasFactory;

    protected $fillable = ['keyword'];
}
