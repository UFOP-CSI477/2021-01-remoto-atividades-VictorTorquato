<!DOCTYPE html>
<head>
    <title>Controle de Vacinação COVID-19 - Editar Registro</title>
</head>

@extends('layouts.defaultLogged')
@section('content')

    <div class="container" style="margin-top: 2rem">

        @if(Session::has('message'))
            <p class="alert {{ Session::get('alert-class', 'alert-info') }}" style="margin-top: 2rem">
                {{ Session::get('message') }}</p>
        @endif

        <h3 style="margin-top: 2rem">Edite os dados do registro: </h3>

        <form method="post" action="{{ route('registros.update', $registro) }}">
        @csrf

            <div class="form-group column">
                <label for="pessoaSelect">Pessoa</label>
                <select class="form-control" required="true" name="pessoa_id" id="pessoaSelect">
                    @foreach($pessoas as $p)
                        <option value="{{ $p->id }}">{{ $p->nome }}</option>

                        @if ($registro->pessoa_id == $p->id)
                            selected
                        @endif

                    @endforeach
                </select>
            </div>

            <div class="form-group column">
                <label for="unidadeSelect">Unidade</label>
                <select class="form-control" required="true" name="unidade_id" id="unidadeSelect">
                    @foreach($unidades as $u)
                        <option value="{{ $u->id }}">{{ $u->nome }}</option>

                        @if ($registro->unidade_id == $u->id)
                            selected
                        @endif

                    @endforeach
                </select>
            </div>

            <div class="form-group column">
                <label for="vacinaSelect">Vacina</label>
                <select class="form-control" required="true" name="vacina_id" id="vacinaSelect">
                    @foreach($vacinas as $v)
                        <option value="{{ $v->id }}">{{ $v->nome }}</option>

                        @if ($registro->vacina_id == $v->id)
                            selected
                        @endif

                    @endforeach
                </select>
            </div>

            <div class="form-group column">
                <label for="doseInput">Dose</label>
                <input class="form-control" required="true" value="{{ $registro->dose }}" type="number" name="dose" id="doseInput"/>
            </div>

            <div class="form-group column">
                <label for="dataInput">Data</label>
                <input class="form-control" required="true" value="{{ $registro->data }}" type="date" name="data" id="dataInput"/>
            </div>

            <div class="form-group" style="margin-top: 2rem; margin-bottom: 2rem;">
                <button class="btn btn-success" style="width: 8rem" type="submit">Criar</button>
                <a class="btn btn-secondary" style="width: 8rem" type="button" href="{{ route('registros.index') }}">Voltar</a>
                <button class="btn btn-secondary" style="width: 8rem" type="reset">Limpar</button>
            </div>

        </form>
    </div>

@endsection