
@extends('layouts.main') {{-- jeśli korzystasz z własnego layoutu --}}

@section('title', 'Brak dostępu')

@section('content')
    <div class="container text-center mt-5">
        <h1 class="text-danger">403 – Brak dostępu</h1>
        <p>Nie masz uprawnień do tej strony.</p>

        <a href="{{ route('login') }}" class="btn btn-primary mt-3">
            Zaloguj się jako administrator
        </a>
    </div>
@endsection
