@extends('layouts.auth')

@section('title', 'Login')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/bootstrap-social/bootstrap-social.css') }}">
@endpush

@section('main')
    <div class="card card-primary">
        <div class="card-header">
            <h4>Login</h4>
        </div>

        <div class="card-body">
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            @error('error')
                <div class="alert alert-danger">
                    {{ $message }}
                </div>
            @enderror
            <form method="POST" action="{{ route('login_aksi') }}" class="needs-validation" novalidate="">
                @csrf
                <div class="form-group">
                    <label for="username">Username</label>
                    <input id="username" type="text" class="form-control" name="username" tabindex="1" required
                        autofocus>
                    @error('username')
                        <div class="invalid-feedback">
                            Silakan isi username anda
                        </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="password" class="control-label">Password</label>
                    <input id="password" type="password" class="form-control" name="password" tabindex="2" required>
                    @error('password')
                        <div class="invalid-feedback">
                            Silakan isi kata sandi Anda
                        </div>
                    @enderror
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                        Login
                    </button>
                    <a href="{{ route('register') }}" class="btn btn-light btn-lg btn-block">
                        Daftar Akun
                    </a>
                </div>
            </form>

        </div>
    </div>
@endsection

@push('scripts')
    <!-- JS Libraies -->

    <!-- Page Specific JS File -->
@endpush
