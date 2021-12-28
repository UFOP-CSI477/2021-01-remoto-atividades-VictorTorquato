
<div class="d-flex justify-content-left" style="margin-top: 2rem; align-items: center">
    @include('component.icon', ['size' => "64px"])
    <h3 class="text-primary" style="margin-left: 1rem">{{ $component->label }}</h3>
</div>
<hr>

<label for="funcaoText" style="font-weight: bold">Função do componente:</label>
<p id="funcaoText">Esse componente é responsável por </p>

<label for="manutencaoText" style="font-weight: bold">Manutenção do componente:</label>
<p id="manutencaoText"> </p>

<label for="manutencaoText" style="font-weight: bold">Problemas causados pela falta de manutenção:</label>
<p> </p>


<div class="d-flex justify-content-center" style="margin: 2rem">
    <h5>Recomendamos que as manutenções/revisões sejam feitas por especialistas, para seu bem e do seu carro!</h5>
</div>