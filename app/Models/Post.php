<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends model
{
    use HasFactory;
    use Likeable;

    public function scopeFilterEnabled($query)
    {
        if ('enabled' ?? false) {
            $query->where('enabled', 'like', '1');
        }
    }

    public function scopeFilterSearch($query)
    {
        if (request('search') ?? false) {
            $query->where('title', 'like', '%' . request('search') . '%');
        }

    }

    public function scopeFilterGenre($query)
    {
        if (request('genre') ?? false) {
            $query->where('genre', 'like', '%' . request('genre') . '%');
        }
    }

    public function scopeFilterBpm($query)
    {
        if (request('bpm') ?? false) {
            $bpm = intval(request('bpm'));
            $query->whereBetween('bpm', [$bpm, $bpm + 20])->get();
        }
    }

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
