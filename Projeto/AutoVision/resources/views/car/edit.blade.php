<!DOCTYPE html>
<head>
    <title>AutoVision - Editar Carro</title>
</head>

@extends('layouts.defaultLogged')
@section('content')

    <div class="container">

        @if(Session::has('message'))
            <p class="alert {{ Session::get('alert-class', 'alert-info') }}" style="margin-top: 2rem">
                {{ Session::get('message') }}</p>
        @endif

        <h3 style="margin-top: 2rem">Editar carro: </h3>

        <form method="post" action="{{ route('car.update', $car) }}">
        @csrf
        @method('PUT')
            <div class="form-group column">
                <label for="marcaInput">Marca</label>
                <input class="form-control" required="true" value="{{ $car->marca }}" name="marca" id="marcaInput"/>
            </div>
            
            <div class="form-group column">
                <label for="modeloInput">Modelo</label>
                <input class="form-control" required="true" value="{{ $car->modelo }}" name="modelo" id="modeloInput"/>
            </div>

            <div class="form-group column">
                <label for="kmInput">Quilometragem</label>
                <input class="form-control" required="true" value="{{ $car->km }}" type="number" name="km" id="kmInput"/>
            </div>

            <div class="form-group" style="margin-top: 1rem">
                <button class="btn btn-success" style="width: 8rem" type="submit">Editar</button>
                <a class="btn btn-secondary" style="width: 8rem" type="button" href="{{ route('car.show', $car) }}">Voltar</a>
                <button class="btn btn-secondary" style="width: 8rem" type="reset">Limpar</button>
            </div>

        </form>
    </div>

@endsection