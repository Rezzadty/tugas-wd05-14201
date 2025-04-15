@extends('layout.pagemain')
@section('title', 'Dokter Obat Page')

@section('sidebar')
    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
                                                                                                                                                                                   with font-awesome or any other icon font library -->
            <li class="nav-item ">
                <a href={{ url('/dokter') }} class="nav-link ">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>
                        Dokter
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href={{ url('/dokter/periksa') }} class="nav-link">
                    <p>
                        Periksa
                    </p>
                </a>
            </li>
            <li class="nav-item menu-open">
                <a href={{ url('dokter/obat') }} class="nav-link active">
                    <p>
                        Obat
                    </p>
                </a>
            </li>
        </ul>
    </nav>
@endsection

@section('isi')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Manajemen Obat</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/">Home</a></li>
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Edit Data Obat</h3>
                        </div>
                        <form method="POST" action="{{ route('dokter.obat.update', $obat->id) }}">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Nama Obat</label>
                                    <input value="{{ $obat->nama_obat }}" type="text" name="nama_obat" class="form-control"
                                        id="exampleInputEmail1" placeholder="Input obat's name">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Kemasan</label>
                                    <input value="{{ $obat->kemasan }}" type="text" name="kemasan" class="form-control"
                                        id="exampleInputEmail1" placeholder="Input kemasan's name">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Harga</label>
                                    <input value="{{ $obat->harga }}" type="number" name="harga" class="form-control"
                                        id="exampleInputEmail1" placeholder="Input the price">
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Update Data Obat</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection