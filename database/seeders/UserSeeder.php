<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        User::create([
            'name' => 'Admin SiDesa',
            'email' => 'admin@gmail.com',
            'password' => 'admin123',
            'status' => 'approved',
            'role_id' => '1', //Admin
        ]);
    }
}
