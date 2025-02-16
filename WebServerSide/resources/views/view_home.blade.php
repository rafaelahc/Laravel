    @extends('layouts.fe_layout')

    @section('content')
    <h6>{{$myVar}}</h6>
    <img class='my-image' src="{{asset('img/imagem.jpg')}}" alt="scotland">

    <p>Meu nome é {{$myName}} e eu amo {{$shoppinList[0]}}!</p>

    <h6>Abaixo, fizemos uma lista de frutas com o forEach: </h1>
    <ul>
        @foreach($shoppinList as $item)
        <li>{{$item}}</li>
        @endforeach
    </ul>

    <h6>Meu nome é {{$contactInfo['nome']}} e meu email é {{$contactInfo['email']}}</h6>


    <p>Atualmente sou estudante do curso de front-end no {{$cesaeInfo['name']}}: </p>
    <p>Que está localizado em:  {{$cesaeInfo['address']}}</p>
    <p>Email: {{$cesaeInfo['email']}}</p>

    <h6>Abaixo, segue a lista do que aprendemos no curso de php</h6>

    <ul>
        <li><a href="{{ route ('welcome') }}">Página inicial do Laravel/PHP</a></li>
        <li><a href="{{ route('users.all') }}">Ver lista de users</a></li>
        <li><a href="{{ route('hello') }}">Hello</a></li>
        <li><a href="{{ route('users.add') }}">Adicionar novo utilizador</a></li>
        <li><a href="{{ route('addTask') }}">Adicionar nova tarefas</a></li>
        <li><a href="{{ route('task') }}">Ver lista tarefas</a></li>
        <li><a href="{{ route('gifts.view') }}">Ver lista de prendas</a></li>
        <li><a href="{{ route('gifts.add') }}">Adicionar nova prenda</a></li>


    </ul>
    @endsection
