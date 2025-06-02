<?php

namespace Database\Seeders;

use Attribute;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        User::create([
            'nama' => 'Dokter Ridwan',
            'alamat' => 'Jl.Santiko No. 1',
            'no_hp' => '081225099450',
            'email' => 'dokterridwan@gmail.com',
            'role' => 'dokter',
            'password' => bcrypt('dokter123'),
        ]);

        User::create([
            'nama' => 'Dokter Budi',
            'alamat' => 'Jl.Budi Speed No. 1',
            'no_hp' => '081225099450',
            'email' => 'dokterbudi@gmail.com',
            'role' => 'dokter',
            'password' => bcrypt('dokter123'),
        ]);

        User::create([
            'nama' => 'Dokter Towa',
            'alamat' => 'Jl.Yami No Towa No.2',
            'no_hp' => '081225099450',
            'email' => 'doktertowa@gmail.com',
            'role' => 'dokter',
            'password' => bcrypt('dokter123'),
        ]);
    }
}
