<!DOCTYPE html>
<head>
    <title>Controle de Vacinação COVID-19 - Editar Vacina</title>
</head>

@extends('layouts.defaultLogged')
@section('content')

    <div class="container" style="margin-top: 2rem">

        @if(Session::has('message'))
            <p class="alert {{ Session::get('alert-class', 'alert-info') }}" style="margin-top: 2rem">
                {{ Session::get('message') }}</p>
        @endif

        <h3 style="margin-top: 2rem">Editar vacina: </h3>

        <form method="post" action="{{ route('vacinas.update', $vacina) }}">
        @csrf
        @method('PUT')

            <div class="form-group column">
                <label for="nomeInput">Nome</label>
                <input class="form-control" required="true" value="{{ $vacina->nome }}" name="nome" id="nomeInput"/>
            </div>

            <div class="form-group column">
                <label for="fabricanteInput">Fabricante</label>
                <input class="form-control" required="true" value="{{ $vacina->fabricante }}" name="fabricante" id="fabricanteInput"/>
            </div>

            <div class="form-group column">
                <label for="paisInput">Pais</label>
                <input class="form-control" required="true" value="{{ $vacina->pais }}" name="pais" id="paisInput"/>
            </div>

            <div class="form-group column">
                <label for="dosesInput">Doses</label>
                <input class="form-control" required="true" type="number" value="{{ $vacina->doses }}" name="doses" id="dosesInput"/>
            </div>

            <div class="form-group" style="margin-top: 2rem; margin-bottom: 2rem;">
                <button class="btn btn-success" style="width: 8rem" type="submit">Editar</button>
                <a class="btn btn-secondary" style="width: 8rem" type="button" href="{{ route('vacinas.index') }}">Voltar</a>
                <button class="btn btn-secondary" style="width: 8rem" type="reset">Limpar</button>
            </div>

        </form>
    </div>

@endsection