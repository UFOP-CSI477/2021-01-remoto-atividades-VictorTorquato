<!DOCTYPE html>
<head>
    <title>Controle de Vacinação COVID-19 - Detalhes da Pessoa</title>
</head>

@extends('layouts.defaultLogged')
@section('content')

    <div class="container" style="margin-top: 2rem">

        @if(Session::has('message'))
            <p class="alert {{ Session::get('alert-class', 'alert-info') }}" style="margin-top: 2rem">
                {{ Session::get('message') }}</p>
        @endif

        <h3 style="margin-top: 2rem">Detalhes da pessoa: </h3>

        <form method="post" action="{{ route('pessoas.destroy', $pessoa) }}">
        @csrf
        @method('DELETE')
        <h4 style="margin: 2rem">Dados pessoais: </h4>

            <div class="form-group column">
                <label for="nomeText" style="font-weight: bold">Nome: </label>
                <text id="nomeText">{{ $pessoa->nome }}</text>
            </div>
            
            <div class="form-group column">
                <label for="cpfText" style="font-weight: bold">CPF: </label>
                <text id="cpfText">{{ $pessoa->cpf }}</text>
            </div>

            <div class="form-group column">
                <label for="data_nascimentoText" style="font-weight: bold">Data de nascimento: </label>
                <text id="data_nascimentoText">{{ $pessoa->data_nascimento }}</text>
            </div>

        <h4 style="margin: 2rem">Endereço: </h4>

            <div class="form-group column">
                <label for="bairroText" style="font-weight: bold">Bairro: </label>
                <text id="bairroText">{{ $pessoa->bairro }}</text>
            </div>

            <div class="form-group column">
                <label for="cidadeText" style="font-weight: bold">Cidade: </label>
                <text id="cidadeText">{{ $pessoa->cidade }}</text>
            </div>

            <div class="form-group column">
                <label for="estadoText" style="font-weight: bold">Estado: </label>
                <text id="estadoText">{{ $pessoa->estado }}</text>
            </div>

            <div class="form-group" style="margin-top: 1rem">
                <a class="btn btn-success" style="width: 8rem" type="button" href="{{ route('pessoas.edit', $pessoa) }}">Editar</a>
                <a class="btn btn-secondary" style="width: 8rem" type="button" href="{{ route('pessoas.index') }}">Voltar</a>
                <button class="btn btn-danger" style="width: 8rem" type="submit">Excluir</button>
            </div>

        </form>
    </div>

@endsection