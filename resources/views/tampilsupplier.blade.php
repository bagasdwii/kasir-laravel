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
                            <h3 class="card-title">Edit Supplier</h3>
                        </div>


                        <form action="/updatesupplier/{{$data->id}}" method="POST">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="namaSupplier">Nama Toko</label>
                                    <input type="text" name="namaToko" class="form-control" id="namaToko"
                                        placeholder="Nama Toko" value="{{$data->namaToko}}" required>
                                </div>
                                
                                <div class="form-group">
                                    <label for="noKontak">No Kontak</label>
                                    <input type="text" name="noKontak" class="form-control" id="noKOntak"
                                        placeholder="No Kontak" value="{{$data->noKontak}}" required>
                                </div>
                                {{-- <div class="form-group">
                                    <label for="role">Role</label>
                                    <select class="form-control" name="role">
                                    <option selected>{{$data->role}}</option>
                                    <option value="staff">Staff</option>
                              
                                    </select>
                                </div> --}}
                                <div class="form-group">
                                    <label for="alamat">Alamat</label>
                                    <input type="text" name="alamat" class="form-control" id="alamat"
                                        placeholder="Alamat" value="{{$data->alamat}}" required>
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