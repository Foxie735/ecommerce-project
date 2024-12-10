<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB as DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'Axel Savero',
            'email' => 'axelsavero@gmail.com',
            'password' => Hash::make("Adminfushop123"),
            'telephone' => '081381721708',
            'address' => 'Jl. Penggilingan No.12',
            'role' => 'Admin',
        ]);
    }
}
