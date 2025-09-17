@extends('layouts/main')

@section('title')
    @if(isset($title))
        - {{$title}}
    @endif
@endsection('title')

@section('content')

    <div class="container mt-4">
        <h3 class="mb-3">Industries</h3>
        <table class="table table-striped table-bordered table-hover align-middle">
            <thead class="table-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Opis</th>
                <th scope="col">Nazwa</th>
            </tr>
            </thead>
            <tbody>

            @foreach($lista as $asset)
                <tr>
                    <!-- <th scope="row">{{$loop->iteration}}</th> -->
                    <td>{{$asset->id }}</td>
                    <td> {{$asset->description}} </td>
                    <td>{{$asset->industry_name }}</td>
                    <td>
                        <ul>
                        @foreach($asset->allContact as $contact)
                           <li> {{$contact->first_name}} {{$contact->last_name}} <br></li>
                        @endforeach
                        </ul>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@endsection
