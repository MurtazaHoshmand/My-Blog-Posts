<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\blogPost;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CommentssTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {   
        $posts = blogPost::all();
        $users = User::all();
        if ($posts->count() ===0) {
            $this->command->info("There are no blogposts!");
            return;
        }
        $comNumber = (int)$this->command->ask("How many comments would you like?", 80);
        Comment::factory($comNumber)->make()->each(function($comment) use($posts, $users){
            $comment->blog_post_id = $posts->random()->id;
            $comment->user_id = $users->random()->id;
            $comment->save();
        });
    }
}
