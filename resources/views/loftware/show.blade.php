@extends('layouts/main')

@section('title')
    @if(isset($title))
        - {{$title}}
    @endif
@endsection('title')

@section('content')
    <div class="container mt-4">
        <h3 class="mb-3">Informacje na temat użytkownika</h3>
        <div class="card">
            <div class="card-header">
                {{ $lista->name }}
            </div>
            <div class="card-body">
                <table class="table">
                    <tr>
                        <td>Name:</td>
                        <td> {{$lista->name}} </td>
                    </tr>
                    <tr>
                        <td>email:</td>
                        <td> {{$lista->email}} </td>
                    </tr>
                    <tr>
                        <td>phone</td>
                        <td> {{$lista->phone}} </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
@endsection
