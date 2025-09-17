@extends('layouts/main')

@section('title')
    @if(isset($title))
        -{{$title}}
    @endif
@endsection('title')

@section('content')
    <div class="container mt-4">
        <h3 class="mb-3">Kontakty</h3>
        <table class="table table-striped table-bordered table-hover align-middle">
            <thead class="table-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Imie</th>
                <th scope="col">Nazwisko</th>
                <th scope="col">Nazwa firmy</th>
                <th scope="col">Email</th>
                <th scope="col">Telefon</th>
                <th scope="col">Branża</th>
                <th scope="col">Wielkość firmy</th>
                <th scope="col">Dodatkowe informacje</th>

            </tr>
            </thead>
            <tbody>

            @foreach($lista as $asset)
                <tr>
                    <!-- <th scope="row">{{$loop->iteration}}</th> -->
                    <td>{{$asset->id }}</td>
                    <td>{{$asset->first_name}}</td>
                    <td>{{$asset->last_name }}</td>
                    <td>{{$asset->company }}</td>
                    <td>{{$asset->business_email }}</td>
                    <td>{{$asset->phone_number }} </td>
                    <td>{{$asset->industry->industry_name}} ({{$asset->industry->description}})</td>
                    <td>{{$asset->company_size}}</td>
                    <td>{{$asset->comments}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>


@endsection('content')
