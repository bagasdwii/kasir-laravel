@extends('layouts.dashboardnav')
@section('container')

<div class="content-wrapper">

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Barang</h1>
                </div>
               
            </div>
        </div>
    </section>
    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show container" role="alert" >
        {{ session('success') }}
        <button type="button" class="close" data-dismiss="alert"  aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @elseif(session('error'))
        <div class="alert alert-danger alert-dismissible fade show container" role="alert" >
            {{ session('error') }}
            <button type="button" class="close" data-dismiss="alert"  aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    {{-- @if(auth()->check() && auth()->user()->role === 'admin')
        @include('partials.barangadmin')
    @elseif(auth()->check() && auth()->user()->role === 'staff')
        @include('partials.barangstaff')
    @endif --}}
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col">
                                    <h3 class="card-title">Data Barang</h3>
                                </div>
                                <div class="col-auto">
                                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-upload-excel">
                                        Upload Excel
                                    </button>
                                </div>
                                <div class="col-auto">
                                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-lg">
                                        Tambah Data
                                    </button>
                                </div>
                                <div class="col-auto">
                                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-lg-category">
                                        Tambah Kategori
                                    </button>
                                </div>
                            </div>
                        </div>
                        
    
                        <div class="card-body ">
                            <form id="search-form" method="GET" action="{{ route('barang') }}">
                                @csrf
                                <div class="row mb-2">
                                    <div class="col-md-4">
                                        <!-- Label untuk Kategori -->
                                        <label for="category_id">Kategori</label>
                                        <!-- Dropdown untuk Kategori -->
                                        <select name="categori_id" id="category_id" class="form-control select2" style="width: 100%;">
                                            <option selected="selected" value="">Semua Kategori</option>
                                            @foreach ($dCategori as $categori)
                                                <option value="{{ $categori->id }}">{{ $categori->namaCategori }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <!-- Label untuk Search Bar -->
                                        <label for="search-bar">Cari Barang</label>
                                        <!-- Search Bar -->
                                        <input type="text" name="search" id="search-bar" class="form-control" placeholder="Cari barang...">
                                    </div>
                                    <div class="col-md-2 d-flex align-items-end">
                                        <!-- Tombol Search -->
                                        <button type="submit" class="btn btn-primary w-100">Search</button>
                                    </div>
                                </div>
                            </form>
                            
                            <table id="example2" class="table table-bordered table-hover" style="overflow: auto; ">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Kategori</th>
                                        <th>Nama Barang</th>
                                        <th>Kode Barang</th>
                                        <th>Harga Beli</th>
                                        <th>Harga Jual</th>
                                        <th>Stok</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $no =1;
                                    @endphp
                                    @foreach ($data as $barang)
                                    <tr>
                                        <th> {{ $no++ }}</th>
                                        <td>{{ $barang->categori->namaCategori }}</td>
                                        <td>{{ $barang->namaBarang }}</td>
                                        <td>{{ $barang->kodeBarang }}</td>
                                        <td>{{ number_format($barang->hargaBeli, 0, ',', '.') }}</td>
                                        <td>{{ number_format($barang->hargaJual, 0, ',', '.') }}</td>
                                        <td>{{ number_format($barang->stok, 0, ',', '.') }}</td>
                                        <td>
                                            <a href="/tampilbarang/{{ $barang->id }}" class="btn btn-info"> Edit </a>
                                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal{{$barang->id}}">
                                                Hapus
                                            </button>
    
                                        </td>
    
                                    </tr>
    
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>#</th>
                                        <th>Kategori</th>
                                        <th>Nama Barang</th>
                                        <th>Kode Barang</th>
                                        <th>Harga Beli</th>
                                        <th>Harga Jual</th>
                                        <th>Stok</th>
                                        <th>Aksi</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
    
                    </div>
    
    
                </div>
    
            </div>
    
        </div>
    
    </section>
    <div class="modal fade" id="modal-lg">
        <div class="modal-dialog modal-lg modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Tambah Data Barang</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post" action="/tambahbarang">
                    @csrf
                    <input type="hidden" name="user_id" id="user_id" value="{{ $loggedInUser->id }}">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="card card-info">
                                   
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label>Nama Barang</label>
                                            <input type="text" name="namaBarang" id="namaBarang" class="form-control"
                                                placeholder="Nama Barang" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="category_id">Kategori Barang</label>
                                            <select name="categori_id" id="category_id" class="form-control select2" style="width: 100%;" required>
                                                <option selected="selected"></option>
                                                @foreach ($dCategori as $categori)
                                                    <option value="{{ $categori->id }}">{{ $categori->namaCategori }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label>Kode Barang</label>
                                            <input type="text" name="kodeBarang" id="kodeBarang" class="form-control"
                                                placeholder="Kode Barang" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="card card-info">
                                  
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label>Harga Beli</label>
                                            <input type="number" name="hargaBeli" id="hargaBeli" class="form-control"
                                                placeholder="Harga Beli" required>
                                                
                                        </div>
                                        <div class="form-group">
                                            <label>Harga Jual</label>
                                            <input type="number" name="hargaJual" id="hargaJual" class="form-control"
                                                placeholder="Harga Jual" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Stok</label>
                                            <input type="number" name="stok" id="stok" class="form-control"
                                                placeholder="Stok" value="0" readonly>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Tambah Data</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modal-upload-excel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Upload Data Barang via Excel</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('uploadExcelBarang') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="excelFile">Pilih file Excel</label>
                            <input type="file" name="excelFile" id="excelFile" class="form-control" required accept=".xls,.xlsx">
                        </div>
                        <button type="submit" class="btn btn-primary">Upload</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
    
    <div class="modal fade" id="modal-lg-category">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Tambah Kategori</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post" action="/tambahcategori">
                    @csrf
                    <input type="hidden" name="user_id" id="user_id" value="{{ $loggedInUser->id }}">
                    <div class="modal-body">
                        <div class="card card-info">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg">
                                        <div class="form-group">
                                            <label>Nama Kategori</label>
                                            <input type="text" name="namaCategori" id="namaCategori" class="form-control"
                                                placeholder="Nama Kategori" required>
                                        </div>
                                    </div>
                                </div>
                                <!-- Tabel untuk menampilkan kategori -->
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama Kategori</th>
                                                <th>Aksi</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                            $no =1;
                                            @endphp
                                            @foreach ($dCategori as $categori)
                                            <tr>
                                            <th> {{ $no++ }}</th>
                                            <td>{{ $categori->namaCategori }}</td>
                                            <td>
                                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModalC{{$categori->id}}">
                                                    Hapus
                                                </button>
                                            </td>
                                            </tr>

                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Tambah Data</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @foreach ($data as $barang)
    <div class="modal fade" id="deleteModal{{$barang->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Penghapusan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Apakah Anda yakin ingin menghapus "{{ $barang->namaBarang }}" ini?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <a href="/deletebarang/{{ $barang->id }}" class="btn btn-danger">Hapus</a>
                </div>
            </div>
        </div>
    </div>
    @endforeach
    @foreach ($dCategori as $categori)
    <div class="modal fade" id="deleteModalC{{$categori->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Penghapusan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Apakah Anda yakin ingin menghapus  "{{ $categori->namaCategori }}" ini?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <a href="/deletecategori/{{ $categori->id }}" class="btn btn-danger">Hapus</a>
                </div>
            </div>
        </div>
    </div>
    @endforeach
    
    
  
</div>

@endsection