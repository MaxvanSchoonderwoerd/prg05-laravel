<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'bpm',
        'genre',
        'file',
        'cover',
    ];
}
