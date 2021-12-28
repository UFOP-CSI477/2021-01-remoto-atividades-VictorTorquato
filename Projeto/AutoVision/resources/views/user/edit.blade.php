<!DOCTYPE html>
<head>
    <title>AutoVision - Editar Conta</title>
</head>

@extends('layouts.defaultLogged')
@section('content')

    <div class="container">

        @if(Session::has('message'))
            <p class="alert {{ Session::get('alert-class', 'alert-info') }}" style="margin-top: 2rem">
                {{ Session::get('message') }}</p>
        @endif

        <h3 style="margin-top: 2rem">Editar dados: </h3>

        <form method="post" style="margin-top: 1rem" action="{{ route('user.update') }}">
            @csrf
            
            <div class="form-group column">
                <label for="nomeInput" style="font-weight: bold">Nome:</label>
                <input class="form-control" id="nomeInput" required="true" value="{{ Auth::user()->name }}" name="nome" type="text"/>
            </div>
            
            <div class="form-group column">
                <label for="emailInput" style="font-weight: bold">E-Mail:</label>
                <input class="form-control" id="emailInput" required="true" value="{{ Auth::user()->email }}" name="email" type="email"/>
            </div>

            <div class="form-group column">
                <a class="link" href="{{ route('user.resetPass') }}">Editar Senha</a>
            </div>

            <div class="form-group" style="margin-top: 2rem">
                <button class="btn btn-info" style="width: 8rem" type="submit">Editar</button>
                <a class="btn btn-secondary" style="width: 8rem" type="button" href="{{ route('user.show') }}">Voltar</a>
            </div>

        </form>
    </div>
@endsection