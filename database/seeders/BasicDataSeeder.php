<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
class BasicDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin =User::create([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'type' => 'admin',
            'email_verified_at' => now(),
            'password' =>'admin@123',
            'remember_token' => Str::random(10)
        ]);
        $user =User::create([
            'name' => 'user',
            'email' => 'user@user.com',
            'type' => 'user',
            'email_verified_at' => now(),
            'password' =>'user@123',
            'remember_token' => Str::random(10)
        ]);
    }
}
