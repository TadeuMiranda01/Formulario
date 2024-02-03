<!-- resources/views/contatos/show.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Detalhes do Contato</h1>

    <ul>
        <li><strong>ID:</strong> {{ $contato->id }}</li>
        <li><strong>Nome:</strong> {{ $contato->nome }}</li>
        <li><strong>Contato:</strong> {{ $contato->contato }}</li>
        <li><strong>Email:</strong> {{ $contato->email }}</li>
    </ul>

    <a href="{{ route('contatos.edit', $contato->id) }}" class="btn btn-primary">Editar</a>
    <form action="{{ route('contatos.destroy', $contato->id) }}" method="post" style="display: inline;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger" onclick="return confirm('Tem certeza que deseja excluir?')">Excluir</button>
    </form>
@endsection
