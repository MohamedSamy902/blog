<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'Mohamed Samy',
            'username' => 'mohamed',
            'password' => Hash::make(123123),
            'mobile' => 01150100104,
            'role_name' => 'admin',
            'email' => 'test@example.com',
        ]);
    }
}
