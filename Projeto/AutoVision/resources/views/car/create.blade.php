<!DOCTYPE html>
<head>
    <title>AutoVision - Novo Carro</title>
</head>

@extends('layouts.defaultLogged')
@section('content')

    <div class="container">

        @if(Session::has('message'))
            <p class="alert {{ Session::get('alert-class', 'alert-info') }}" style="margin-top: 2rem">
                {{ Session::get('message') }}</p>
        @endif

        <h3 style="margin-top: 2rem">Insira os dados do carro: </h3>

        <form method="post" action="{{ route('car.store') }}">
        @csrf
            <div class="form-group column">
                <label for="marcaInput">Marca</label>
                <input class="form-control" required="true" name="marca" id="marcaInput"/>
            </div>
            
            <div class="form-group column">
                <label for="descriptionInput">Modelo</label>
                <input class="form-control" required="true" name="modelo" id="descriptionInput"/>
            </div>

            <div class="form-group column">
                <label for="descriptionInput">Quilometragem</label>
                <input class="form-control" required="true" type="number" name="km" id="descriptionInput"/>
            </div>

            <div class="form-group" style="margin-top: 1rem">
                <button class="btn btn-success" style="width: 8rem" type="submit">Criar</button>
                <a class="btn btn-secondary" style="width: 8rem" type="button" href="{{ route('home') }}">Voltar</a>
                <button class="btn btn-secondary" style="width: 8rem" type="reset">Limpar</button>
            </div>

        </form>
    </div>

@endsection