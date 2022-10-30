<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;

trait Likeable
{
    public function scopeWithLiked(Builder $query){
        $query->leftJoinSub(
            'select post_id, sum(liked) likes, sum(!liked) dislikes from favourites group by post_id',
            'liked',
            'post_id',
            'posts.id'
        );
    }

    public function favourites()
    {
        return $this->hasMany(Favourite::class);
    }

    public function like($user = null, $liked = true)
    {
        $this->favourites()->updateOrCreate(
            [
                'user_id' => auth()->id()
            ],
            [
                'liked' => $liked
            ]
        );
    }

    public function dislike($user = null)
    {
        $this->like($user, false);
    }

    public function isLikedBy(User $user): bool
    {
        return (bool)$user->favourite
            ->where('post_id', $this->id)
            ->where('liked', true)
            ->count();
    }

    public function isDislikedBy(User $user): bool
    {
        return (bool)$user->favourite
            ->where('post_id', $this->id)
            ->where('liked', false)
            ->count();
    }
}
