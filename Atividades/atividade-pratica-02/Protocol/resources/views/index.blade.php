<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Home - Protocol System</title>

</head>
<body>
@extends('layouts.default')
@section('content')

    <div class="container">
        <div class="row" style="margin-top: 2rem">

        @if(Session::has('message'))
            <p class="alert {{ Session::get('alert-class', 'alert-info') }}" style="margin-top: 2rem">
                {{ Session::get('message') }}</p>
        @endif

            <div class="col-sm">
                <h2 style="margin: 2rem">Protocolos</h2>
                <div class="container">
                    <table class="table" select>
                        <thead class="thread-light">
                            <tr>
                                <th>Usuário</th>
                                <th>Tipo</th>
                                <th>Descrição</th>
                                <th>Data</th>
                                <th>Exibir</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($requests as $r)
                                <tr>
                                    <td>{{ $r->person }}</td>
                                    <td>{{ $r->Subject->name }}</td>
                                    <td>{{ $r->description }}</td>
                                    <td>{{ $r->date }}</td>
                                    <td><a href="{{ route('request.show', $r) }}">Exibir</a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-sm" style="border-left: 1px solid">
                <h2 style="margin: 2rem">Área Administrativa</h2>
                <div class="container">
                <div class="alert alert-warning" role="alert">
                    <h4 class="alert-heading">Alerta!</h4>
                    <p>
                        Entre no sistema para poder interagir na área administrativa.</p>
                    <hr>
                    <p class="mb-0">Caso não estiver cadastrado, cadastre-se.</p>
                </div>
                </div>
            </div>
        </div>
    </div>

@endsection('content')
</body>
</html>
