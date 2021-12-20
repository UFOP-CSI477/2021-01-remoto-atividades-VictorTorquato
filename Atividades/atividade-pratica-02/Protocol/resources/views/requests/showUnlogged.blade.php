<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Protocol Type - Protocol System</title>

</head>
<body>
@extends('layouts.default')
@section('content')

    <div class="container">

        @if(Session::has('message'))
            <p class="alert {{ Session::get('alert-class', 'alert-info') }}" style="margin-top: 2rem">
                {{ Session::get('message') }}</p>
        @endif

        <h3 style="margin-top: 2rem">Protocolo: </h3>

        <form>
            <div class="form-group column">
                <label style="font-weight: bold" for="descriptionText">Descrição: </label>
                <text id="descriptionText">{{$request->description}}</text>
            </div>

            <div class="form-group column">
                <label style="font-weight: bold" for="dateText">Data: </label>
                <text id="dateText">{{$request->date}}</text>
            </div>

            <div class="form-group column">
                <label style="font-weight: bold" for="userText">Usuário que criou: </label>
                <text id="userText">{{$request->user->name}}</text>
            </div>

            <div class="form-group column">
                <label style="font-weight: bold" for="typeText">Tipo: </label>
                <text id="typeText">{{$request->subject->name}}</text>
            </div>
            
            <div class="form-group column">
                <label style="font-weight: bold" for="priceText">Preço: </label>
                <text id="priceText">R$ {{$request->subject->price}}</text>
            </div>

            <div class="form-group" style="margin-top: 1rem">
                <a class="btn btn-secondary" style="width: 8rem" type="button" href="{{ route('home') }}">Voltar</a>
            </div>

        </form>
    </div>

@endsection('content')
</body>
</html>