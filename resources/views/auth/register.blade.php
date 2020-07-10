@extends('layouts.auth')

@section('addressTitle','Daftar Pengguna')

@section('loginForm')

<h4 class="text-uppercase text-black text-center mb-5">Daftar</h4>

@if (Session::has('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <p>{{ Session::get('success') }}</p>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div>

@elseif(Session::has('error'))

<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <p>{{ Session::get('error') }}</p>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">×</span>
    </button>
</div>
@endif

<form method="POST" action="{{ route('register') }}">
    @csrf
    <div class="form-group">
        <input id="nik" type="text" class="form-control @error('nik') is-invalid @enderror" name="nik" value="{{ old('nik') }}" required autocomplete="nik" autofocus placeholder="Masukkan NIK">

            @error('nik')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
    </div>
    <div class="form-group">
        <input id="username" type="text" class="form-control @error('username') is-invalid @enderror"
                name="username" value="{{ old('username') }}" required autocomplete="username" autofocus placeholder="Masukkan Username">

            @error('username')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
    </div>
    <div class="form-group">
        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                value="{{ old('email') }}" required autocomplete="email" placeholder="Masukkan Email">

            @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
    </div>
    <div class="form-group mb-4">
        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                name="password" required autocomplete="new-password" placeholder="Masukkan Kata Sandi">

            @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
    </div>
    <div class="form-group mb-4">
        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required
                autocomplete="new-password" placeholder="Konfirmasi Kata Sandi">
    </div>

    <div class="custom-control custom-checkbox my-1 mr-sm-2 position-relative">
        <button type="submit" class="btn btn-primary float-right">
            Daftar
        </button>
    </div>

    <div class="form-divider"></div>

    <div class="text-center mt-4 f12">
        Sudah Memiliki Akun ? <a href="{{route('login')}}" class="btn-link text-capitalize">Login</a>
    </div>
</form>
@endsection
