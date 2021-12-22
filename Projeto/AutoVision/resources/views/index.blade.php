<!DOCTYPE html>
<head>
    <title>AutoVision - Home</title>
</head>

@extends('layouts.default')

@section('content')
    <div class="imgContainer">
        <img src="{{URL::asset('images/traffic-night.png')}}" width="100%">
        <span class="imgtext">
            <div class="d-flex align-items-center justify-content-center h-100">
                <div class="d-flex flex-column">
                    <h1>Cuide de seu veículo</h1>
                    <p>...assim ele nunca te deixará na mão</p>
                </div>
            </div>
        </span>
    </div>
    <div class="container">
        <div style="margin-top: 2rem">

        @if(Session::has('message'))
            <p class="alert {{ Session::get('alert-class', 'alert-info') }}" style="margin-top: 2rem">
                {{ Session::get('message') }}</p>
        @endif
        <h2 style="margin: 2rem">Componentes a revisar</h2>
            <div class="container">
                <table class="table table-secondary table-striped table-bordered">
                    <thead class="thread-light">
                        <tr>
                            <th>Carro</th>
                            <th>Componente</th>
                            <th>Data da última revisão</th>
                            <th>Próxima revisão</th>
                            <th>Detalhes</th>
                            <th>Feito</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($cars as $car)
                            @foreach($car->components as $c)
                                <tr>
                                    <td>{{ $car->marca }} {{ $car->modelo }}</td>
                                    <td>{{ $c->nome }}</td>
                                    <td>{{ $c->updated_at }}</td>
                                    <td>{{ $c->prox_rev }}</td>
                                    <td><a href="{{ route('component.show', $c) }}">Detalhes</a></td>
                                    <td><a href="{{ route('component.update', $c) }}">Revisão concluída</a></td>
                                </tr>
                            @endforeach
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection