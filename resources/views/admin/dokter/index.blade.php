@extends('layouts.app')

@section('title', 'Kelola Dokter')
@section('header', 'Kelola Dokter')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Daftar Dokter</h3>
            <div class="card-tools">
                <a href="{{ route('admin.dokter.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus"></i> Tambah Dokter
                </a>
            </div>
        </div>
        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>No HP</th>
                        <th>Poli</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($dokters as $dokter)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $dokter->nama }}</td>
                            <td>{{ $dokter->alamat }}</td>
                            <td>{{ $dokter->no_hp }}</td>
                            <td>{{ $dokter->poli->nama_poli }}</td>
                            <td>
                                <a href="{{ route('admin.dokter.edit', $dokter->id) }}" class="btn btn-sm btn-warning">
                                    <i class="fas fa-edit"></i> Edit
                                </a>
                                <form action="{{ route('admin.dokter.destroy', $dokter->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger"
                                        onclick="return confirm('Apakah Anda yakin ingin menghapus dokter ini?')">
                                        <i class="fas fa-trash"></i> Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center">Tidak ada data dokter</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection