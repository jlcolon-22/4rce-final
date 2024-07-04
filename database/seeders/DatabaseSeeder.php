<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use App\Models\EmployeePosition;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(30)->create();

        \App\Models\User::create([
            'name' => '4RCE-ADMIN',
            'email' => '4rceservices@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('admin123'), // password
            'remember_token' => Str::random(10),
        ]);
        EmployeePosition::query()->create([
            'id'=>1,
            'position_name'=>'Foreman'
        ]);
        EmployeePosition::query()->create([
            'id'=>2,
            'position_name'=>'Mason'
        ]);

    }
}
