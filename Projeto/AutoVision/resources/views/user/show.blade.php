<!DOCTYPE html>
<head>
    <title>AutoVision - Minha Conta</title>
</head>

@extends('layouts.defaultLogged')
@section('content')

    <div class="container">

        @if(Session::has('message'))
            <p class="alert {{ Session::get('alert-class', 'alert-info') }}" style="margin-top: 2rem">
                {{ Session::get('message') }}</p>
        @endif

        <h3 style="margin-top: 2rem">Meus dados: </h3>

        <form method="post" style="margin-top: 1rem" action="{{ route('user.destroy') }}">
            @csrf
            @method('DELETE')
            <div class="form-group column">
                <label for="nomeText" style="font-weight: bold">Nome:</label>
                <text id="nomeText">{{ Auth::user()->name }}</text>
            </div>
            
            <div class="form-group column">
                <label for="emailText" style="font-weight: bold">E-Mail:</label>
                <text id="emailText">{{ Auth::user()->email }}</text>
            </div>

            <div class="form-group column">
                <label for="createdText" style="font-weight: bold">Usuário desde:</label>
                <text id="createdText">{{ Auth::user()->created_at->format('d/m/Y') }}</text>
            </div>

            <div class="form-group column">
                <a class="link" href="{{ route('user.resetPass') }}">Editar Senha</a>
            </div>

            <div class="form-group" style="margin-top: 2rem">
                <a class="btn btn-info" style="width: 8rem" type="button" href="{{ route('user.edit') }}">Editar</a>
                <button class="btn btn-danger" style="width: 8rem" type="submit">Excluir</button>
            </div>

        </form>
    </div>
@endsection