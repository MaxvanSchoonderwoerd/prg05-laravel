<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favourite extends model
{
    use HasFactory;

    public function favouritePost($postId, $userId)
    {

    }

    protected $fillable = [
        'user_id',
        'post_id',
        'liked',
    ];
}
