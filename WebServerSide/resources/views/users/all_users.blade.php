@extends('layouts.fe_layout')

@section('content')

@if(session('message'))
    <div class="alert alert-sucess">
        {{session('message')}}
    </div>
@endif


    <h1>TODOS OS USERRRRRRRRRRRRSSSSSSSSSSS</h1>
    <h6>Os dados do Cesae são: nome {{$cesaeInfo['name']}}</h6>
    <h6>Morada: {{$cesaeInfo['address']}}</h6>
    <h6>Email: {{$cesaeInfo['email']}}</h6>

    <ul>
        <h3>Os dados abaixo foram não vieram da Base de Dados:</h3>
        @foreach($allUsers as $user)
        <li>{{$user['id']}} : {{$user['name']}} : {{$user['email']}}</li>
         @endforeach
    </ul>


    <h3>Esses dados são da Base de Dados</h3>

    <table class="table">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Nome</th>
      <th scope="col">E-mail</th>
      <th scope="col">Morada</th>
      <th scope="col"></th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
    @foreach($usersFromDB as $user)
    <tr>
      <th scope="row">{{$user->id}}</th>
      <td>{{$user->name}}</td>
      <td>{{$user->email}}</td>
      <td>{{$user->address}}</td>
      <td><a href="{{route('users.view', $user->id)}}"class="btn btn-info">Ver</a></td>
      <td><a href="{{route('users.delete', $user->id)}}" class="btn btn-danger">Apagar</a></td>
    </tr>
    @endforeach
  </tbody>
</table>

@endsection
