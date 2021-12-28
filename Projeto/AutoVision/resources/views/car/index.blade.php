<!DOCTYPE html>
<head>
    <title>AutoVision - Meus Carros</title>
</head>

@extends('layouts.defaultLogged')
@section('content')

    <div class="container" style="margin-top: 2rem">

        @if(Session::has('message'))
            <p class="alert {{ Session::get('alert-class', 'alert-info') }}" style="margin-top: 2rem">
                {{ Session::get('message') }}</p>
        @endif

        @for ($i = 0; $i < count($cars); $i++)

            @if($cars[$i]->km_update->diffInMonths(Carbon\Carbon::now()) >= 2)
                    
                <p class="alert alert-warning">
                    Alerta! O carro {{$cars[$i]->marca}} {{$cars[$i]->modelo}} está com a quilometragem a {{$cars[$i]->km_update->diffInDays(Carbon\Carbon::now())}} dias sem atualizar!
                    Para o funcionamento correto do sistema, atualize-a em clicando 
                    <a href="{{ route('car.edit', ['car' => $cars[$i]]) }}">aqui</a>
                </p>

            @endif

        @endfor

        <h3 style="margin-top: 2rem">Carros Cadastrados: </h3>

        <div class="container" style="margin-top: 2rem">
            <table class="table table-hover" style="text-align: center">
                <thead class="thread-light">
                    <tr>
                        <th>Marca</th>
                        <th>Modelo</th>
                        <th>Data da última revisão</th>
                        <th>Quilometragem</th>
                        <th>Detalhes</th>
                        <th>Editar</th>
                        <th>Excluir</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($cars as $car)
                        <tr>
                            <td class="align-middle">{{ $car->marca }}</td>
                            <td class="align-middle">{{ $car->modelo }}</td>
                            <td class="align-middle">{{ Carbon\Carbon::parse($car->revisao)->format("d/m/Y") }}</td>

                            @if((int) Carbon\Carbon::now()->format('m') - (int) $car->km_update->format('m') >= 3 )
                                <td class="align-middle">{{ $car->km }} Kms</td>
                            @else
                                <td class="align-middle">{{ $car->km }} Kms</td>
                            @endif

                            <td class="align-middle"><a href="{{ route('car.show', $car) }}">Detalhes</a></td>
                            <td class="align-middle"><a href="{{ route('car.edit', ['car' => $car]) }}">Editar</a></td>
                            <td class="align-middle"><form method="post" action="{{ route('car.destroy', ['car' => $car]) }}">
                            @csrf
                            @method('DELETE')
                                <button type="submit" class="btn btn-link">Excluir</button>
                            </form></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            @if(count($cars) == 0)
                <div class="d-flex justify-content-center">
                    <p style="margin: 2rem; font-weight: bold">Não há carros cadastrados, adicione um para visualizá-lo aqui!</p>
                </div>
            @endif
            <div class="d-flex justify-content-center" style="margin: 2rem">
                <a type="button" style="width: 16rem" class="btn btn-success" href="{{ route('car.create') }}">Adicionar Carro</a>
            </div>
        </div>
    </div>
@endsection