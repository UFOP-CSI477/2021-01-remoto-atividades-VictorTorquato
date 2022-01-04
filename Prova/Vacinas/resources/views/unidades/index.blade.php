<!DOCTYPE html>
<head>
    <title>Controle de Vacinação COVID-19 - Unidades Cadastradas</title>
</head>

@extends('layouts.defaultLogged')
@section('content')

    <div class="container" style="margin-top: 2rem">

        @if(Session::has('message'))
            <p class="alert {{ Session::get('alert-class', 'alert-info') }}" style="margin-top: 2rem">
                {{ Session::get('message') }}</p>
        @endif

        <h3 style="margin-top: 2rem">Unidades cadastradas: </h3>

        <div class="container" style="margin-top: 2rem">
            <table class="table table-hover" style="text-align: center">
                <thead class="thread-light">
                    <tr>
                        <th>Nome</th>
                        <th>Bairro</th>
                        <th>Cidade</th>
                        <th>Estado</th>
                        <th>Detalhes</th>
                        <th>Editar</th>
                        <th>Excluir</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($unidades as $u)
                        <tr>
                            <td class="align-middle">{{ $u->nome }}</td>
                            <td class="align-middle">{{ $u->bairro }}</td>
                            <td class="align-middle">{{ $u->cidade }}</td>
                            <td class="align-middle">{{ $u->estado }}</td>
                            <td class="align-middle"><a href="{{ route('unidades.show', $u) }}">Detalhes</a></td>
                            <td class="align-middle"><a href="{{ route('unidades.edit', $u) }}">Editar</a></td>
                            <td class="align-middle"><form method="post" action="{{ route('unidades.destroy', $u) }}">
                            @csrf
                            @method('DELETE')
                                <button type="submit" class="btn btn-link">Excluir</button>
                            </form></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            @if(count($unidades) == 0)
                <div class="d-flex justify-content-center">
                    <p style="margin: 2rem; font-weight: bold">Não há unidades cadastradas, cadastre uma para visualizá-la aqui!</p>
                </div>
            @endif
            <div class="d-flex justify-content-center" style="margin: 2rem">
                <a type="button" style="width: 16rem" class="btn btn-success" href="{{ route('unidades.create') }}">Adicionar Unidade</a>
            </div>
        </div>
    </div>
@endsection