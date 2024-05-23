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
        @include('partials.penjualanadmin')
    @elseif(auth()->check() && auth()->user()->role === 'staff')
        @include('partials.barangstaff')
    @endif
    <div class="modal fade" id="bayarModal">
        <div class="modal-dialog modal-sm modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Bayar Barang</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="tambahpenjualan" >
                    @csrf
                    <input type="hidden" name="user_id" id="user_id" value="{{ $loggedInUser->id }}">
                    {{-- <input type="hidden" name="jumlah" id="jumlah" value="{{ $shoppingItems->stok }}"> --}}

                    <div class="modal-body">
                        <div class="row">
                            <div class="col-auto">
                                <div class="card card-info">
                                   
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label>Total Harga</label>
                                            <input type="number" name="totalHarga" id="totalHarga" class="form-control"
                                                placeholder="Total Harga" required readonly>
                                        </div>
                                        <div class="form-group">
                                            <label>Uang</label>
                                            <input type="number" name="uang" id="uang" class="form-control"
                                                placeholder="Uang" required>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label>Kembalian</label>
                                            <input type="number" name="kembali" id="kembali" class="form-control"
                                                placeholder="Kembali" required readonly> 
                                        </div>
                                    </div>
                                </div>
                            </div>
                           
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="submit" id="cetakBtn" class="btn btn-default" style="display: none;">Cetak</button>
                        <button type="submit" id="bayarBtn" class="btn btn-primary" style="display: none;">Bayar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    {{-- <div class="modal fade" id="modal-lg-category">
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
    @endforeach --}}
    
    
  
</div>

@endsection