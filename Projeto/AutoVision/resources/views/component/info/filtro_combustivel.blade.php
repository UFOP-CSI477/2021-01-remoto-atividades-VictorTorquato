
<div class="d-flex justify-content-left" style="margin-top: 2rem; align-items: center">
    @include('component.icon', ['size' => "64px"])
    <h3 class="text-primary" style="margin-left: 1rem">{{ $component->label }}</h3>
</div>
<hr>

<label for="funcaoText" style="font-weight: bold">Função do componente:</label>
<p id="funcaoText">Esse componente é responsável por protejer o sistema de injeção contra impurezas, mantendo um bom desempenho e assim evitar problemas.</p>

<label for="manutencaoText" style="font-weight: bold">Manutenção do componente:</label>
<p id="manutencaoText">A manutenção deve ser feita por um especialista. Problemas ao arrancar ou ligar o carro pode ser sinal que o filtro esteja entupido. Falhas na aceleração podem indicar que ele não está alimentando corretamente o motor. Ferrugem no componente e misturas no combustível também podem gerar problemas.</p>

<label for="manutencaoText" style="font-weight: bold">Problemas causados pela falta de manutenção:</label>
<p>Sem a devida manutenção, podem ocorrer uma diminuição da passagem do combustível e aumento da emissão de dióxido de carbono na atmosfera. Além disso, quando o filtro não consegue reter as impurezas, pode haver danos elevados na bomba de injeção.</p>


<div class="d-flex justify-content-center" style="margin: 2rem">
    <h5>Recomendamos que as manutenções/revisões sejam feitas por especialistas, para seu bem e do seu carro!</h5>
</div>