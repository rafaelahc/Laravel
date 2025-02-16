@extends('layouts.fe_layout')
@section('content')


<p>Name: {{$ourTasks -> name}}</p>
<p>Tarefa: {{$ourTasks -> description}}</p>
<p>Status: {{$ourTasks -> status}}</p>
<p>Responsável: {{$ourTasks -> user_name}}</p>

@endsection
