@extends('layouts.dashboardnav')
@section('container')

<div class="content-wrapper">

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>DataTables</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Data Barang</li>
                    </ol>
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

    @if(auth()->check() && auth()->user()->role === 'admin')
        @include('partials.barangadmin')
    @elseif(auth()->check() && auth()->user()->role === 'staff')
        @include('partials.barangstaff')
    @endif
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
                    <input type="hidden" name="owner" id="owner" value="{{ $loggedInUser->email }}">
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
                    Apakah Anda yakin ingin menghapus pengguna ini?
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
                    Apakah Anda yakin ingin menghapus pengguna ini?
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