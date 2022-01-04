<!DOCTYPE html>
<head>
    <title>Controle de Vacinação COVID-19 - Detalhes da Unidade</title>
</head>

@extends('layouts.defaultLogged')
@section('content')

    <div class="container" style="margin-top: 2rem">

        @if(Session::has('message'))
            <p class="alert {{ Session::get('alert-class', 'alert-info') }}" style="margin-top: 2rem">
                {{ Session::get('message') }}</p>
        @endif

        <h3 style="margin-top: 2rem">Detalhes da unidade: </h3>

        <form method="post" action="{{ route('unidades.destroy', $unidade) }}">
        @csrf
        @method('DELETE')

            <div class="form-group column">
                <label for="nomeText" style="font-weight: bold">Nome: </label>
                <text id="nomeText">{{ $unidade->nome }}</text>
            </div>

            <div class="form-group column">
                <label for="bairroText" style="font-weight: bold">Bairro: </label>
                <text id="bairroText">{{ $unidade->bairro }}</text>
            </div>

            <div class="form-group column">
                <label for="cidadeText" style="font-weight: bold">Cidade: </label>
                <text id="cidadeText">{{ $unidade->cidade }}</text>
            </div>

            <div class="form-group column">
                <label for="estadoText" style="font-weight: bold">Estado: </label>
                <text id="estadoText">{{ $unidade->estado }}</text>
            </div>

            <div class="form-group" style="margin-top: 1rem">
                <a class="btn btn-success" style="width: 8rem" type="button" href="{{ route('unidades.edit', $unidade) }}">Editar</a>
                <a class="btn btn-secondary" style="width: 8rem" type="button" href="{{ route('unidades.index') }}">Voltar</a>
                <button class="btn btn-danger" style="width: 8rem" type="submit">Excluir</button>
            </div>

        </form>
    </div>

@endsection