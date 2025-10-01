@extends('layouts/main')

@section('title')
    - Logowanie
@endsection

@section('content')
    <div class="container py-5" style="max-width: 520px;">
        <h1 class="h3 mb-4 text-center">Zaloguj się</h1>

        {{-- komunikaty flash/status (np. po resecie hasła) --}}
        @if (session('status'))
            <div class="alert alert-success">{{ session('status') }}</div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            {{-- Email --}}
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input
                    id="email"
                    type="email"
                    name="email"
                    value="{{ old('email') }}"
                    class="form-control @error('email') is-invalid @enderror"
                    required
                    autofocus
                    autocomplete="username">
                @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            {{-- Hasło --}}
            <div class="mb-3">
                <label for="password" class="form-label">Hasło</label>
                <input
                    id="password"
                    type="password"
                    name="password"
                    class="form-control @error('password') is-invalid @enderror"
                    required
                    autocomplete="current-password">
                @error('password')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            {{-- Zapamiętaj mnie --}}
            <div class="form-check mb-3">
                <input class="form-check-input" type="checkbox" name="remember" id="remember_me">
                <label class="form-check-label" for="remember_me">
                    Zapamiętaj mnie
                </label>
            </div>

            <div class="d-flex justify-content-between align-items-center">
                @if (Route::has('password.request'))
                    <a class="small" href="{{ route('password.request') }}">
                        Zapomniałeś hasła?
                    </a>
                @endif

                <button type="submit" class="btn btn-primary">
                    Zaloguj
                </button>
            </div>

            @if (Route::has('register'))
                <div class="text-center mt-3">
                    <span class="text-muted small">Nie masz konta?</span>
                    <a href="{{ route('register') }}">Zarejestruj się</a>
                </div>
            @endif
        </form>
    </div>
@endsection
