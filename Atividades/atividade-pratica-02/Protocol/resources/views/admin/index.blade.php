<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Home - Protocol System</title>

</head>
<body>
@extends('layouts.defaultAdmin')
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
                    <div class="d-flex justify-content-center" style="margin: 2rem">
                        <a type="button" style="width: 16rem" class="btn btn-success" href="{{ route('request.create') }}">Criar Protocolo</a>
                    </div>
                </div>
            </div>
            <div class="col-sm" style="border-left: 1px solid">
                <h2 style="margin: 2rem">Área Administrativa</h2>
                <div class="container">
                    <div style="margin-top: 2rem; margin-botton: 2rem">
                        <h5 style="margin: 1rem">Tipos de Protocolos</h5>
                        <table class="table table-secondary table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Nome</th>
                                    <th>Preço</th>
                                    <th>Exibir</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($subjects as $s)
                                    <tr>
                                        <td>{{ $s->id }}</td>
                                        <td>{{ $s->name }}</td>
                                        <td>R$ {{ $s->price }}</td>
                                        <td><a href="{{ route('subject.show', $s) }}">Exibir</a></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="d-flex justify-content-center" style="margin: 2rem">
                            <a type="button" style="width: 16rem" class="btn btn-success" href="{{ route('subject.create') }}">Criar Tipo de Protocolo</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <h2 style="margin: 2rem">Usuários</h2>
        <div class="container">
            <table class="table" select>
                <thead class="thread-light">
                    <tr>
                        <th>Id</th>
                        <th>Nome</th>
                        <th>Email</th>
                        <th>Data Criação</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $u)
                        <tr>
                            <td>{{ $u->id }}</td>
                            <td>{{ $u->name }}</td>
                            <td>{{ $u->email }}</td>
                            <td>{{ $u->created_at }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <form method="post" action="{{ route('user.destroy', Auth::user()) }}" class="d-flex justify-content-center" style="margin: 2rem">
            @csrf
            @method('DELETE')
                <button type="submit" style="width: 16rem" class="btn btn-danger">Apagar Conta</button>
            </form>
        </div>
    </div>

@endsection('content')
</body>
</html>
