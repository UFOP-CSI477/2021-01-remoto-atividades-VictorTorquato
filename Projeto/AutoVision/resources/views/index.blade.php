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
            
            <h2 style="margin: 2rem">Porque é tão importante manter as revisões em dia?</h2>
            <div class="container">
                <p>REDUZIR OS CUSTOS DE MANUTENÇÃO DA SUA FROTA E EVITAR QUE SEUS VEÍCULOS FIQUEM PARADOS</p>
                <p>MANUTENÇÃO PREVENTIVA
                O tipo mais recomendado. Se refere a 
                toda a troca de peças ou componentes 
                feita para evitar algum problema futuro. 
                Inclui as revisões de rotina e a reposição de 
                componentes que chegaram ao fim da vida 
                útil, mesmo que não tenham “quebrado”.
                Exemplo
                A troca de óleo custa em média R$50 a 
                R$150. Se isso não for feito, o atrito do motor 
                pode levar ao desgaste e até à quebra de 
                componentes que chegam a custar mais de 
                R$1000.</p>
            </div>
        </div>
    </div>
@endsection