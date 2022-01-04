<!DOCTYPE html>
<head>
    <title>Controle de Vacinação COVID-19 - Registros de Vacinação</title>
</head>

@extends('layouts.defaultLogged')
@section('content')

    <div class="container" style="margin-top: 2rem">

        @if(Session::has('message'))
            <p class="alert {{ Session::get('alert-class', 'alert-info') }}" style="margin-top: 2rem">
                {{ Session::get('message') }}</p>
        @endif

        <h3 style="margin-top: 2rem">Registros de vacinação: </h3>

        <div class="container" style="margin-top: 2rem">
            <table class="table table-hover" style="text-align: center">
                <thead class="thread-light">
                    <tr>
                        <th>Data</th>
                        <th>Unidade</th>
                        <th>Pessoa</th>
                        <th>Vacina</th>
                        <th>Dose</th>
                        <th>Detalhes</th>
                        <th>Editar</th>
                        <th>Excluir</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($registros as $r)
                        <tr>
                            <td class="align-middle">{{ Carbon\Carbon::parse($r->data)->format('d/m/Y') }}</td>
                            <td class="align-middle">{{ $r->unidade->nome }}</td>
                            <td class="align-middle">{{ $r->pessoa->nome }}</td>
                            <td class="align-middle">{{ $r->vacina->nome }}</td>
                            <td class="align-middle">{{ $r->dose }}ª dose</td>
                            <td class="align-middle"><a href="{{ route('registros.show', $r) }}">Detalhes</a></td>
                            <td class="align-middle"><a href="{{ route('registros.edit', $r) }}">Editar</a></td>
                            <td class="align-middle"><form method="post" action="{{ route('registros.destroy', $r) }}">
                            @csrf
                            @method('DELETE')
                                <button type="submit" class="btn btn-link">Excluir</button>
                            </form></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            @if(count($registros) == 0)
                <div class="d-flex justify-content-center">
                    <p style="margin: 2rem; font-weight: bold">Não há registros de vacinação, adicione um para visualizá-lo aqui!</p>
                </div>
            @endif
            <div class="d-flex justify-content-center" style="margin: 2rem">
                <a type="button" style="width: 16rem" class="btn btn-success" href="{{ route('registros.create') }}">Adicionar Registro</a>
            </div>
        </div>
    </div>
@endsection