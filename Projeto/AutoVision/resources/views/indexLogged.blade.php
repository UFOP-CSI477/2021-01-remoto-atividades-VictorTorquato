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

            @for ($i = 0; $i < $components->count(); $i++)

                @if($i == 0)

                    @if($components[$i]->car->km_update->diffInMonths(Carbon\Carbon::now()) >= 2)
                    
                    <p class="alert alert-warning">
                        Alerta! O carro {{$components[$i]->carName}} está com a quilometragem a {{$components[$i]->car->km_update->diffInDays(Carbon\Carbon::now())}} dias sem atualizar!
                        Para o funcionamento correto do sistema, atualize-a clicando
                        <a href="{{ route('car.edit', ['car' => $components[$i]->car]) }}">aqui</a>
                    </p>

                    @endif

                @elseif($components[$i]->car->id != $components[$i-1]->car->id)

                    @if($components[$i]->car->km_update->diffInMonths(Carbon\Carbon::now()) >= 1)
                    
                    <p class="alert alert-warning">
                        Alerta! O carro {{$components[$i]->carName}} está com a quilometragem a {{$components[$i]->car->km_update->diffInDays(Carbon\Carbon::now())}} dias sem atualizar!
                        Para o funcionamento correto do sistema, atualize-a clicando
                        <a href="{{ route('car.edit', ['car' => $components[$i]->car]) }}">aqui</a>
                    </p>

                    @endif
                @endif
            @endfor
            
            <h2 style="margin: 2rem">Componentes a revisar</h2>
            <div class="container">
                <table class="table table-hover" style="text-align: center">
                    <thead class="thread-light">
                        <tr>
                            <th></th>
                            <th>Carro</th>
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
                                <td class="align-middle">{{ $component->carName }}</td>
                                <td class="align-middle" style="text-align: left; padding-left: 4rem">@include('component.icon', ['size' => "48px"]) {{ $component->label }}</td>
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
                @if(count($components) == 0)
                    <div class="d-flex justify-content-center">
                        <p style="margin: 2rem; font-weight: bold">Não há carros cadastrados, vá em "Meus carros" e adicione um!</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection