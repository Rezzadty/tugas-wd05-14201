@extends('layouts.app')

@section('title', 'Edit Obat')
@section('header', 'Edit Obat')

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.obat.update', $obat->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="nama_obat">Nama Obat</label>
                    <input type="text" class="form-control @error('nama_obat') is-invalid @enderror" id="nama_obat"
                        name="nama_obat" value="{{ old('nama_obat', $obat->nama_obat) }}" required>
                    @error('nama_obat')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="kemasan">Kemasan</label>
                    <input type="text" class="form-control @error('kemasan') is-invalid @enderror" id="kemasan"
                        name="kemasan" value="{{ old('kemasan', $obat->kemasan) }}" required>
                    @error('kemasan')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="harga">Harga</label>
                    <input type="number" class="form-control @error('harga') is-invalid @enderror" id="harga" name="harga"
                        value="{{ old('harga', $obat->harga) }}" required>
                    @error('harga')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Update</button>
                    <a href="{{ route('admin.obat.index') }}" class="btn btn-secondary">Batal</a>
                </div>
            </form>
        </div>
    </div>
@endsection