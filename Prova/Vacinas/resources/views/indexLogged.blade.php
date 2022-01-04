<!DOCTYPE html>
<head>
    <title>Controle de Vacinação COVID-19 - Home</title>
</head>

@extends('layouts.defaultLogged')
@section('content')

    <div id="covidCarousel" class="carousel slide" data-ride="carousel">

        <ol class="carousel-indicators">
            <li data-target="#covidCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#covidCarousel" data-slide-to="1"></li>
            <li data-target="#covidCarousel" data-slide-to="2"></li>
        </ol>

        <div class="carousel-inner">

            <div class="item active imgContainer">
                <img src="{{ URL::asset('images/corona.jpg') }}" alt="Corona Virus" style="width:100%;">
                
                <div class="carousel-caption">
                    <h3 class="carouselTitle imgtext">Vírus altamente contagioso</h3>
                    <p class="carouselText imgtext">O Corona Vírus é um dos vírus mais contagiosos já descobertos pela humanidade!</p>
                </div>

            </div>

            <div class="item imgContainer">
                <img src="{{ URL::asset('images/vacina.jpg') }}" alt="Vacinas" style="width:100%;">
                
                <div class="carousel-caption">
                    <h3 class="carouselTitle imgtext">Vacinas controlam a doença</h3>
                    <p class="carouselText imgtext">Se você ainda não se vacinou, procure a unidade de saúde mais próxima e vacine-se!</p>
                </div>

            </div>
            
            <div class="item imgContainer">
                <img src="{{ URL::asset('images/mascara.jpg') }}" alt="Máscaras" style="width:100%;">
                
                <div class="carousel-caption">
                    <h3 class="carouselTitle imgtext">Use máscara</h3>
                    <p class="carouselText imgtext">O vírus se espalha pelo ar e por isso usar máscara é essencial para evitar o contágio!</p>
                </div>

            </div>
        </div>

        <a class="left carousel-control" href="#covidCarousel" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left"></span>
        </a>

        <a class="right carousel-control" href="#covidCarousel" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right"></span>
        </a>
    </div>

    <div class="container" style="margin-top: 2rem; margin-bottom: 4rem">

        <h3>Qual a importância de se vacinar? </h3>
        <hr>
        <p style="margin: 2rem"><text style="font-weight: bold">1.</text> A vacina é importante principalmente para que seu corpo consiga produzir imunidade contra a doença.</p>
        <p style="margin: 2rem"><text style="font-weight: bold">2.</text> Quanto mais pessoas imunizadas, a doença não consegue se espalhar, controlando assim a pandemia.</p>
        <p style="margin: 2rem"><text style="font-weight: bold">3.</text> Não acredite em tudo que você lê. Diversas fake news contra as vacinas foram espalhadas, fique atento!</p>

        <div>
            <h4>Onde há unidades de saúde em minha cidade?</h4>
            <hr>
            <form style="margin: 2rem" method="post" action="{{ route('buscaUnidades') }}">
            @csrf
                <div class="form-group column">
                    <label style="font-weight: bold" for="cidadeInput">Insira sua cidade:</label>
                    <input style="margin-top: 1rem;" class="form-control" type="text" required="true" id="cidadeInput" name="cidade"/>
                    <button style="margin-top: 1rem; width: 8rem" class="btn btn-success" type="submit">Buscar</button>
                </div>
            </form>
        </div>

        <div class="d-flex justify-content-center" style="margin-top: 2rem">
            <h5>Procure a unidade de saúde mais próxima e seja imunizado!</h5>
        </div>
    </div>

@endsection