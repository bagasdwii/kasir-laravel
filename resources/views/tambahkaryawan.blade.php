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
    @if(session('error'))
    <div class="alert alert-danger alert-dismissible fade show container" role="alert" >
        {{ session('error') }}
        <button type="button" class="close" data-dismiss="alert"  aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif
    <section class="content">
        <div class="container-fluid">
            <div class="">

                <div class="">

                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Tambah Karyawan</h3>
                        </div>


                        <form action="/tambahdata" method="POST">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="owner">Owner</label>
                                    <input type="text" name="owner" class="form-control" id="owner" value="{{ $loggedInUser->email }}" readonly>
                                    
                                </div>
                                <div class="form-group">
                                    <label for="name">Nama</label>
                                    <input type="text" name="name" class="form-control" id="name"
                                        placeholder="Masukan Nama" required value="{{ old('name') }}">
                                </div>
                                
                                <div class="form-group">
                                    <label for="email">Email address</label>
                                    <input type="email" name="email" class="form-control" id="email"
                                        placeholder="Enter email" required  value="{{ old('email') }}">
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" name="password" class="form-control" id="password"
                                        placeholder="Password" required>
                                </div>
                                <div class="form-group">
                                    <label for="role">Role</label>
                                    <select class="form-control" name="role" required>
                                    <option value="staff">Staff</option>
                              
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Status</label>
                                    <select class="form-control" name="status" required>
                                    <option ></option>
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