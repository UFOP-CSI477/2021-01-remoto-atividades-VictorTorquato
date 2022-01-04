<!DOCTYPE html>
<head>
    <title>Controle de Vacinação COVID-19 - Admin</title>
</head>

@extends('layouts.defaultLogged')
@section('content')

<div class="container">
    <h3 style="margin-top: 2rem">Área Administrativa: </h3>
    
    <form>

        <div class="form-group column">
            <a class="btn btn-primary adminBtn" type="button" href="{{ route('pessoas.index') }}">Administração de Pessoas</a>
            <a class="btn btn-primary adminBtn" type="button" href="{{ route('unidades.index') }}">Administração de Unidades</a>
            <a class="btn btn-primary adminBtn" type="button" href="{{ route('vacinas.index') }}">Administração de Vacinas</a>
            <a class="btn btn-primary adminBtn" type="button" href="{{ route('registros.index') }}">Administração de Registros</a>
        </div>
    
    </form>
</div>

@endsection