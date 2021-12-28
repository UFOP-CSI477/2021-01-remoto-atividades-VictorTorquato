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
                <label for="revisaoText" style="font-weight: bold">Última revisão:</label>
                <text id="revisaoText">{{ Carbon\Carbon::parse($car->revisao)->format("d/m/Y") }}</text>
            </div>
            
            <div class="form-group column">
                <label for="kmText" style="font-weight: bold">Quilometragem:</label>
                <text id="kmText">{{ $car->km }} Kms</text>
            </div>

            <div class="form-group column">
                <label for="revisaoText" style="font-weight: bold">Última atualização da quilometragem:</label>
                <text id="revisaoText">{{ $car->km_update->format("d/m/Y") }}</text>
                <a href="{{ route('car.edit', $car) }}">Atualizar dado</a>
            </div>
            
        </form>

            <h2 style="margin: 2rem">Componentes</h2>

            <div class="container">
                <table class="table" style="text-align: center">
                    <thead class="thread-light">
                        <tr>
                            <th> </th>
                            <th>Ícone</th>
                            <th>Componente</th>
                            <th>Última revisão</th>
                            <th>Próxima revisão</th>
                            <th>Detalhes</th>
                            <th>Feito</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($components as $component)
                            <tr>
                                @switch($component->priority)
                                    @case(0)
                                        <td style="width: 1rem; background: rgb(120, 0, 0);"></td>
                                    @break
                                    @case(1)
                                        <td style="width: 1rem; background: rgb(255, 0, 0);"></td>
                                    @break
                                    @case(2)
                                        <td style="width: 1rem; background: rgb(255, 255, 0);"></td>
                                    @break
                                    @case(3)
                                        <td style="width: 1rem; background: rgb(0, 255, 0);"></td>
                                    @break
                                    @case(4)
                                        <td></td>
                                    @break
                                @endswitch
                                <td class="align-middle">@include('component.icon', ['size' => "64px"])</td>
                                <td class="align-middle">{{ $component->label }}</td>
                                @if($component->data_prox_rev != null)
                                    <td class="align-middle">{{ Carbon\Carbon::parse($component->data_rev)->format("d/m/Y") }}</td>

                                    @if(Carbon\Carbon::parse($component->data_prox_rev)->diffInDays(Carbon\Carbon::now(), false) > 0)
                                        <td class="align-middle" style="color: red">Atrasada em {{Carbon\Carbon::parse($component->data_prox_rev)->diffInDays(Carbon\Carbon::now())}} dias</td> 
                                    @else
                                        <td class="align-middle">{{ Carbon\Carbon::parse($component->data_prox_rev)->format("d/m/Y") }}</td> 
                                    @endif                                  
                                @else
                                    <td class="align-middle">{{ $component->km_rev }} Kms</td>

                                    @if($component->car->km > $component->km_prox_rev)
                                        <td class="align-middle" style="color: red">Atrasada em {{ $component->car->km - $component->km_prox_rev }} Kms</td>
                                    @else
                                        <td class="align-middle">{{ $component->km_prox_rev }} Kms</td>
                                    @endif                                  
                                @endif
                                <td class="align-middle"><a href="{{ route('component.show', $component) }}">Detalhes</a></td>
                                <td class="align-middle"><form method="post" action="{{ route('component.update', $component) }}">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="btn btn-link">Revisão concluída</button>
                                </form></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div style="margin-top: 2rem">
                <a class="btn btn-secondary" style="width: 8rem; margin: 2rem" type="button" href="{{ route('car.index') }}">Voltar</a>
            </div>
    </div>

@endsection