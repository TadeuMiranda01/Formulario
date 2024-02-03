<!-- resources/views/contatos/create.blade.php -->

@extends('layouts.app')

@section('content')
    <div style="max-width: 400px; margin: 0 auto;">
        <h1 class="text-center">Novo Contato</h1>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('contatos.store') }}" method="post" id="formContato">
            @csrf
            <div class="form-group">
                <label for="nome">Nome:</label>
                <input type="text" name="nome" class="form-control" required pattern="[A-Za-z\s]{2,}" title="Digite um nome válido">
            </div>
            <div class="form-group">
                <label for="contato">Telefone:</label>
                <input type="tel" name="contato" class="form-control" required pattern="\d{9}" title="Digite um número de telefone válido (9 dígitos)" oninput="this.value = this.value.replace(/[^0-9]/g, '');">
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" name="email" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary btn-block">Salvar</button>
        </form>
    </div>
@endsection
