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
            
            <h3 style="margin-top: 2rem">Motivos para manter as revisões em dia:</h2>
            <hr>
            <div class="container">
                <p style="margin: 2rem"><text style="font-weight: bold">1.</text> Reduzir os custos de manutenção;</p>
                <p style="margin: 2rem"><text style="font-weight: bold">2.</text> Evitar que seus veículos fiquem parados;</p>
                <p style="margin: 2rem"><text style="font-weight: bold">3.</text> Diminuir desgastes nos sistemas do veículo;</p>
                <p style="margin: 2rem"><text style="font-weight: bold">4.</text> Contribuir com o meio ambiente;</p>
                <p style="margin: 2rem"><text style="font-weight: bold">5.</text> Evitar acidentes de trânsito.</p>
            </div>

            <h3 style="margin-top: 2rem">Como manter meu carro sempre em bom estado?</h2>
            <hr>

            <div class="container">
                <p style="margin-botton: 2rem">A melhor forma de mantê-lo é realizar as manutenções preventivas, que é o tipo mais recomendado.
                São tantos componentes que devem ser verificados que as vezes passam despercebidos para o motorista comum. Ao utilizar nosso sistema 
                    para controlar as revisões você estará fazendo da maneira correta.
                <h5 style="margin: 1rem">Mas porque fazer a troca antes do componente quebrar?</h5>
                Na manutenção preventiva, a troca de peças ou componentes é feita para evitar algum problema futuro, além disso, a manutenção preventiva 
                inclui as revisões de rotina e a reposição de componentes que chegaram ao fim da vida útil, mesmo que não tenham “quebrado”.
                Todos motivos citados acima são válidos, para exemplificar vamos levar em conta a troca de óleo. Para trocar o óleo é gasto
                 em média de R$50,00 a R$150,00. Caso não realizada, o atrito do motor pode levar ao desgaste e até à quebra de outros
                 componentes importantes que chegam a custar mais de R$1000,00.</p>
            </div>

            <div class="d-flex justify-content-center" style="margin: 2rem">
                <h5>Cadastre-se para manter suas revisões sempre em dia!</h5>
            </div>
        </div>
    </div>
@endsection