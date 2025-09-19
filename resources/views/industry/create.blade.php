@extends('layouts/main')

@section('title')
    @if(isset($title))
        - {{$title}}
    @endif
@endsection('title')

@section('content')

    <div class="container mt-4">
        <h2> Dodawanie  </h2>
        <form action="{{ route('industry.store') }}" method="post" role="form">
            @csrf
            <div class="form-group">
                <label for="name">Opis branży</label>
                <input type="text" class="form-control" name="description" id="1" required>
            </div>
            <div class="form-group mt-2">
                <label for="description">Nazwa</label>
                <textarea class="form-control" name="name" id="2" ></textarea>
            </div>
            <button type="submit" class="btn btn-primary mt-2">Zapisz</button>

        </form>

    </div>

@endsection
