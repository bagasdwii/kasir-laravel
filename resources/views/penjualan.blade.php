@extends('layouts.dashboardnav')
@section('container')

<div class="content-wrapper">

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Penjualan</h1>
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
        @include('partials.penjualanadmin')
    @elseif(auth()->check() && auth()->user()->role === 'staff')
        @include('partials.barangstaff')
    @endif --}}
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-8">
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col">
                                    <h3 class="card-title">Data Barang</h3>
                                </div>
                                <div class="col">
                                    <input type="text" id="searchInputPenjualan" class="form-control" placeholder="Cari Kode atau Nama Barang">
                                </div>
                            </div>
                        </div>
    
                        <div class="card-body">
                            <table id="example2penjualan" class="table table-bordered table-hover" style="overflow: auto; table-layout-fixed;">
                                <thead>
                                    <tr>
                                        <th width="5px">Kode</th>
                                        <th>Barang</th>
                                        <th width="5px">Harga</th>
                                        <th width="5px">Stok</th>
                                        <th width="100px">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody  id="barangTableBody">
                                    {{-- @foreach ($data as $barang)
                                    <tr>
                                        <td>{{ $barang->kodeBarang }}</td>
                                        <td>{{ $barang->namaBarang }}</td>
                                        <td>{{ $barang->hargaJual }}</td>
                                        <td>{{ $barang->stok }}</td>
                                        <td class="text-center">
                                            <input type="number" class="stock form-control" value="0" min="0" max="{{ $barang->stok }}" style="width: 100px;">
                                        </td>
                                    </tr>
                                    @endforeach --}}
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col">
                                    <h3 class="card-title">Data Belanja Barang</h3>
                                </div>
                            </div>
                        </div>
    
                        <div class="card-body">
                            <table id="example2penjualan2" class="table table-hover" style="overflow: auto; table-layout-fixed;">
                                <thead>
                                    <tr>
                                        <th>Barang</th>
                                        <th>Harga</th>
                                        <th>Jumlah</th>
                                        <th>Subtotal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                                <tfoot>
                                </tfoot>
                            </table>
                        </div>
                        <button class="btn btn-primary" id="bayar" style="display: none;" data-toggle="modal" data-target="#bayarModal">Bayar</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    
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