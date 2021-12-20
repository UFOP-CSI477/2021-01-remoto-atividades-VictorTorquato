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

        <h3 style="margin-top: 2rem">Insira os dados do protocolo: </h3>

        <form method="post" action="{{ route('request.store') }}">
        @csrf
            <div class="form-group column">
                <label for="typeInput">Tipo do protocolo</label>
                <select class="form-control" required="true" name="subject" id="typeInput">
                    @foreach($subjects as $s)
                        <option value="{{ $s->id }}">{{ $s->name }}</option>
                    @endforeach
                </select>
            </div>
            
            <div class="form-group column">
                <label for="descriptionInput">Descrição do protocolo</label>
                <textarea class="form-control" name="description" id="descriptionInput"></textarea>
            </div>

            <div class="form-group" style="margin-top: 1rem">
                <button class="btn btn-success" style="width: 8rem" type="submit">Criar</button>
                <a class="btn btn-secondary" style="width: 8rem" type="button" href="{{ route('home') }}">Voltar</a>
                <button class="btn btn-secondary" style="width: 8rem" type="reset">Limpar</button>
            </div>

        </form>
    </div>

@endsection('content')
</body>
</html>
