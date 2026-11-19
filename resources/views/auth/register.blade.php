@extends('layouts.app')

@section('title', 'Daftar')

@section('content')
<div class="card auth-card">
    <span class="eyebrow">MULAI DARI SINI</span>
    <h1>Buat akun belanja</h1>

    <form method="POST" action="{{ route('register.store') }}">
        @csrf

        <div class="form-group">
            <label for="name">Nama lengkap</label>
            <input
                id="name"
                type="text"
                name="name"
                value="{{ old('name') }}"
                maxlength="120"
                autocomplete="name"
                required
            >
            @error('name')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input
                id="email"
                type="email"
                name="email"
                value="{{ old('email') }}"
                autocomplete="username"
                required
            >
            @error('email')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group">
            <label for="password">Password</label>
            <input
                id="password"
                type="password"
                name="password"
                minlength="8"
                autocomplete="new-password"
                required
            >
            <span class="muted helper-text">Minimal 8 karakter.</span>
            @error('password')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group">
            <label for="password_confirmation">Ulangi password</label>
            <input
                id="password_confirmation"
                type="password"
                name="password_confirmation"
                autocomplete="new-password"
                required
            >
        </div>

        <button type="submit" class="btn">Buat Akun</button>
    </form>

    <p class="muted" style="margin-top: 20px;">
        Sudah punya akun? <a href="{{ route('login') }}"><strong>Masuk</strong></a>
    </p>
</div>
@endsection