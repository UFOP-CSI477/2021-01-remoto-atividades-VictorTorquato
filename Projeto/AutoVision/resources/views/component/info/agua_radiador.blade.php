
<div class="d-flex justify-content-left" style="margin-top: 2rem; align-items: center">
    @include('component.icon', ['size' => "64px"])
    <h3 class="text-primary" style="margin-left: 1rem">{{ $component->label }}</h3>
</div>
<hr>

<label for="funcaoText" style="font-weight: bold">Função do componente:</label>
<p id="funcaoText">Esse componente é responsável pela refrigeração do veículo.</p>

<label for="manutencaoText" style="font-weight: bold">Manutenção do componente:</label>
<p id="manutencaoText">Deve ser preenchido por uma mistura meio a meio de água desmineralizada e etilenoglicol (o famoso aditivo).
Hoje em dia, essa mistura já é vendida em conjunto e é conhecida como “líquido de arrefecimento”.</p>

<label for="manutencaoText" style="font-weight: bold">Problemas causados pela falta de manutenção:</label>
<p>Superaquecimento - Pode ocasionar o rompimento das mangueiras, danificar a tampa do reservatório e apressar a deterioração do óleo lubrificante.

Em casos extremos, a falta de água pode acabar até mesmo fundindo o motor, resultando em um problema muito maior!</p>

<div class="d-flex justify-content-center" style="margin: 2rem">
    <h5>Recomendamos que as manutenções/revisões sejam feitas por especialistas, para seu bem e do seu carro!</h5>
</div>
