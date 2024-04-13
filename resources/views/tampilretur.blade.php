@extends('layouts.dashboardnav')
@section('container')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>General Form</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">General Form</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="">

                <div class="">

                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Edit Retur</h3>
                        </div>


                        <form action="/updateretur/{{$data->id}}" method="POST">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="pembelian_id"></label>
                                    <input type="text" name="pembelian_id" class="form-control" id="namaToko"
                                        placeholder="No Faktur" value="{{$data->pembelian_id}}" required readonly>
                                </div>
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
                                    <label for="tanggal">Tanggal</label>
                                    <input type="date" name="tanggal" class="form-control" id="tanggal"
                                        placeholder="Tanggal" value="{{$data->tanggal}}" required>
                                </div>
                                
                                <div class="form-group">
                                    <label for="jumlah">Jumlah</label>
                                    <input type="number" name="jumlah" class="form-control" id="jumlah"
                                        placeholder="jumlah" value="{{$data->jumlah}}" required>
                                </div>
                                {{-- <div class="form-group">
                                    <label for="role">Role</label>
                                    <select class="form-control" name="role">
                                    <option selected>{{$data->role}}</option>
                                    <option value="staff">Staff</option>
                              
                                    </select>
                                </div> --}}
                                <div class="form-group">
                                    <label for="kembali">Kembali</label>
                                    <input type="number" name="kembali" class="form-control" id="kembali"
                                        placeholder="Kembali" value="{{$data->kembali}}" required>
                                </div>
                                <div class="form-group">
                                    <label for="keterangan">Keterangan</label>
                                    <input type="text" name="keterangan" class="form-control" id="keterangan"
                                        placeholder="Keterangan" value="{{$data->keterangan}}" required>
                                </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection