<!DOCTYPE html>
<head>
    <title>Controle de Vacinação COVID-19 - Unidades</title>
</head>

@extends('layouts.defaultLogged')
@section('content')

    <div class="container" style="margin-top: 2rem">

        @if(Session::has('message'))
            <p class="alert {{ Session::get('alert-class', 'alert-info') }}" style="margin-top: 2rem">
                {{ Session::get('message') }}</p>
        @endif

        <h3 style="margin-top: 2rem">Unidades encontradas: </h3>

        <div class="container" style="margin-top: 2rem">
            <table class="table table-hover" style="text-align: center">
                <thead class="thread-light">
                    <tr>
                        <th>Nome</th>
                        <th>Bairro</th>
                        <th>Cidade</th>
                        <th>Estado</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($unidades as $u)
                        <tr>
                            <td class="align-middle">{{ $u->nome }}</td>
                            <td class="align-middle">{{ $u->bairro }}</td>
                            <td class="align-middle">{{ $u->cidade }}</td>
                            <td class="align-middle">{{ $u->estado }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            @if(count($unidades) == 0)
                <div class="d-flex justify-content-center">
                    <p style="margin: 2rem; font-weight: bold">Não encontramos unidades cadastradas em sua cidade!</p>
                </div>
            @endif
            <a class="btn btn-secondary" style="width: 8rem; margin-top: 2rem; margin-bottom: 2rem" type="button" href="{{ route('home') }}">Voltar</a>
        </div>
    </div>
@endsection