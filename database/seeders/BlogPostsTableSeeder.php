<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\blogPost;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BlogPostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {   
        $users = User::all();
        $postNumber = (int)$this->command->ask("How many posts would you like?", 20);
        blogPost::factory($postNumber)->make()->each(function($post) use($users){
            $post->user_id = $users->random()->id;
            $post->save();
        });
    }
}
