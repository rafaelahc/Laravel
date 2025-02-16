@extends('layouts.fe_layout')

@section('content')
    <h1>Adicionar nova tarefa: </h1>
    <form method="POST" action="{{route('tasks.create') }}">
        @csrf {{-- Validação --}}

        <div class="mb-3">
            <label for="userSelect" class="form-label">Usuário:</label>
            <select required name="user_id" class="form-control" id="userSelect">
                <option value="">Selecione um usuário</option>
                @foreach($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
            </select>
            @error('user_id')
                selecione um usuário válido
            @enderror
        </div>

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Nome da tarefa: </label>
            <input required type="text" name="name" class="form-control" id="exampleInputEmail1"
                aria-describedby="emailHelp">
            @error('name')
                preencha um nome válido
            @enderror
        </div>
        <div class="mb-3">
            <label for="exampleInputTaskDescription1" class="form-label">Descrição: </label>
            <input required type="text" name="description" class="form-control" id="exampleInputTaskDescription1">
            @error('email')
                preencha algo válido
            @enderror
        </div>
        <div class="mb-3">
            <label for="exampleInputTaskDescription1" class="form-label">Data limite: </label>
            <input required type="date" name="date" class="form-control" id="exampleInputTaskDescription1">
            @error('email')
                preencha algo válido
            @enderror
        </div>


        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

@endsection
