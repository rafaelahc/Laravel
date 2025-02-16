@extends('layouts.fe_layout')
@section('content')

<h2>Detalhes da tarefa: </h2>
<p><b>Nome:</b> {{$ourTasks -> name}}</p>
<p><b>Descrição da tarefa:</b> {{$ourTasks -> description}}</p>
<p><b>Responsável pela tarefa:</b> {{$ourTasks -> user_name}}</p>

@endsection
