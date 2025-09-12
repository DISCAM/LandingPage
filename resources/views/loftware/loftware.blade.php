@extends('layouts/main')

@section('title')
    @if(isset($title))
        - {{$title}}
    @endif
@endsection('title')

@section('content')

    <div class="container mt-4">
        <h3 class="mb-3">Przykładowa Tabela</h3>
        <table class="table table-striped table-bordered table-hover align-middle">
            <thead class="table-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Imie</th>
                <th scope="col">Nazwisko</th>
                <th scope="col">Lata</th>
            </tr>
            </thead>
            <tbody>


            @foreach($lista as $asset)

                <tr>
                    <th scope="row">{{$loop->iteration}}</th>
                    <td>{{$asset['imie']}}</td>
                    <td>{{$asset['nazwisko']}}</td>
                    <td>{{$asset['lat']}}</td>
                </tr>

            @endforeach
            </tbody>
        </table>
    </div>

@endsection
