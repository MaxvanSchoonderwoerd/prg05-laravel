<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    protected $model = Post::class;

    public function definition(): array
    {
        return [
            'title' => $this->faker->randomElement(['Autumn', 'Jungle', 'Jignle', 'Nordic', 'Faded', 'Audi', 'Drake type beat', 'Playboi carti type beat', 'Travis type beat', 'Ocean']),
            'description' => $this->faker->paragraph(),
            'bpm' => $this->faker->numberBetween(60, 180),
            'genre' => $this->faker->randomElement(['Hiphop', 'Trap', 'Drill', 'RnB', 'Pop', 'House', 'Drum And Bass', '2step', 'Garage', 'Other']),
            'file' => $this->faker->word() . '.mp3', // adjust based on actual file handling
            'cover' => 'https://picsum.photos/1080/1080',
            'enabled' => true,
            'user_id' => User::factory(), // if you want to auto-generate users too
        ];
    }
}

