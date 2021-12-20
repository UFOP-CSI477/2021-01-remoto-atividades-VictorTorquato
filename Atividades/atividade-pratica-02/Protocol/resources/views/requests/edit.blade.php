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

        <h3 style="margin-top: 2rem">Editar protocolo: </h3>

        <form method="post" action="{{ route('request.update', $request) }}">
        @csrf
        @method('PUT')
            <div class="form-group column">
                <label for="typeInput">Tipo do protocolo</label>
                <select class="form-control" required="true" name="subject" id="typeInput">
                    @foreach($subjects as $s)
                        <option value="{{ $s->id }}">{{ $s->name }}</option>

                        @if ($request->subject_id == $s->id)
                            selected
                        @endif
                        
                    @endforeach
                </select>
            </div>
            
            <div class="form-group column">
                <label for="descriptionInput">Descrição do protocolo</label>
                <textarea class="form-control" required="true" name="description" id="descriptionInput">{{$request->description}}</textarea>
            </div>

            <div class="form-group" style="margin-top: 1rem">
                <button class="btn btn-success" style="width: 8rem" type="submit">Editar</button>
                <a class="btn btn-secondary" style="width: 8rem" type="button" href="{{ route('request.show', $request) }}">Voltar</a>
                <button class="btn btn-secondary" style="width: 8rem" type="reset">Limpar</button>
            </div>

        </form>
    </div>

@endsection('content')
</body>
</html>
