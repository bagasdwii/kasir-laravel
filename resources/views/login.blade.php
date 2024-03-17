@extends('layouts.homenav')
@section('containersatu')
<div class="text-center d-flex align-items-center vh-100">
  @if (session()->has('success'))
  <div class="alert alert-success alert-dismissible fade show" role="alert">
      {{ session('success') }}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
  @endif
  @if (session()->has('loginError'))
  <div class="alert alert-warning alert-dismissible fade show" role="alert">
      {{ session('loginError') }}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
  @endif
  <main class="form-signin w-100 m-auto">
      <form action="/login" method="post">
          @csrf
          <h1 class="h3 mb-3 fw-normal">Please sign in</h1>

          <div class="form-floating">
              <input type="email" class="form-control" name="email" id="email" placeholder="email@example.com"
                  required>
              <label for="email">Email address</label>
          </div>
          <div class="form-floating">
              <input type="password" name="password" class="form-control" id="password" placeholder="Password"
                  required>
              <label for="password">Password</label>
          </div>
          <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>

      </form>
      <small><a href="/registrasi">registrasi</a></small>
  </main>

</div>
@endsection
