@extends('layouts.auth')

@section('title', 'Pelajar NU Krian - Register')

@section('content')
<main class="d-flex align-items-center min-vh-100 py-3 py-md-0">
  <div class="container">
    <div class="card login-card">
      <div class="row no-gutters">
        <div class="col-md-6">
          <div class="card-body">
            <div class="brand-wrapper">
              <img src="{{ asset('auth/images/logo-pac.jpg') }}" class="border rounded-circle d-inline-block" alt="logo" class="logo" width="50px">&nbsp;
              <h4 class="fw-bold d-inline-block" style="color: #39db4a"><b>PELAJAR NU KRIAN</b></h4>
            </div>
            <p class="login-card-description">Sign Up for your account</p>

            @if ($errors->has('email'))
            <div class="alert alert-danger d-flex align-items-center" role="alert">
              <i class="fas fa-exclamation-triangle me-2"></i>
              <div>
                {{ $errors->first('email') }}
              </div>
            </div>
            @endif

            @if ($errors->has('password'))
            <div class="alert alert-danger d-flex align-items-center" role="alert">
              <i class="fas fa-exclamation-triangle me-2"></i>
              <div>
                {{ $errors->first('password') }}
              </div>
            </div>
            @endif

            <form method="POST" action="{{ route('register') }}">
              @csrf
              <div class="form-group">
                <label for="name" class="sr-only">Full Name</label>
                <input required type="text" name="name" id="name" class="form-control" placeholder="Full Name"
                  value="{{ old('name') }}">
              </div>
              <div class="form-group">
                <label for="email" class="sr-only">Email</label>
                <input required type="email" name="email" id="email" class="form-control" placeholder="Email address"
                  value="{{ old('email') }}">
              </div>
              <div class="form-group mb-4">
                <label for="password" class="sr-only">Password</label>
                <input required type="password" name="password" id="password" class="form-control"
                  placeholder="Your Password">
              </div>
              <div class="form-group mb-4">
                <label for="password_confirmation" class="sr-only">Repeat Password</label>
                <input required type="password" name="password_confirmation" id="password_confirmation"
                  class="form-control" placeholder="Repeat Password">
              </div>
              <button type="submit" id="register" class="btn btn-block login-btn mb-4">Sign Up</button>
            </form>
            <p class="login-card-footer-text">Already have an account? <a href="{{ route('login') }}">Login</a>
            </p>
            <nav class="login-card-footer-nav">
              <a href="">Terms of use.</a>
              <a href="">Privacy policy</a>
            </nav>
          </div>
        </div>
        <div class="col-md-5">
          <img src="{{ asset('auth/images/register.svg') }}" alt="login" class="login-card-img">
        </div>
      </div>
    </div>
  </div>
</main>
@endsection