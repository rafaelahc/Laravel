@extends('layouts.fe_layout')
@section('content')

<h6>Utilizador: {{$ourUser -> name}}</h6>
<p>Name: {{$ourUser -> name}}</p>
<p>Morada: {{$ourUser -> address}}</p>
<p>NIF: {{$ourUser -> nif}}</p>

@endsection
