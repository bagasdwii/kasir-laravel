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
                            <h3 class="card-title">Edit Barang</h3>
                        </div>


                        <form action="/updatebarang/{{$data->id}}" method="POST">
                            @csrf
                            <div class="card-body">
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
                                    <label for="namaBarang">Nama Barang</label>
                                    <input type="text" name="namaBarang" class="form-control" id="namaBarang"
                                        placeholder="Masukan Nama Barang" value="{{$data->namaBarang}}" required>
                                </div>
                                
                                <div class="form-group">
                                    <label for="kodeBarang">Kode Barang</label>
                                    <input type="text" name="kodeBarang" class="form-control" id="kodeBarang"
                                        placeholder="Kode Barang" value="{{$data->kodeBarang}}" required>
                                </div>
                                <div class="form-group">
                                    <label for="hargaBeli">Harga Beli</label>
                                    <input type="number" name="hargaBeli" class="form-control" id="hargaBeli"
                                        placeholder="Harga Beli" value="{{$data->hargaBeli}}" required>
                                </div>
                                {{-- <div class="form-group">
                                    <label for="role">Role</label>
                                    <select class="form-control" name="role">
                                    <option selected>{{$data->role}}</option>
                                    <option value="staff">Staff</option>
                              
                                    </select>
                                </div> --}}
                                <div class="form-group">
                                    <label for="hargaJual">Harga Jual</label>
                                    <input type="number" name="hargaJual" class="form-control" id="hargaJual"
                                        placeholder="Harga Jual" value="{{$data->hargaJual}}" required>
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