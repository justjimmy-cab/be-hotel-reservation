<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        User::create([
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'role' => 'admin', 
            'password' => Hash::make('password'),
        ]);

        User::create([ 
            'name' => 'Customer User', 
            'email' => 'customer@example.com', 
            'password' => Hash::make('password'), 
            'role' => 'customer',
        ]);

        User::factory()->count(20)->create();
    }
}


