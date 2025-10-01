@extends('layouts/main')

@section('title')
    - Dashboard
@endsection

@section('content')
    <div class="container py-5">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">
                Dashboard
            </div>
            <div class="card-body">
                <h5 class="card-title">Witaj, {{ Auth::user()->name }}!</h5>
                <p class="card-text">
                    Jesteś zalogowany 🎉
                </p>

                <a href="{{ url('/contacts') }}" class="btn btn-outline-primary">
                    Przejdź do kontaktów
                </a>
                <a href="{{ url('/industry') }}" class="btn btn-outline-secondary ms-2">
                    Zobacz branże
                </a>
            </div>
        </div>
    </div>
@endsection
