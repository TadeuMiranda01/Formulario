<!-- resources/views/contatos/index.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Lista de Contatos</h1>

    <!-- Adicione aqui a tabela de contatos -->
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Contato</th>
                <th>Email</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($contatos as $contato)
                <tr>
                    <td>{{ $contato->id }}</td>
                    <td>{{ $contato->nome }}</td>
                    <td>{{ $contato->contato }}</td>
                    <td>{{ $contato->email }}</td>
                    <td>
                        <a href="{{ route('contatos.show', $contato->id) }}" class="btn btn-info">Detalhes</a>
                        <a href="{{ route('contatos.edit', $contato->id) }}" class="btn btn-primary">Editar</a>
                        <form action="{{ route('contatos.destroy', $contato->id) }}" method="post" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Tem certeza que deseja excluir?')">Excluir</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
