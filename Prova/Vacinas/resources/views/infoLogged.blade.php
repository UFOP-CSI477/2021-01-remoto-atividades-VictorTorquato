<!DOCTYPE html>
<head>
    <title>Controle de Vacinação COVID-19 - Área Geral</title>
</head>

@extends('layouts.defaultLogged')
@section('content')
@php($total = $doses->dose_unica + $doses->primeira_dose + $doses->segunda_dose)

<div class="container">
    <h3 style="margin-top: 2rem">Dados sobre a vacinação: </h3>
    <hr>
    
    <form style="margin: 2rem; margin-bottom: 4rem">
        
        @if ($total != 0)
            <h4>Total geral de vacinas aplicadas</h4>

            <div class="container" style="margin-top: 2rem">

                <table class="table">
                    <thead class="thread-light">
                        <tr>
                            <th>Aplicação</th>
                            <th>Quantidade</th>
                            <th>Porcentagem</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Dose Única</td>
                            <td>{{ $doses->dose_unica }}</td>
                            <td>{{ $doses->dose_unica/$total * 100 }}%</td>
                        </tr>
                        <tr>
                            <td>Primeira Dose</td>
                            <td>{{ $doses->primeira_dose }}</td>
                            <td>{{ $doses->primeira_dose/$total * 100 }}%</td>
                        </tr>
                        <tr>
                            <td>Segunda Dose</td>
                            <td>{{ $doses->segunda_dose }}</td>
                            <td>{{ $doses->segunda_dose/$total * 100 }}%</td>
                        </tr>
                        <tr>
                            <td style="font-weight: bold">TOTAL GERAL</td>
                            <td style="font-weight: bold">{{ $total }}</td>
                            <td style="font-weight: bold">100%</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <h4 style="margin-top: 2rem">Total de aplicações por vacinas</h4>

            <div class="container" style="margin-top: 2rem">
                <table class="table">
                    <thead class="thread-light">
                        <tr>
                            <th>Vacina</th>
                            <th>Quantidade</th>
                            <th>Porcentagem</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($vacinas as $v)
                            <tr>
                                <td>{{ $v->nome }}</td>
                                <td>{{ $v->total }}</td>
                                <td>{{ $v->total/$total * 100 }}%</td>
                            </tr>
                        @endforeach
                        <tr>
                            <td style="font-weight: bold">TOTAL GERAL</td>
                            <td style="font-weight: bold">{{ $total }}</td>
                            <td style="font-weight: bold">100%</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        @else
            <div class="d-flex justify-content-center">
                <h4>Não há registros de vacinação</h4>
            </div>
        @endif
    </form>
</div>

@endsection