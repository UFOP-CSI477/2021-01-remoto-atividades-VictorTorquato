<!DOCTYPE html>
<head>
    <title>AutoVision - Home</title>
</head>

@extends('layouts.defaultLogged')
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
                <table class="table table-secondary table-striped table-bordered" style="text-align: center">
                    <thead class="thread-light">
                        <tr>
                            <th>Carro</th>
                            <th>Componente</th>
                            <th>Última revisão</th>
                            <th>Próxima revisão</th>
                            <th>Detalhes</th>
                            <th>Feito</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($cars as $car)
                            @foreach($car->components as $c)
                                <tr>
                                    <td class="align-middle">{{ $car->marca }} {{ $car->modelo }}</td>
                                    <td class="align-middle" style="text-align: left; padding-left: 4rem"><img src="{{ asset('')}}" width="48px" height="48px"/> {{ $c->label }}</td>
                                    <td class="align-middle">{{ $c->data_rev }}</td>
                                    <td class="align-middle">{{ $c->data_prox_rev }}</td>
                                    <td class="align-middle"><a href="{{ route('component.show', $c) }}">Detalhes</a></td>
                                    <td class="align-middle"><a href="{{ route('component.update', $c) }}">Revisão concluída</a></td>
                                </tr>
                            @endforeach
                        @endforeach
                    </tbody>
                </table>
                @if(count($cars) == 0)
                    <div class="d-flex justify-content-center">
                        <p style="margin: 2rem; font-weight: bold">Não há carros cadastrados, vá em "Meus carros" e adicione um!</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection