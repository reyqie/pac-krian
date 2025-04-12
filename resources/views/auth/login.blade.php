@extends('layouts.auth')

@section('title', 'Pelajar NU Krian - Login')

@section('content')
<main class="d-flex align-items-center min-vh-100 py-3 py-md-0">
  <div class="container p-5">
    <div class="card login-card">
      <div class="row no-gutters">
        <div class="col-md-6">
          <img src="{{ asset('auth/images/login.svg') }}" alt="login" class="login-card-img">
        </div>
        <div class="col-md-6">
          <div class="card-body">
            <div class="brand-wrapper">
              <img src="{{ asset('auth/images/logo-pac.jpg') }}" class="border rounded-circle d-inline-block" alt="logo" class="logo" width="50px">&nbsp;
              <h4 class="fw-bold d-inline-block" style="color: #39db4a"><b>PELAJAR NU KRIAN</b></h4>
            </div>
            <p class="login-card-description">Sign into your account</p>

            @if ($errors->has('emailNotFound'))
            <div class="alert alert-danger d-flex align-items-center" role="alert">
              <i class="fas fa-exclamation-triangle me-2"></i>
              <div>
                {{ $errors->first('emailNotFound') }}
              </div>
            </div>
            @endif

            @if ($errors->has('passwordIncorrect'))
            <div class="alert alert-danger d-flex align-items-center" role="alert">
              <i class="fas fa-exclamation-triangle me-2"></i>
              <div>
                {{ $errors->first('passwordIncorrect') }}
              </div>
            </div>
            @endif


            <form method="POST" action="{{ route('login') }}">
              @csrf
              <div class="form-group">
                <label for="email" class="sr-only">Email</label>
                <input required type="email" name="email" id="email" class="form-control" placeholder="Email address">
              </div>
              <div class="form-group mb-4">
                <label for="password" class="sr-only">Password</label>
                <input required type="password" name="password" id="password" class="form-control"
                  placeholder="Password">
              </div>
              <button type="submit" id="login" class="btn btn-block login-btn mb-4">Login</button>
            </form>
            <a href="{{ route('forgot-password') }}" class="forgot-password-link">Forgot password?</a>
            <p class="login-card-footer-text">Don't have an account? <a href="{{ route('register') }}">Register here</a>
            </p>
            <nav class="login-card-footer-nav">
              <a href="">Terms of use.</a>
              <a href="">Privacy policy</a>
            </nav>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>
@endsection