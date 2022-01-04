<!DOCTYPE html>
<head>
    <title>Controle de Vacinação COVID-19 - Cadastrar Pessoa</title>
</head>

@extends('layouts.defaultLogged')
@section('content')

    <div class="container" style="margin-top: 2rem">

        @if(Session::has('message'))
            <p class="alert {{ Session::get('alert-class', 'alert-info') }}" style="margin-top: 2rem">
                {{ Session::get('message') }}</p>
        @endif

        <h3 style="margin-top: 2rem">Insira os dados da pessoa: </h3>

        <form method="post" action="{{ route('pessoas.store') }}">
        @csrf

        <h4 style="margin-bottom: 2rem; margin-top: 2rem">- Dados pessoais: </h4>

            <div class="form-group column">
                <label for="nomeInput">Nome Completo</label>
                <input class="form-control" required="true" name="nome" id="nomeInput"/>
            </div>
            
            <div class="form-group column">
                <label for="cpfInput">CPF (apenas números)</label>
                <input class="form-control" required="true" name="cpf" id="cpfInput"/>
            </div>

            <div class="form-group column">
                <label for="data_nascimentoInput">Data de nascimento</label>
                <input class="form-control" required="true" type="date" name="data_nascimento" id="data_nascimentoInput"/>
            </div>

        <h4 style="margin-bottom: 2rem; margin-top: 2rem">- Endereço: </h4>

            <div class="form-group column">
                <label for="bairroInput">Bairro</label>
                <input class="form-control" required="true" name="bairro" id="bairroInput"/>
            </div>

            <div class="form-group column">
                <label for="cidadeInput">Cidade</label>
                <input class="form-control" required="true" name="cidade" id="cidadeInput"/>
            </div>

            <div class="form-group column">
                <label for="estadoInput">Estado</label>
                <input class="form-control" required="true" name="estado" id="estadoInput"/>
            </div>

            <div class="form-group" style="margin-top: 2rem; margin-bottom: 2rem;">
                <button class="btn btn-success" style="width: 8rem" type="submit">Criar</button>
                <a class="btn btn-secondary" style="width: 8rem" type="button" href="{{ route('pessoas.index') }}">Voltar</a>
                <button class="btn btn-secondary" style="width: 8rem" type="reset">Limpar</button>
            </div>

        </form>
    </div>

@endsection