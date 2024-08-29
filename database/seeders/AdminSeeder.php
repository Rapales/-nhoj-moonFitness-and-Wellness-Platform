<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->create([
            'role' => 'admin',
            'name' => 'Nelson John Montezo 1',
            'email' => 'nj.montezo08@fwpstudio.com',
            'age' => '22 yrs old',
            'phone_number' => '09676159289',
            'gender' => 'Male',
            'password' => Hash::make('pass1234'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
