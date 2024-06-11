@extends('layouts.dashboardnav')
@section('container')

<div class="content-wrapper">

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Pembelian</h1>
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
        @include('partials.pembelianadmin')
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
                                    <h3 class="card-title">Data Belanja Pembelian</h3>
                                </div>
                                
                                <div class="col-auto">
                                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-lg">
                                        Tambah Data
                                    </button>
                                </div>
                            </div>
                        </div>
                        
    
                        <div class="card-body ">
                            
                            
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Toko</th>
                                        <th>Kode Faktur</th>
                                        <th>Tanggal</th>
                                        <th>Total Beli</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $no =1;
                                    @endphp
                                    @foreach ($data as $pembelian)
                                    <tr>
                                        <th> {{ $no++ }}</th>
                                        <td>{{ $pembelian->supplier->namaToko }}</td>
                                        <td>{{ $pembelian->noFaktur }}</td>
                                        <td>{{ $pembelian->tanggal }}</td>
                                        <td>{{ number_format($pembelian->totalHarga, 0, ',', '.') }}</td>
                                        <td>
                                            <a href="/detailpembelian/{{ $pembelian->id }}" class="btn btn-warning"> Detail </a>
                                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal{{$pembelian->id}}">
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
                                        <th>Kode Faktur</th>
                                        <th>Tanggal</th>
                                        <th>Total Beli</th>
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
                <form method="post" action="/tambahpembelian">
                    @csrf
                    <input type="hidden" name="user_id" id="user_id" value="{{ $loggedInUser->id }}">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="card card-info">
                                   
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="supplier_id">Nama Toko</label>
                                            <select name="supplier_id" id="supplier_id" class="form-control select2" style="width: 100%;" required>
                                                <option selected="selected"></option>
                                                @foreach ($dSupplier as $supplier)
                                                    <option value="{{ $supplier->id }}">{{ $supplier->namaToko }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                  
                                        
                                        <div class="form-group">
                                            <label>Kode Faktur</label>
                                            <input type="text" name="noFaktur" id="noFaktur" class="form-control"
                                                placeholder="Kode Faktur" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="card card-info">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label>Tanggal</label>
                                            <input type="date" name="tanggal" id="tanggal" class="form-control"
                                                placeholder="Tanggal" required>
                                        </div>
                                    
                                  
                                        <div class="form-group">
                                            <label>Total Beli</label>
                                            <input type="number" name="totalHarga" id="totalHarga" class="form-control"
                                                placeholder="Total Beli" value="0" readonly>
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
                    Apakah Anda yakin ingin menghapus "{{ $pembelian->noFaktur }}" ini?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <a href="/deletepembelian/{{ $pembelian->id }}" class="btn btn-danger">Hapus</a>
                </div>
            </div>
        </div>
    </div>
    @endforeach
    
    
    
  
</div>

@endsection