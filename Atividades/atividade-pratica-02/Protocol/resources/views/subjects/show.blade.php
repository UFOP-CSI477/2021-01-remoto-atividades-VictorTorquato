<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Protocol Type - Protocol System</title>

</head>
<body>
@extends('layouts.defaultAdmin')
@section('content')

    <div class="container">

        @if(Session::has('message'))
            <p class="alert {{ Session::get('alert-class', 'alert-info') }}" style="margin-top: 2rem">
                {{ Session::get('message') }}</p>
        @endif

        <h3 style="margin-top: 2rem">Tipo de protocolo: </h3>

        <form method="post" action="{{ route('subject.destroy', $subject) }}">
        @csrf
        @method('DELETE')
            <div class="form-group column">
                <label style="font-weight: bold" for="nameText">Nome do tipo: </label>
                <text id="nameText">{{$subject->name}}</text>
            </div>
            
            <div class="form-group column">
                <label style="font-weight: bold" for="priceText">Preço do tipo: </label>
                <text id="priceText">R$ {{$subject->price}}</text>
            </div>

            <div class="form-group" style="margin-top: 1rem">
                <a class="btn btn-info" style="width: 8rem" type="button" href="{{ route('subject.edit', $subject) }}">Editar</a>
                <a class="btn btn-secondary" style="width: 8rem" type="button" href="{{ route('home') }}">Voltar</a>
                <button class="btn btn-danger" style="width: 8rem" type="submit">Excluir</button>
            </div>

        </form>
    </div>

@endsection('content')
</body>
</html>