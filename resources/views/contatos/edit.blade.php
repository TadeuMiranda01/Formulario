<!-- resources/views/contatos/edit.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Editar Contato</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('contatos.update', $contato->id) }}" method="post">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nome">Nome:</label>
            <input type="text" name="nome" class="form-control" value="{{ $contato->nome }}" required>
        </div>
        <div class="form-group">
            <label for="contato">Contato:</label>
            <input type="text" name="contato" class="form-control" value="{{ $contato->contato }}" required>
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" name="email" class="form-control" value="{{ $contato->email }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Salvar</button>
    </form>
@endsection
