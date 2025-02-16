@extends('layouts.fe_layout')

@section('content')
    <h1>Adicionar um novo presente: </h1>
    <form method="POST" action="{{route('gifts.create')}}">
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
          <label for="exampleInputEmail1" class="form-label">Presente: </label>
          <input required type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
          @error('name')
            preencha um nome válido
          @enderror
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Valor esperado: </label>
            <input required type="text" name="expected_value" class="form-control" id="exampleInputPassword1">
            @error('expected_value')
            preencha um valor válido
            @enderror
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Valor gasto: </label>
            <input required type="text" name="spent_value" class="form-control" id="exampleInputPassword1">
            @error('expected_value')
            preencha um valor válido
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
@endsection
