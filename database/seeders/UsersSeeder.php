<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userData = config('settings.init_users.admin');
        $query = User::where('email', $userData['email'])->first();
        if (empty($query)) {
            User::create($userData);
            print("User is created");
        }
    }
}
