@extends('layouts.fe_layout')

@section('content')

    <h1>Lista de tarefas: </h1>

    <ul>
        @foreach ($tasksList as $task)
            <li>{{ $task['name'] }} : {{ $task['task'] }}</li>
        @endforeach
    </ul>


    <ul>
        @foreach ($availableTasks as $task)
            <li>{{ $task }}</li>
        @endforeach
    </ul>

    <h3>Tarefas vindas do Banco de dados: </h3>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Nome</th>
                <th scope="col">Descrição</th>
                <th scope="col">Data Limite </th>
                <th scope="col">Nome do responsável da tarefa</th>
                <th scope="col">Ver dados</th>
                <th scope="col">Apagar tarefa</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tasksFromDB as $task)
                <tr>
                    <th scope="row">{{ $task->id }}</th>
                    <td>{{ $task->name }}</td>
                    <td>{{ $task->description }}</td>
                    <td>{{ $task->due_at }}</td>
                    <td>{{ $task->user_name }}</td>
                    <td><a href="{{ route('task.view', $task->id) }}"class="btn btn-info">Ver</a></td>
                    <td><a href="{{ route('task.delete', $task->id) }}" class="btn btn-danger">Apagar</a></td>
                </tr>
            @endforeach
        </tbody>

    </table>
@endsection
