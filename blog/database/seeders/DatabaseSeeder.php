<?php

namespace Database\Seeders;

use \App\Models\User;
use \App\Models\Category;
use \App\Models\Post;

//use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::truncate();
        Post::truncate();
        Category::truncate();

//        create a user with fake data, but override name
        $user = User::factory()->create([
            'name' => 'Russell Shire',
        ]);

//          Create five posts with fake data but override user with one I've specified
        Post::factory(5)->create([
            'user_id' => $user->id,
        ]);
    }
}
