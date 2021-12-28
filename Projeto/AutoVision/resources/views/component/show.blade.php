<!DOCTYPE html>
<head>
    <title>AutoVision - Componente</title>
</head>

@extends('layouts.defaultLogged')
@section('content')

    <div class="container">

        @if(Session::has('message'))
            <p class="alert {{ Session::get('alert-class', 'alert-info') }}" style="margin-top: 2rem">
                {{ Session::get('message') }}</p>
        @endif

        <h3 style="margin-top: 2rem">Detalhes do Componente: </h3>
        <hr>
        
        <form>

            <div class="form-group column">
                <label for="carroText" style="font-weight: bold">Carro:</label>
                <text id="carroText">{{ $component->car->marca }} {{ $component->car->modelo }}</text>
            </div>
            
            <div class="form-group column">
                <label for="nomeText" style="font-weight: bold">Nome:</label>
                <text id="nomeText">{{ $component->label }}</text>
            </div>

            <div class="form-group column">
                <label for="dataRevText" style="font-weight: bold">Última revisão:</label>
                <text id="dataRevText">{{ Carbon\Carbon::parse($component->data_rev)->format("d/m/Y") }}</text>
            </div>

            @if ($component->data_prox_rev != null)

                <div class="form-group column">
                    <label for="proxRevText" style="font-weight: bold">Próxima revisão:</label>
                    <text id="proxRevText">{{ Carbon\Carbon::parse($component->data_prox_rev)->format("d/m/Y") }}</text>
                </div>

            @else

                <div class="form-group column">
                    <hr>
                    <h5>Quilometragem </h5>
                    <label for="kmRevText" style="font-weight: bold">Última revisão:</label>
                    <text id="kmRevText">{{ $component->km_rev }} Kms</text>
                </div>

                <div class="form-group column">
                    <label for="kmProxRevText" style="font-weight: bold">Próxima revisão:</label>
                    <text id="kmProxRevText">{{ $component->km_prox_rev }} Kms</text>
                </div>

            @endif
        </form>

        @switch($component->nome)

            @case('luzes')
                @include('component.info.luzes')
            @break

            @case('ca_pneus')
                @include('component.info.ca_pneus')
            @break

            @case('limpadores')
                @include('component.info.limpadores')
            @break

            @case('agua_radiador')
                @include('component.info.agua_radiador')
            @break
            
            @case('correias')
                @include('component.info.correias')
            @break
            
            @case('alinhamento')
                @include('component.info.alinhamento')
            @break
            
            @case('oleo_motor')
                @include('component.info.oleo_motor')
            @break

            @case('freio')
                @include('component.info.freio')
            @break

            @case('filtro_ar')
                @include('component.info.filtro_ar')
            @break

            @case('filtro_combustivel')
                @include('component.info.filtro_combustivel')
            @break

            @case('filtro_oleo')
                @include('component.info.filtro_oleo')
            @break

            @case('velas')
                @include('component.info.velas')
            @break

            @default

        @endswitch

    </div>

@endsection