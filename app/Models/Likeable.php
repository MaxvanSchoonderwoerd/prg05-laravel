<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;

trait Likeable
{
    public function scopeWithLiked(Builder $query)
    {
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

    public function like()
    {
        $userId = auth()->id();

        if ($this->isLikedBy(auth()->user())) {

            $fav = Favourite::all()
                ->where('user_id', $userId)
                ->where('post_id', $this->id);

            $id = head(head((array)$fav))->id;

            $favourite = Favourite::find($id);

            $favourite->delete();

            return;
        }

        $this->favourites()->updateOrCreate(
            [
                'user_id' => $userId
            ],
            [
                'liked' => true
            ]
        );
    }

    public function dislike()
    {
        $userId = auth()->id();

        if ($this->isDislikedBy(auth()->user())) {

            $fav = Favourite::all()
                ->where('user_id', $userId)
                ->where('post_id', $this->id);

            $id = head(head((array)$fav))->id;

            $favourite = Favourite::find($id);

            $favourite->delete();

            return;
        }

        $this->favourites()->updateOrCreate(
            [
                'user_id' => $userId
            ],
            [
                'liked' => false
            ]
        );
    }

    public function isLikedBy(User $user): bool
    {
        return (bool)Favourite::all()
            ->where('user_id', $user->id)
            ->where('post_id', $this->id)
            ->where('liked', true)
            ->count();
    }

    public function isDislikedBy(User $user): bool
    {
        return (bool)Favourite::all()
            ->where('user_id', $user->id)
            ->where('post_id', $this->id)
            ->where('liked', false)
            ->count();
    }
}
