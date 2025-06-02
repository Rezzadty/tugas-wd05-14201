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
        User::create([
            'nama' => 'Administrator',
            'email' => 'admin@admin.com',
            'alamat' => 'Jl.Admin No. 1',
            'no_hp' => '081225099450',
            'password' => Hash::make('admin123'),
            'role' => 'admin',
        ]);
    }
}