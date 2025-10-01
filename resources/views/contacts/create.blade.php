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
                <input type="text" class="form-control" value="{{ old('first_name') }}" name="first_name" id="name" >
            </div>
            <div class="form-group">
                <label for="last_name">Nazwisko</label>
                <input type="text" class="form-control" value="{{ old('last_name') }}" name="last_name" id="last_name" >
            </div>
            <div class="form-group">
                <label for="company">Firma</label>
                <input type="text" class="form-control" value="{{ old('company') }}" name="company" id="company" >
            </div>
            <div class="form-group">
                <label for="business_email">Email</label>
                <input type="text" class="form-control" value="{{ old('business_email') }}" name="business_email" id="business_email">
            </div>
            <div class="form-group">
                <label for="phone_number">Telefon</label>
                <input type="text" class="form-control" value="{{ old('phone_number') }}" name="phone_number" id="phone_number">
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
                <input type="text" class="form-control" value="{{ old('company_size') }}" name="company_size" id="company_size" >
            </div>


            <div class="form-group">
                <label for="comments">Komentarz</label>
                <textarea
                    name="comments"
                    id="comments"
                    rows="4"
                    class="form-control @error('comments') is-invalid @enderror"
                >{{ old('comments') }}</textarea>
                @error('comments')
                <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>


            <button type="submit" class="btn btn-primary mt-2">Zapisz</button>

        </form>

    </div>

@endsection
