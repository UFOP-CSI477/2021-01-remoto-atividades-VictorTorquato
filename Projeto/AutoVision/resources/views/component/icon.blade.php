@switch($component->nome)

    @case('luzes')
        <img src="{{ URL::asset('images/icons/luzes.png') }}" width={{$size}} height={{$size}}/>
    @break

    @case('ca_pneus')
        <img src="{{ URL::asset('images/icons/Ca_pneu.png') }}" width={{$size}} height={{$size}}/>
    @break

    @case('limpadores')
        <img src="{{ URL::asset('images/icons/Limpador.png') }}" width={{$size}} height={{$size}}/>
    @break

    @case('agua_radiador')
        <img src="{{ URL::asset('images/icons/Radiador.png') }}" width={{$size}} height={{$size}}/>
    @break
            
    @case('correias')
        <img src="{{ URL::asset('images/icons/Correias.png') }}" width={{$size}} height={{$size}}/>
    @break
            
    @case('alinhamento')
        <img src="{{ URL::asset('images/icons/Roda.png') }}" width={{$size}} height={{$size}}/>
    @break
            
    @case('oleo_motor')
        <img src="{{ URL::asset('images/icons/Oleo.png') }}" width={{$size}} height={{$size}}/>
    @break

    @case('freio')
        <img src="{{ URL::asset('images/icons/Freio.png') }}" width={{$size}} height={{$size}}/>
    @break

    @case('filtro_ar')
        <img src="{{ URL::asset('images/icons/Filtro_ar.png') }}" width={{$size}} height={{$size}}/>
    @break

    @case('filtro_combustivel')
        <img src="{{ URL::asset('images/icons/Filtro_combustivel.png') }}" width={{$size}} height={{$size}}/>
    @break

    @case('filtro_oleo')
        <img src="{{ URL::asset('images/icons/Filtro_oleo.png') }}" width={{$size}} height={{$size}}/>
    @break

    @case('velas')
        <img src="{{ URL::asset('images/icons/Vela.png') }}" width={{$size}} height={{$size}}/>
    @break

    @default

@endswitch