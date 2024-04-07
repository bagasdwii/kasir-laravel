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
                        <li class="breadcrumb-item active">Data Supplier</li>
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
        @include('partials.supplieradmin')
    @elseif(auth()->check() && auth()->user()->role === 'staff')
        @include('partials.supplierstaff')
    @endif
    <div class="modal fade" id="modal-lg">
        <div class="modal-dialog modal-lg modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Tambah Data Supplier</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post" action="/tambahsupplier">
                    @csrf
                    <input type="hidden" name="user_id" id="user_id" value="{{ $loggedInUser->id }}">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="card card-info">
                                   
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label>Nama Toko</label>
                                            <input type="text" name="namaToko" id="namaToko" class="form-control"
                                                placeholder="Nama Toko" required>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label>Nama Supplier</label>
                                            <input type="text" name="namaSupplier" id="namaSupplier" class="form-control"
                                                placeholder="Nama Supplier" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="card card-info">
                                  
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label>No Kontak</label>
                                            <input type="text" name="noKontak" id="noKontak" class="form-control"
                                                placeholder="No Kontak" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Alamat</label>
                                            <textarea type="text" name="alamat" id="alamat" class="form-control"
                                                placeholder="Alamat" rows="3" required></textarea>
                                               
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
    

    @foreach ($data as $supplier)
    <div class="modal fade" id="deleteModal{{$supplier->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                    <a href="/deletesupplier/{{ $supplier->id }}" class="btn btn-danger">Hapus</a>
                </div>
            </div>
        </div>
    </div>
    @endforeach
  
    
  
</div>

@endsection