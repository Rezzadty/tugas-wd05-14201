<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Dokter;
use App\Models\Poli;
use App\Models\Obat;
use App\Models\Pasien;

class DashboardController extends Controller
{
    public function index()
    {
        $data = [
            'totalPoli' => Poli::count(),
            'totalDokter' => Dokter::count(),
            'totalObat' => Obat::count(),
            'totalPasien' => Pasien::count(),
        ];

        return view('admin.dashboard', $data);
    }
}