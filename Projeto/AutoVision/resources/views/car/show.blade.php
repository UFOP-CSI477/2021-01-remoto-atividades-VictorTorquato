<!DOCTYPE html>
<head>
    <title>AutoVision - {{$car->name}}</title>
</head>

@extends('layouts.defaultLogged')
@section('content')

    <div class="container">

        @if(Session::has('message'))
            <p class="alert {{ Session::get('alert-class', 'alert-info') }}" style="margin-top: 2rem">
                {{ Session::get('message') }}</p>
        @endif

        <h3 style="margin-top: 2rem">Dados do carro: </h3>

        <form>

            <div class="form-group column">
                <label for="marcaText" style="font-weight: bold">Marca:</label>
                <text id="marcaText">{{ $car->marca }}</text>
            </div>
            
            <div class="form-group column">
                <label for="modeloText" style="font-weight: bold">Modelo:</label>
                <text id="modeloText">{{ $car->modelo }}</text>
            </div>

            <div class="form-group column">
                <label for="kmText" style="font-weight: bold">Quilometragem:</label>
                <text id="kmText">{{ $car->km }}</text>
            </div>

            <div class="form-group column">
                <label for="revisaoText" style="font-weight: bold">Última revisão:</label>
                <text id="revisaoText">{{ $car->revisao }}</text>
            </div>

            <div class="form-group column">
                <label for="revisaoText" style="font-weight: bold">Última atualização da quilometragem:</label>
                <text id="revisaoText">{{ $car->km_update->format("Y-m-d") }}</text>
                <a href="{{ route('car.edit', ['car' => $car, 'action' => 'edit_km']) }}">Atualizar dado</a>
            </div>

            <h2 style="margin: 2rem">Componentes</h2>

            <div class="container">
                <table class="table table-secondary table-striped table-bordered" style="text-align: center">
                    <thead class="thread-light">
                        <tr>
                            <th> </th>
                            <th>Componente</th>
                            <th>Última revisão</th>
                            <th id="rev">Próxima revisão</th>
                            <th>Detalhes</th>
                            <th>Feito</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($car->components as $c)
                            <tr>
                                <td class="align-middle"><img src="{{ asset('')}}" width="64px" height="64px"/></td>
                                <td class="align-middle">{{ $c->label }}</td>
                                <td class="align-middle">{{ $c->data_rev }}</td>
                                <td class="align-middle">{{ $c->data_prox_rev }}</td>
                                <td class="align-middle"><a href="{{ route('component.show', $c) }}">Detalhes</a></td>
                                <td class="align-middle"><a href="{{ route('component.update', $c) }}">Revisão concluída</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="form-group" style="margin-top: 2rem">
                <a class="btn btn-secondary" style="width: 8rem" type="button" href="{{ route('car.index') }}">Voltar</a>
            </div>

        </form>
    </div>

@endsection