<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $defaultImage = 'uploads/2W1kl1F2VP7ER7aWOnP7PEbRlbpZCauYUgbtIb9X.png';
        $users = [
            ['name' => 'Alex Johnson', 'email' => 'alice@example.com', 'username' => 'alex', 'bio' => 'Bio do alex'],
            ['name' => 'Bob Smith', 'email' => 'bob@example.com', 'username' => 'bobsmith', 'bio' => 'Bio do Bob'],
            ['name' => 'Charlie Brown', 'email' => 'charlie@example.com', 'username' => 'charlieb', 'bio' => 'Bio do Charlie'],
            ['name' => 'David Clark', 'email' => 'david@example.com', 'username' => 'davidclark', 'bio' => 'Bio do David'],
            ['name' => 'Eve White', 'email' => 'eve@example.com', 'username' => 'evew', 'bio' => 'Bio da Eve']
        ];

        foreach ($users as $userData) {
            User::create([
                'name' => $userData['name'],
                'email' => $userData['email'],
                'password' => Hash::make('password'),
                'username' => $userData['username'],
                'bio' => $userData['bio'],
                'profile_picture' => $defaultImage,
            ]);
        }

        $this->command->info("5 usuários criados com sucesso!");
    }
}
