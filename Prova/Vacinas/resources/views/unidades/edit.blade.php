<!DOCTYPE html>
<head>
    <title>Controle de Vacinação COVID-19 - Editar Unidade</title>
</head>

@extends('layouts.defaultLogged')
@section('content')

    <div class="container" style="margin-top: 2rem">

        @if(Session::has('message'))
            <p class="alert {{ Session::get('alert-class', 'alert-info') }}" style="margin-top: 2rem">
                {{ Session::get('message') }}</p>
        @endif

        <h3 style="margin-top: 2rem">Editar unidade: </h3>

        <form method="post" action="{{ route('unidades.update', $unidade) }}">
        @csrf
        @method('PUT')

            <div class="form-group column">
                <label for="nomeInput">Nome</label>
                <input class="form-control" required="true" value="{{ $unidade->nome }}" name="nome" id="nomeInput"/>
            </div>

            <div class="form-group column">
                <label for="bairroInput">Bairro</label>
                <input class="form-control" required="true" value="{{ $unidade->bairro }}" name="bairro" id="bairroInput"/>
            </div>

            <div class="form-group column">
                <label for="cidadeInput">Cidade</label>
                <input class="form-control" required="true" value="{{ $unidade->cidade }}" name="cidade" id="cidadeInput"/>
            </div>

            <div class="form-group column">
                <label for="estadoInput">Estado</label>
                <input class="form-control" required="true" value="{{ $unidade->estado }}" name="estado" id="estadoInput"/>
            </div>

            <div class="form-group" style="margin-top: 2rem; margin-bottom: 2rem;">
                <button class="btn btn-success" style="width: 8rem" type="submit">Editar</button>
                <a class="btn btn-secondary" style="width: 8rem" type="button" href="{{ route('unidades.index') }}">Voltar</a>
                <button class="btn btn-secondary" style="width: 8rem" type="reset">Limpar</button>
            </div>

        </form>
    </div>

@endsection