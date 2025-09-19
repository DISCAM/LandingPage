@extends('layouts/main')

@section('title')
    @if(isset($title))
        - {{$title}}
    @endif
@endsection('title')

@section('content')

    <div class="container mt-4">
        <h2> Dodawanie kontaktu  </h2>
        <form action="{{ route('contacts.store') }}" method="post" role="form">
            @csrf
            <div class="form-group">
                <label for="name">Imię</label>
                <input type="text" class="form-control" name="first_name" id="name" required>
            </div>
            <div class="form-group">
                <label for="last_name">Nazwisko</label>
                <input type="text" class="form-control" name="last_name" id="last_name" required>
            </div>
            <div class="form-group">
                <label for="company">Firma</label>
                <input type="text" class="form-control" name="company" id="company" required>
            </div>
            <div class="form-group">
                <label for="business_mail">Email</label>
                <input type="text" class="form-control" name="business_mail" id="business_mail" required>
            </div>
            <div class="form-group">
                <label for="phone_number">Telefon</label>
                <input type="text" class="form-control" name="phone_number" id="phone_number" required>
            </div>
            <div class="form-group">
                <label for="industry_id">Branża</label>

                <select id="industry_id" name="industry_id" class="form-select">
                    <option value="">— wybierz —</option>
                    @foreach($industries as $id => $industry_name)
                        <option value="{{ $id }}" @selected(old('industry_id') == $id)>
                            {{ $industry_name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="company_size">Wielkość firmy</label>
                <input type="text" class="form-control" name="company_size" id="" required>
            </div>
            <div class="form-group">
                <label for="comments">Komentarz</label>
                <textarea type="text" class="form-control" name="comments" id="comments" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary mt-2">Zapisz</button>

        </form>

    </div>

@endsection
