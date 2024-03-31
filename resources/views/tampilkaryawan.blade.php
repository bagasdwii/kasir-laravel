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
                            <h3 class="card-title">Edit Karyawan</h3>
                        </div>


                        <form action="/updatekaryawan/{{$data->id}}" method="POST">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="owner">Owner</label>
                                    <input type="text" name="owner" class="form-control" id="owner" value="{{ $data->owner }}" readonly>
                                    
                                </div>
                                <div class="form-group">
                                    <label for="name">Nama</label>
                                    <input type="text" name="name" class="form-control" id="name"
                                        placeholder="Masukan Nama" value="{{$data->name}}" required>
                                </div>
                                
                                <div class="form-group">
                                    <label for="email">Email address</label>
                                    <input type="email" name="email" class="form-control" id="email"
                                        placeholder="Enter email" value="{{$data->email}}" required>
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" name="password" class="form-control" id="password"
                                        placeholder="Password" value="{{$data->password}}" required>
                                </div>
                                <div class="form-group">
                                    <label for="role">Role</label>
                                    <select class="form-control" name="role" required>
                                    <option selected>{{$data->role}}</option>
                                    <option value="staff">Staff</option>
                              
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Status</label>
                                    <select class="form-control" name="status" required>
                                    <option selected>{{$data->status}}</option>
                                    <option value="aktif">Aktif</option>
                                    <option value="deaktif">Deaktif</option>

                              
                                    </select>
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