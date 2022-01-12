<?php

namespace Database\Seeders\factory;

use Illuminate\Database\Seeder;

class PlaylistTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Playlist::factory(10)->create();
    }
}
