@extends('layouts.homenav')
@section('containersatu')

<div class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <a href="#"><b>Web</b>kasirku</a>
        </div>
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Silahkan Login Terlebih Dahulu</p>
                @if (session('loginError'))
                <div class="alert alert-danger">
                    {{ session('loginError') }}
                </div>
                @endif
                <form action="/login" method="post">
                    @csrf
                    <div class="input-group mb-3">
                        <input type="email" class="form-control" placeholder="Email" name="email" id="email">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" placeholder="Password" name="password" id="password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        
                        <div class="col">
                            <button type="submit" class="btn btn-primary btn-block">Login</button>
                        </div>
                    </div>
                </form>
                
                
            </div>
        </div>
    </div>
</div>

@endsection