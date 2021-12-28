
<div class="d-flex justify-content-left" style="margin-top: 2rem; align-items: center">
    @include('component.icon', ['size' => "64px"])
    <h3 class="text-primary" style="margin-left: 1rem">{{ $component->label }}</h3>
</div>
<hr>

<label for="funcaoText" style="font-weight: bold">Função do componente:</label>
<p id="funcaoText">Esse componente é responsável por travar a roda para garantir a correta frenagem do veículo. É um dos itens mais afetados por condução indevida (sua vida útil pode cair pela metade caso o motorista costume frear bruscamente).</p>

<label for="manutencaoText" style="font-weight: bold">Manutenção do componente:</label>
<p id="manutencaoText">É indicado recorrer à avaliação de um profissional especializado para determinar se é preciso ou não realizar a troca. No sistema de freios, a pastilha e o disco, de maneira geral, merecem uma atenção especial. Vibrações no volante e barulhos ao freiar, pedal de freio baixo ou enrijecido podem ser sinais de problemas nos freios.</p>

<label for="manutencaoText" style="font-weight: bold">Problemas causados pela falta de manutenção:</label>
<p>A falta de manutenção geram problemas na segurança do veículo, pois afeta o funcionamento dos freios, podendo ocasionar acidentes.</p>


<div class="d-flex justify-content-center" style="margin: 2rem">
    <h5>Recomendamos que as manutenções/revisões sejam feitas por especialistas, para seu bem e do seu carro!</h5>
</div>