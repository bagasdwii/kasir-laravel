@extends('layouts.dashboardnav')
@section('container')

<div class="content-wrapper">

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Detail Pembelian</h1>
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
        @include('partials.detailpembelianadmin')
    @elseif(auth()->check() && auth()->user()->role === 'staff')
        @include('partials.pembelianstaff')
    @endif --}}
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col">
                                    <h3 class="card-title">Data Detail Pembelian</h3>
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
                            </div>
                        </div>
                        
    
                        <div class="card-body ">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Nama Toko</label>
                                        <input type="text" name="namaToko" id="namaToko" class="form-control" placeholder="Nama Toko" value="{{ $data1->supplier->namaToko }}" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label>Kode Faktur</label>
                                        <input type="text" name="noFaktur" id="noFaktur" class="form-control" placeholder="Kode Faktur" value="{{ $data1->noFaktur }}" readonly>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Tanggal</label>
                                        <input type="date" name="tanggal" id="tanggal" class="form-control" placeholder="Tanggal" value="{{ $data1->tanggal }}" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label>Total Beli</label>
                                        <input type="text" name="totalHarga" id="totalHarga" class="form-control" placeholder="Total Beli" value="{{ number_format($data1->totalHarga, 0, ',', '.') }}" readonly>
                                    </div>
                                </div>
                            </div>
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Toko</th>
                                        <th>Jumlah Barang</th>
                                        <th>Harga Barang</th>
                                        <th>Sub Total</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $no =1;
                                    @endphp
                                    @foreach ($data as $detailpembelian)
                                    <tr>
                                        <th> {{ $no++ }}</th>
                                        <td>{{ $detailpembelian->barang->namaBarang }}</td>
                                        <td>{{ number_format($detailpembelian->jumlah, 0, ',', '.') }}</td>
                                        <td>{{ number_format($detailpembelian->harga, 0, ',', '.') }}</td>
                                        <td>{{ number_format($detailpembelian->subTotal, 0, ',', '.') }}</td>
                                        <td>
                                            
                                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal{{$detailpembelian->id}}">
                                                Hapus
                                            </button>
    
                                        </td>
    
                                    </tr>
    
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Toko</th>
                                        <th>Jumlah Barang</th>
                                        <th>Harga Barang</th>
                                        <th>Sub Total</th>
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
                    <h4 class="modal-title">Tambah Data Pembelian</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post" action="/tambahdetailpembelian">
                    @csrf
                    <input type="hidden" name="user_id" id="user_id" value="{{ $loggedInUser->id }}">
                    <input type="hidden" name="pembelian_id" id="pembelian_id" value="{{ $data1->id }}">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="card card-info">
                                   
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="barang_id">Nama Barang</label>
                                            <select name="barang_id" id="barang_id" class="form-control select2" style="width: 100%;" required>
                                                <option selected="selected"></option>
                                                @foreach ($dBarang as $barang)
                                                    <option value="{{ $barang->id }}">{{ $barang->namaBarang }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                  
                                        
                                        <div class="form-group">
                                            <label>Jumlah Barang</label>
                                            <input type="number" name="jumlah" id="jumlah" class="form-control" min="0"
                                                placeholder="Jumlah Barang" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="card card-info">
                                    <div class="card-body">

                                        <div class="form-group">
                                            <label for="harga">Harga Barang</label>
                                            <input type="number" name="harga" id="harga" class="form-control" placeholder="Harga Barang" value="0" readonly>
                                        </div>
                                        
                                            <div class="form-group" id="subtotal-group" style="display: none;">
                                                <label for="subTotal">Subtotal</label>
                                                <input type="number" name="subTotal" id="subTotal" class="form-control" placeholder="Subtotal" value="0" readonly>
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
                    <form action="{{ route('uploadExcelPembelian') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="excelFile">Pilih file Excel</label>
                            <input type="hidden" name="pembelian_id" value="{{  $data1->id }}">
                            <input type="file" name="excelFile" id="excelFile" class="form-control" required accept=".xls,.xlsx">
                        </div>
                        <button type="submit" class="btn btn-primary">Upload</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @foreach ($data as $pembelian)
    <div class="modal fade" id="deleteModal{{$pembelian->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Penghapusan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Apakah Anda yakin ingin menghapus "{{ $pembelian->barang->namaBarang }}" ini?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <a href="/deletedetailpembelian/{{ $pembelian->id }}" class="btn btn-danger">Hapus</a>
                </div>
            </div>
        </div>
    </div>
    @endforeach
    
    
    
  
</div>

@endsection