<?php

namespace Database\Seeders;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Dotenv\Util\Str;
use Faker\Core\Blood;
use App\Models\Comment;
use App\Models\blogPost;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Database\Seeders\UsersTableSeeder;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        // making seeder interactive
        if($this->command->confirm("Do you want to refresh the database?")) {
            $this->command->call("migrate:refresh");
            $this->command->info("Database was refreshed.");
        }
        // call seeders
        $this->call([
            UsersTableSeeder::class,
            BlogPostsTableSeeder::class,
            CommentssTableSeeder::class
        ]);

        // defaul user
        // User::create([
        //     "name"=> "ali parsa",
        //     "email"=> "ali@gmail.com",
        //     "password"=> Hash::make("parsa"),
        //     'is_admin' => true
        // ]);



        //================================== 1 way of using sedder
        // $users = User::factory(8)->create();
        // $posts = blogPost::factory(8)->make()->each(function($post) use($users){
        //     $post->user_id = $users->random()->id;
        //     $post->save();
        // });
        // $comments = Comment::factory(8)->make()->each(function($comment) use($posts){
        //     $comment->blog_post_id = $posts->random()->id;
        //     $comment->save();
        // });
        // dd($comments->count());



        // User::factory()->states(['name'=>"ali-parsa", "email"=> "ali@gmail.com"])->create();
        // \App\Models\User::create([
        //     "name"=> "Murtaza",
        //     "email"=> "mh@gmail.com",
        //     "password"=> Hash::make("parsa")
        // ]);
        // \App\Models\User::create([
        //     "name"=> "Ali",
        //     "email"=> "ali@gmail.com",
        //     "password"=> Hash::make("parsa")
        // ]);
        // Comment::factory()->count(10)->create();
        // blogPost::factory()->count(10)->create();
        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
