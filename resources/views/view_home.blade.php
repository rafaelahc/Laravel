    @extends('layouts.fe_layout')

    @section('content')
    <h1>Home Page</h1>

    <h6>{{$myVar}}</h6>
    <img class='my-image' src="{{asset('img/imagem.jpg')}}" alt="scotland">
    <h6>Meu nome é {{$myName}}</h6>
    <h6>E eu amo {{$shoppinList[0]}}</h6>

    <ul>
        @foreach($shoppinList as $item)
        <li>{{$item}}</li>
        @endforeach
    </ul>
    <h6>Nome é {{$contactInfo['nome']}} e meu email é {{$contactInfo['email']}}</h6>


    <h6>Os dados do Cesae são: nome {{$cesaeInfo['name']}}</h6>
    <h6>Morada: {{$cesaeInfo['address']}}</h6>
    <h6>Email: {{$cesaeInfo['email']}}</h6>

    <ul>
        <li><a href="{{ route('users.all') }}">Todos os users</a></li>
        <li><a href="{{ route ('welcome') }}">Welcome</a></li>
        <li><a href="{{ route('hello') }}">Hello</a></li>
        <li><a href="{{ route('users.add') }}">Adicionar novos utilizadores</a></li>
        <li><a href="{{ route('addTask') }}">Adicionar tarefas</a></li>
        <li><a href="{{ route('task') }}">Ver todas as tarefas</a></li>


    </ul>
    @endsection
