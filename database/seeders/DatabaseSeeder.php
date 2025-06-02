<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Poli;
use App\Models\Dokter;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Buat Poli
        $poliGigi = Poli::create([
            'nama_poli' => 'Poli Gigi',
            'keterangan' => 'Menangani masalah kesehatan gigi dan mulut'
        ]);

        $poliUmum = Poli::create([
            'nama_poli' => 'Poli Umum',
            'keterangan' => 'Menangani masalah kesehatan umum'
        ]);

        // Buat User Dokter
        $dokterGigi = User::create([
            'nama' => 'Dr. Gigi',
            'email' => 'gigiandika45@gmail.com',
            'no_hp' => '081225099450',
            'alamat' => 'Jl.Oxyda No. 1',
            'password' => bcrypt('password'),
            'role' => 'dokter'
        ]);

        $dokterUmum = User::create([
            'nama' => 'Dr. Umum',
            'email' => 'umumkeren22@gmail.com',
            'no_hp' => '081225099450',
            'alamat' => 'Jl.umum No. 1',
            'password' => bcrypt('password'),
            'role' => 'dokter'
        ]);

        // Buat data Dokter
        Dokter::create([
            'nama' => 'Dr. Gigi',
            'alamat' => 'Jl. Gigi No. 1',
            'no_hp' => '08123456789',
            'poli_id' => $poliGigi->id,
            'user_id' => $dokterGigi->id
        ]);

        Dokter::create([
            'nama' => 'Dr. Umum',
            'alamat' => 'Jl. Umum No. 1',
            'no_hp' => '08987654321',
            'poli_id' => $poliUmum->id,
            'user_id' => $dokterUmum->id
        ]);

        // Panggil seeder lainnya
        $this->call([
            UserSeeder::class,
            AdminSeeder::class,
            JadwalPeriksaSeeder::class,
        ]);
    }
}
