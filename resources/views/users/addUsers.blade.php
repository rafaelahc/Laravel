@extends('layouts.fe_layout')

@section('content')
    <h1>Add novo utilizador: </h1>
    <form method="POST" action="{{route('users.create')}}">
        @csrf {{-- Validação --}}
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Nome: </label>
          <input required type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
          @error('name')
            preencha um nome válido
          @enderror
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email: </label>
            <input required type="email" name="email" class="form-control" id="exampleInputPassword1">
            @error('email')
            preencha um email válido
            @enderror
          </div>
        <div class="mb-3">
          <label required for="exampleInputPassword1" class="form-label">Password: </label>
          <input type="password" name="password" class="form-control" id="exampleInputPassword1">
          @error('password')
             password inválida
          @enderror

        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
@endsection
