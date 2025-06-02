@extends('layouts.app')

@section('title', 'Dashboard Admin')

@section('content')
    <div class="container-fluid">
        <h1 class="h3 mb-4">Dashboard Admin</h1>

        <!-- Statistik -->
        <div class="row">
            <!-- Total Poli -->
            <div class="col-md-3">
                <div class="card bg-primary text-white mb-4">
                    <div class="card-body">
                        <h5 class="card-title">Total Poli</h5>
                        <h2 class="display-4">{{ $totalPoli ?? '0' }}</h2>
                        <a href="{{ route('admin.poli.index') }}" class="text-white">
                            Lihat Detail <i class="fas fa-arrow-right ml-1"></i>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Total Dokter -->
            <div class="col-md-3">
                <div class="card bg-success text-white mb-4">
                    <div class="card-body">
                        <h5 class="card-title">Total Dokter</h5>
                        <h2 class="display-4">{{ $totalDokter ?? '0' }}</h2>
                        <a href="{{ route('admin.dokter.index') }}" class="text-white">
                            Lihat Detail <i class="fas fa-arrow-right ml-1"></i>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Total Pasien -->
            <div class="col-md-3">
                <div class="card bg-warning text-white mb-4">
                    <div class="card-body">
                        <h5 class="card-title">Total Pasien</h5>
                        <h2 class="display-4">{{ $totalPasien ?? '0' }}</h2>
                        <a href="{{ route('admin.pasien.index') }}" class="text-white">
                            Lihat Detail <i class="fas fa-arrow-right ml-1"></i>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Total Obat -->
            <div class="col-md-3">
                <div class="card bg-info text-white mb-4">
                    <div class="card-body">
                        <h5 class="card-title">Total Obat</h5>
                        <h2 class="display-4">{{ $totalObat ?? '0' }}</h2>
                        <a href="{{ route('admin.obat.index') }}" class="text-white">
                            Lihat Detail <i class="fas fa-arrow-right ml-1"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Menu Cepat -->
        <div class="card">
            <div class="card-header">
                <h5 class="card-title m-0">Menu Cepat</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-3">
                        <a href="{{ route('admin.dokter.create') }}" class="btn btn-primary btn-block mb-3">
                            <i class="fas fa-user-md mr-2"></i> Tambah Dokter
                        </a>
                    </div>
                    <div class="col-md-3">
                        <a href="{{ route('admin.poli.create') }}" class="btn btn-success btn-block mb-3">
                            <i class="fas fa-hospital mr-2"></i> Tambah Poli
                        </a>
                    </div>
                    <div class="col-md-3">
                        <a href="{{ route('admin.pasien.create') }}" class="btn btn-warning btn-block mb-3">
                            <i class="fas fa-user-plus mr-2"></i> Tambah Pasien
                        </a>
                    </div>
                    <div class="col-md-3">
                        <a href="{{ route('admin.obat.create') }}" class="btn btn-info btn-block mb-3">
                            <i class="fas fa-pills mr-2"></i> Tambah Obat
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('styles')
        <style>
            .card {
                border: none;
                border-radius: 10px;
                box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            }

            .card-body {
                padding: 1.5rem;
            }

            .display-4 {
                font-size: 2.5rem;
                font-weight: 300;
                line-height: 1.2;
            }

            .btn {
                padding: 0.75rem 1.25rem;
                font-size: 1rem;
                border-radius: 5px;
                text-transform: none;
            }

            .btn i {
                font-size: 1.1rem;
            }
        </style>
    @endpush
@endsection