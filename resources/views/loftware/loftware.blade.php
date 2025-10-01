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
                <th scope="col">Email</th>
                <th scope="col">Phone</th>
                <th scope="col">Address</th>
                <th scope="col">Status</th>
                <th scope="col">Role</th>
            </tr>
            </thead>
            <tbody>

            @foreach($lista as $asset)
                <tr>
                   <!-- <th scope="row">{{$loop->iteration}}</th> -->
                    <td>{{$asset->id }}</td>
                    <td><a href="{{URL::to('loftware/' . $asset->id)}}"> {{$asset->name}} </a></td>
                    <td>{{$asset->email }}</td>
                    <td>{{$asset->phone }}</td>
                    <td>{{$asset->address }}</td>
                    <td>{{$asset->status }}</td>
                    <td>{{$asset->role }}</td>
                </tr>
            @endforeach

            </tbody>
        </table>
        @foreach($stat as $stats)
            <p>Status: {{ $stats->status }} – Liczba: {{ $stats->user_count }}</p>
        @endforeach
    </div>

@endsection
