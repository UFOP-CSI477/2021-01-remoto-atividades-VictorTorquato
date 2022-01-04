<!DOCTYPE html>
<head>
    <title>Controle de Vacinação COVID-19 - Pessoas Cadastradas</title>
</head>

@extends('layouts.defaultLogged')
@section('content')

    <div class="container" style="margin-top: 2rem">

        @if(Session::has('message'))
            <p class="alert {{ Session::get('alert-class', 'alert-info') }}" style="margin-top: 2rem">
                {{ Session::get('message') }}</p>
        @endif

        <h3 style="margin-top: 2rem">Pessoas cadastradas: </h3>

        <div class="container" style="margin-top: 2rem">
            <table class="table table-hover" style="text-align: center">
                <thead class="thread-light">
                    <tr>
                        <th>Nome</th>
                        <th>CPF</th>
                        <th>Data de Nascimento</th>
                        <th>Bairro</th>
                        <th>Cidade</th>
                        <th>Estado</th>
                        <th>Detalhes</th>
                        <th>Editar</th>
                        <th>Excluir</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($pessoas as $p)
                        <tr>
                            <td class="align-middle">{{ $p->nome }}</td>
                            <td class="align-middle">{{ $p->cpf }}</td>
                            <td class="align-middle">{{ $p->data_nascimento }}</td>
                            <td class="align-middle">{{ $p->bairro }}</td>
                            <td class="align-middle">{{ $p->cidade }}</td>
                            <td class="align-middle">{{ $p->estado }}</td>
                            <td class="align-middle"><a href="{{ route('pessoas.show', $p) }}">Detalhes</a></td>
                            <td class="align-middle"><a href="{{ route('pessoas.edit', $p) }}">Editar</a></td>
                            <td class="align-middle"><form method="post" action="{{ route('pessoas.destroy', $p) }}">
                            @csrf
                            @method('DELETE')
                                <button type="submit" class="btn btn-link">Excluir</button>
                            </form></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            @if(count($pessoas) == 0)
                <div class="d-flex justify-content-center">
                    <p style="margin: 2rem; font-weight: bold">Não há pessoas cadastradas, cadastre uma para visualizá-la aqui!</p>
                </div>
            @endif
            <div class="d-flex justify-content-center" style="margin: 2rem">
                <a type="button" style="width: 16rem" class="btn btn-success" href="{{ route('pessoas.create') }}">Adicionar Pessoa</a>
            </div>
        </div>
    </div>
@endsection