@extends('layouts.dashboardnav')
@section('container')

<div class="content-wrapper">

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Supplier</h1>
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
        @include('partials.supplieradmin')
    @elseif(auth()->check() && auth()->user()->role === 'staff')
        @include('partials.supplierstaff')
    @endif --}}
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col">
                                    <h3 class="card-title">Data Supplier</h3>
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
                                        <th>No Kontak</th>
                                        <th>Alamat</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $no =1;
                                    @endphp
                                    @foreach ($data as $supplier)
                                    <tr>
                                        <th> {{ $no++ }}</th>
                                        <td>{{ $supplier->namaToko }}</td>
                                        <td>{{ $supplier->noKontak }}</td>
                                        <td>{{ $supplier->alamat }}</td>
                                        <td>
                                            <a href="/tampilsupplier/{{ $supplier->id }}" class="btn btn-info"> Edit </a>
                                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal{{$supplier->id}}">
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
                                        <th>No Kontak</th>
                                        <th>Alamat</th>
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
                                            <label>Alamat</label>
                                            <textarea type="text" name="alamat" id="alamat" class="form-control"
                                                placeholder="Alamat" rows="3" required></textarea>
                                               
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
                    Apakah Anda yakin ingin menghapus "{{ $supplier->namaToko }}" ini?
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