<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;

trait Likeable
{
    /**
     * Scope a query to include posts with their likes and dislikes.
     *
     * @param Builder $query
     * @return void
     */
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

    /**
     * Like the post
     *
     * @return void
     */
    public function like()
    {
        $userId = auth()->id();

        if ($this->isLikedBy(auth()->user())) {

            $fav = Favourite::all()
                ->where('user_id', $userId)
                ->where('post_id', $this->id);

            $id = head(head((array) $fav))->id;

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

    /**
     * Dislike a post
     *
     * @return void
     */
    public function dislike()
    {
        $userId = auth()->id();

        if ($this->isDislikedBy(auth()->user())) {

            $fav = Favourite::all()
                ->where('user_id', $userId)
                ->where('post_id', $this->id);

            $id = head(head((array) $fav))->id;

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

    /**
     * Check if the post is liked by the user
     *
     * @param User $user
     * @return bool
     */
    public function isLikedBy(User $user): bool
    {
        return (bool) Favourite::all()
            ->where('user_id', $user->id)
            ->where('post_id', $this->id)
            ->where('liked', true)
            ->count();
    }

    /**
     * Check if the post is disliked by the user
     *
     * @param User $user
     * @return bool
     */
    public function isDislikedBy(User $user): bool
    {
        return (bool) Favourite::all()
            ->where('user_id', $user->id)
            ->where('post_id', $this->id)
            ->where('liked', false)
            ->count();
    }
}
