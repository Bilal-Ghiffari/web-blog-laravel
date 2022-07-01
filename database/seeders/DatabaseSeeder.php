<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
            // User::create([
            //     "name" => "bilal al ghiffari",
            //     "username" => "bilal-ghiffari",
            //     "email" => "bilalalghiffari53@gmail.com",
            //     "password" => bcrypt('penumbra')
            // ]);

        User::factory(3)->create();
        Category::create([
            "name" => "Software Development",
            "slug" => "software-development"
        ]);
        Category::create([
            "name" => "Designer",
            "slug" => "designer"
        ]);
        Category::create([
            "name" => "Data Science",
            "slug" => "data-science"
        ]);
        Post::factory(15)->create();
    }
}
