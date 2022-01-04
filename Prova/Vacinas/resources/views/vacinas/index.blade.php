<!DOCTYPE html>
<head>
    <title>Controle de Vacinação COVID-19 - Vacinas Cadastradas</title>
</head>

@extends('layouts.defaultLogged')
@section('content')

    <div class="container" style="margin-top: 2rem">

        @if(Session::has('message'))
            <p class="alert {{ Session::get('alert-class', 'alert-info') }}" style="margin-top: 2rem">
                {{ Session::get('message') }}</p>
        @endif

        <h3 style="margin-top: 2rem">Vacinas cadastradas: </h3>

        <div class="container" style="margin-top: 2rem">
            <table class="table table-hover" style="text-align: center">
                <thead class="thread-light">
                    <tr>
                        <th>Nome</th>
                        <th>Fabricante</th>
                        <th>País</th>
                        <th>Doses</th>
                        <th>Detalhes</th>
                        <th>Editar</th>
                        <th>Excluir</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($vacinas as $v)
                        <tr>
                            <td class="align-middle">{{ $v->nome }}</td>
                            <td class="align-middle">{{ $v->fabricante }}</td>
                            <td class="align-middle">{{ $v->pais }}</td>
                            <td class="align-middle">{{ $v->doses }}</td>
                            <td class="align-middle"><a href="{{ route('vacinas.show', $v) }}">Detalhes</a></td>
                            <td class="align-middle"><a href="{{ route('vacinas.edit', $v) }}">Editar</a></td>
                            <td class="align-middle"><form method="post" action="{{ route('vacinas.destroy', $v) }}">
                            @csrf
                            @method('DELETE')
                                <button type="submit" class="btn btn-link">Excluir</button>
                            </form></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            @if(count($vacinas) == 0)
                <div class="d-flex justify-content-center">
                    <p style="margin: 2rem; font-weight: bold">Não há vacinas cadastradas, cadastre uma para visualizá-la aqui!</p>
                </div>
            @endif
            <div class="d-flex justify-content-center" style="margin: 2rem">
                <a type="button" style="width: 16rem" class="btn btn-success" href="{{ route('vacinas.create') }}">Adicionar Vacina</a>
            </div>
        </div>
    </div>
@endsection