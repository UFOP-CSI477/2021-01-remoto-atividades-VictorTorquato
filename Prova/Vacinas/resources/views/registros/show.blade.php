<!DOCTYPE html>
<head>
    <title>Controle de Vacinação COVID-19 - Detalhes do Registro</title>
</head>

@extends('layouts.defaultLogged')
@section('content')

    <div class="container" style="margin-top: 2rem">

        @if(Session::has('message'))
            <p class="alert {{ Session::get('alert-class', 'alert-info') }}" style="margin-top: 2rem">
                {{ Session::get('message') }}</p>
        @endif

        <h3 style="margin-top: 2rem">Detalhes do registro: </h3>

        <form method="post" action="{{ route('registros.destroy', $registro) }}">
        @csrf
        @method('DELETE')

            <div class="form-group column">
                <label for="pessoaText" style="font-weight: bold">Pessoa: </label>
                <text id="pessoaText">{{ $registro->pessoa->nome }}</text>
            </div>

            <div class="form-group column">
                <label for="unidadeText" style="font-weight: bold">Unidade: </label>
                <text id="unidadeText">{{ $registro->unidade->nome }}</text>
            </div>

            <div class="form-group column">
                <label for="vacinaText" style="font-weight: bold">Vacina: </label>
                <text id="vacinaText">{{ $registro->vacina->nome }}</text>
            </div>

            <div class="form-group column">
                <label for="doseText" style="font-weight: bold">Dose: </label>
                <text id="doseText">{{ $registro->dose }}ª dose</text>
            </div>

            <div class="form-group column">
                <label for="dataText" style="font-weight: bold">Data: </label>
                <text id="dataText">{{ Carbon\Carbon::parse($registro->data)->format('d/m/Y') }}</text>
            </div>

            <div class="form-group" style="margin-top: 1rem">
                <a class="btn btn-success" style="width: 8rem" type="button" href="{{ route('registros.edit', $registro) }}">Editar</a>
                <a class="btn btn-secondary" style="width: 8rem" type="button" href="{{ route('registros.index') }}">Voltar</a>
                <button class="btn btn-danger" style="width: 8rem" type="submit">Excluir</button>
            </div>

        </form>
    </div>

@endsection