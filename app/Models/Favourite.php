<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favourite extends model
{
    use HasFactory;

    protected $guarded = [];

    protected $fillable = [
        'user_id',
        'post_id',
        'liked',
    ];

    public function user()
    {
        $this->hasMany(User::class);
    }

    public function post()
    {
        $this->hasMany(Post::class);
    }
}
