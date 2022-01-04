<!DOCTYPE html>
<head>
    <title>Controle de Vacinação COVID-19 - Detalhes da Vacina</title>
</head>

@extends('layouts.defaultLogged')
@section('content')

    <div class="container" style="margin-top: 2rem">

        @if(Session::has('message'))
            <p class="alert {{ Session::get('alert-class', 'alert-info') }}" style="margin-top: 2rem">
                {{ Session::get('message') }}</p>
        @endif

        <h3 style="margin-top: 2rem">Detalhes da vacina: </h3>

        <form method="post" action="{{ route('vacinas.destroy', $vacina) }}">
        @csrf
        @method('DELETE')

            <div class="form-group column">
                <label for="nomeText" style="font-weight: bold">Nome: </label>
                <text id="nomeText">{{ $vacina->nome }}</text>
            </div>

            <div class="form-group column">
                <label for="fabricanteText" style="font-weight: bold">Fabricante: </label>
                <text id="fabricanteText">{{ $vacina->fabricante }}</text>
            </div>

            <div class="form-group column">
                <label for="paisText" style="font-weight: bold">País: </label>
                <text id="paisText">{{ $vacina->pais }}</text>
            </div>

            <div class="form-group column">
                <label for="dosesText" style="font-weight: bold">Doses: </label>
                <text id="dosesText">{{ $vacina->doses }}</text>
            </div>

            <div class="form-group" style="margin-top: 1rem">
                <a class="btn btn-success" style="width: 8rem" type="button" href="{{ route('vacinas.edit', $vacina) }}">Editar</a>
                <a class="btn btn-secondary" style="width: 8rem" type="button" href="{{ route('vacinas.index') }}">Voltar</a>
                <button class="btn btn-danger" style="width: 8rem" type="submit">Excluir</button>
            </div>

        </form>
    </div>

@endsection