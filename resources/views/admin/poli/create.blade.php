@extends('layouts.app')

@section('title', 'Tambah Poli')
@section('header', 'Tambah Poli')

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.poli.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="nama_poli">Nama Poli</label>
                    <input type="text" class="form-control @error('nama_poli') is-invalid @enderror" id="nama_poli"
                        name="nama_poli" value="{{ old('nama_poli') }}" required>
                    @error('nama_poli')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="keterangan">Keterangan</label>
                    <textarea class="form-control @error('keterangan') is-invalid @enderror" id="keterangan"
                        name="keterangan" rows="3">{{ old('keterangan') }}</textarea>
                    @error('keterangan')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{ route('admin.poli.index') }}" class="btn btn-secondary">Batal</a>
                </div>
            </form>
        </div>
    </div>
@endsection