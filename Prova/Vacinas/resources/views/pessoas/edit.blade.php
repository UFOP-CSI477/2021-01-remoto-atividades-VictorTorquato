<!DOCTYPE html>
<head>
    <title>Controle de Vacinação COVID-19 - Editar Pessoa</title>
</head>

@extends('layouts.defaultLogged')
@section('content')

    <div class="container" style="margin-top: 2rem">

        @if(Session::has('message'))
            <p class="alert {{ Session::get('alert-class', 'alert-info') }}" style="margin-top: 2rem">
                {{ Session::get('message') }}</p>
        @endif

        <h3 style="margin-top: 2rem">Editar pessoa: </h3>

        <form method="post" action="{{ route('pessoas.update', $pessoa) }}">
        @csrf
        @method('PUT')
        <h4 style="margin-bottom: 2rem; margin-top: 2rem">- Dados pessoais: </h4>

            <div class="form-group column">
                <label for="nomeInput">Nome Completo</label>
                <input class="form-control" required="true" value="{{ $pessoa->nome }}" name="nome" id="nomeInput"/>
            </div>
            
            <div class="form-group column">
                <label for="cpfInput">CPF (apenas números)</label>
                <input class="form-control" required="true" value="{{ $pessoa->cpf }}" name="cpf" id="cpfInput"/>
            </div>

            <div class="form-group column">
                <label for="data_nascimentoInput">Data de nascimento</label>
                <input class="form-control" required="true" type="date" value="{{ $pessoa->data_nascimento }}" name="data_nascimento" id="data_nascimentoInput"/>
            </div>

        <h4 style="margin-bottom: 2rem; margin-top: 2rem">- Endereço: </h4>

            <div class="form-group column">
                <label for="bairroInput">Bairro</label>
                <input class="form-control" required="true" value="{{ $pessoa->bairro }}" name="bairro" id="bairroInput"/>
            </div>

            <div class="form-group column">
                <label for="cidadeInput">Cidade</label>
                <input class="form-control" required="true" value="{{ $pessoa->cidade }}" name="cidade" id="cidadeInput"/>
            </div>

            <div class="form-group column">
                <label for="estadoInput">Estado</label>
                <input class="form-control" required="true" value="{{ $pessoa->estado }}" name="estado" id="estadoInput"/>
            </div>

            <div class="form-group" style="margin-top: 2rem; margin-bottom: 2rem;">
                <button class="btn btn-success" style="width: 8rem" type="submit">Editar</button>
                <a class="btn btn-secondary" style="width: 8rem" type="button" href="{{ route('pessoas.index') }}">Voltar</a>
                <button class="btn btn-secondary" style="width: 8rem" type="reset">Limpar</button>
            </div>

        </form>
    </div>

@endsection