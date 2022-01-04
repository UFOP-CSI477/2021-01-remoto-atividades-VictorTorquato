<!DOCTYPE html>
<head>
    <title>Controle de Vacinação COVID-19 - Cadastrar Unidade</title>
</head>

@extends('layouts.defaultLogged')
@section('content')

    <div class="container" style="margin-top: 2rem">

        @if(Session::has('message'))
            <p class="alert {{ Session::get('alert-class', 'alert-info') }}" style="margin-top: 2rem">
                {{ Session::get('message') }}</p>
        @endif

        <h3 style="margin-top: 2rem">Insira os dados da unidade: </h3>

        <form method="post" action="{{ route('unidades.store') }}">
        @csrf

            <div class="form-group column">
                <label for="nomeInput">Nome</label>
                <input class="form-control" required="true" name="nome" id="nomeInput"/>
            </div>

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
                <a class="btn btn-secondary" style="width: 8rem" type="button" href="{{ route('unidades.index') }}">Voltar</a>
                <button class="btn btn-secondary" style="width: 8rem" type="reset">Limpar</button>
            </div>

        </form>
    </div>

@endsection