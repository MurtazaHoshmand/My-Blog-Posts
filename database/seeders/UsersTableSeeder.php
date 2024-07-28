<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userNumber = max((int)$this->command->ask("How many users would you like?", 8), 1);
        User::create([
            "name"=> "ali parsa",
            "email"=> "ali@gmail.com",
            "password"=> Hash::make("parsa"),
            'is_admin' => true
        ]);
        User::factory($userNumber)->create();

    }
}
