@extends('layouts.fe_layout')
@section('content')

<h1>Detalhes do presente: </h1>

<p><b>Responsável pelo Presente: </b>{{$user->name}} </p>
<p><b>Presente: </b>{{$gift->name}} </p>
<p><b>Budget inicial:</b> {{$gift->expected_value}}€</p>
<p><b>Valor pago no presente: </b>{{$gift->spent_value}}€</p>
<p><b>Diferença valor: </b>{{$gift->expected_value - $gift->spent_value}}€</p>

@endsection
