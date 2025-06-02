@extends('layouts.app')

@section('title', 'Kelola Poli')
@section('header', 'Kelola Poli')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Daftar Poli</h3>
            <div class="card-tools">
                <a href="{{ route('admin.poli.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus"></i> Tambah Poli
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
                        <th>Nama Poli</th>
                        <th>Keterangan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($polis as $poli)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $poli->nama_poli }}</td>
                            <td>{{ $poli->keterangan }}</td>
                            <td>
                                <a href="{{ route('admin.poli.edit', $poli->id) }}" class="btn btn-sm btn-warning">
                                    <i class="fas fa-edit"></i> Edit
                                </a>
                                <form action="{{ route('admin.poli.destroy', $poli->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger"
                                        onclick="return confirm('Apakah Anda yakin ingin menghapus poli ini?')">
                                        <i class="fas fa-trash"></i> Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center">Tidak ada data poli</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection