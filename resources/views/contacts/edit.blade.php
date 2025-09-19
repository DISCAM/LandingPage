@extends('layouts/main')

@section('title')
    @if(isset($title))
        - {{$title}}
    @endif
@endsection('title')

@section('content')

    <div class="container mt-4">
        <h2> educja kontaktu  </h2>
        <form action="{{ route('contacts.editStore') }}" method="post" role="form">
            @csrf
            <input type="hidden" name="id" value="{{ $contact->id }}">
            <div class="form-group">
                <label for="name">Imię</label>
                <input type="text" class="form-control"  name="first_name" id="name"
                       value="{{ old('first_name', $contact->first_name) }}" required>
            </div>
            <div class="form-group">
                <label for="last_name">Nazwisko</label>
                <input type="text" class="form-control" name="last_name" id="last_name" required
                       value="{{ old('last_name', $contact->last_name) }}">
            </div>
            <div class="form-group">
                <label for="company">Firma</label>
                <input type="text" class="form-control" name="company" id="company" required
                       value="{{ old('company', $contact->company) }}"">
            </div>
            <div class="form-group">
                <label for="business_mail">Email</label>
                <input type="text" class="form-control" name="business_mail" id="business_mail" required
                       value="{{ old('business_email', $contact->business_email) }}">
            </div>
            <div class="form-group">
                <label for="phone_number">Telefon</label>
                <input type="text" class="form-control" name="phone_number" id="phone_number" required
                       value="{{ old('phone_number', $contact->phone_number) }}">
            </div>
            <div class="form-group">
                <label for="industry_id">Branża</label>

                <select id="industry_id" name="industry_id" class="form-select">
                    <option value="">— wybierz —</option>
                    @foreach($industries as $id => $industry_name)
                        <option value="{{ $id }}"
                            {{ (string) old('industry_id', $contact->industry_id) === (string) $id ? 'selected' : '' }}>
                            {{ $industry_name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="company_size">Wielkość firmy</label>
                <input type="text" class="form-control" name="company_size" id="" required
                       value="{{ old('company_size', $contact->company_size) }}">
            </div>
            <div class="form-group">
                <label for="comments">Komentarz</label>
                <textarea rows="3" class="form-control" name="comments" id="comments"
                          required>{{ (old('comments', $contact->comments)) }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary mt-2">Zapisz</button>

        </form>

    </div>

@endsection
