<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends model
{
    use HasFactory;

    public function scopeFilter($query, array $filters)
    {
        if ('enabled' ?? false) {
            $query->where('enabled', 'like', '1');
        }
        if ($filters['search'] ?? false) {
            $query->where('title', 'like', '%' . request('search') . '%');
        }

        if ($filters['genre'] ?? false) {

            $query->where('genre', 'like', '%' . request('genre') . '%');
        }

        if ($filters['bpm'] ?? false) {
            $firstBpm = intval(request('bpm'));
            $secondBpm = intval(request('bpm')) + 20;
            $query->whereBetween('bpm', [$firstBpm, $secondBpm])->get();
        }
    }

    /**
     * Get the user that owns the phone.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    protected $fillable = [
        'title',
        'description',
        'bpm',
        'genre',
        'file',
        'cover',
        'enabled'
    ];
}
