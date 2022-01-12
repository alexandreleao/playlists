<?php

namespace Database\Factories;

use App\Models\Playlist;
use Illuminate\Database\Eloquent\Factories\Factory;

class PlaylistFactory extends Factory
{
    
    protected $model = Playlist::class;
   
    public function definition()
    {
        return [
            'title' => $this->faker->title(),
            'description' => $this->faker->text()
        ];
    }
}
