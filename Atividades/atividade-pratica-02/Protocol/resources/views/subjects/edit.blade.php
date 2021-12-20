<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Protocols - Protocol System</title>

</head>
<body>
@extends('layouts.defaultAdmin')
@section('content')

    <div class="container">

        @if(Session::has('message'))
            <p class="alert {{ Session::get('alert-class', 'alert-info') }}" style="margin-top: 2rem">
                {{ Session::get('message') }}</p>
        @endif

        <h3 style="margin-top: 2rem">Editar tipo de protocolo: </h3>

        <form method="post" action="{{ route('subject.update', $subject) }}">
        @csrf
        @method('PUT')
            <div class="form-group column">
                <label for="nameInput">Nome do tipo</label>
                <input class="form-control" required="true" type="text" name="name" value="{{$subject->name}}" id="nameInput" value=""/>
            </div>
            
            <div class="form-group column">
                <label for="priceInput">Preço do tipo</label>
                <input class="form-control" required="true" type="number" name="price" value="{{$subject->price}}" id="priceInput"></textarea>
            </div>

            <div class="form-group" style="margin-top: 1rem">
                <button class="btn btn-success" style="width: 8rem" type="submit">Editar</button>
                <a class="btn btn-secondary" style="width: 8rem" type="button" href="{{ route('subject.show', $subject) }}">Voltar</a>
                <button class="btn btn-secondary" style="width: 8rem" type="reset">Limpar</button>
            </div>

        </form>
    </div>

@endsection('content')
</body>
</html>
