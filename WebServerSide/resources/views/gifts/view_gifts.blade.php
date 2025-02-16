@extends('layouts.fe_layout')

@section('content')

<h1>Lista de Presentes: </h1>

<table class="table">
    <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Nome</th>
            <th scope="col">Valor esperado</th>
            <th scope="col">Valor gasto</th>
            <th scope="col">Responsável pelo Presente</th>
            <th scope="col">Diferença valor</th>
            <th scope="col">Ver dados</th>
            <th scope="col">Apagar presente</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($gifts as $gift)
            <tr>
                <td>{{$gift->id}}</td>
                <td>{{$gift->name}}</td>
                <td>{{$gift->expected_value}}</td>
                <td>{{$gift->spent_value}}</td>
                <td>{{$users->where('id', $gift->user_id)->first()->name}}</td>
                <td>{{$gift->expected_value - $gift->spent_value}}</td>
                <td><a href="{{route('gifts.details', $gift->id)}}" class="btn btn-info">Ver</a></td>
                <td><a href="{{route('gifts.delete', $gift->id)}}" class="btn btn-danger">Apagar</a></td>
            </tr>
        @endforeach
    </tbody>
</table>

@if(session('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
@endif

@endsection
