<!DOCTYPE html>
<head>
    <title>AutoVision - Meus Carros</title>
</head>

@extends('layouts.default')
@section('content')

    <div class="container">

        @if(Session::has('message'))
            <p class="alert {{ Session::get('alert-class', 'alert-info') }}" style="margin-top: 2rem">
                {{ Session::get('message') }}</p>
        @endif

        <h3 style="margin-top: 2rem">Carros Cadastrados: </h3>

        <div class="container">
            <table class="table table-secondary table-striped table-bordered">
                <thead class="thread-light">
                    <tr>
                        <th>Marca</th>
                        <th>Modelo</th>
                        <th>Data da última revisão</th>
                        <th>Quilometragem</th>
                        <th>Detalhes</th>
                        <th>Editar</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($cars as $car)
                        <tr>
                            <td>{{ $car->marca }}</td>
                            <td>{{ $car->modelo }}</td>
                            <td>{{ $car->revisao }}</td>

                            @if($car->km_update('m') != Carbon::now()->month() )
                                <td>{{ $car->km }}</td>
                            @else
                                <td>{{ $car->km }}</td>
                            @endif

                            <td><a href="{{ route('component.show', $c) }}">Detalhes</a></td>
                            <td><a href="{{ route('component.edit', $c) }}">Editar</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection