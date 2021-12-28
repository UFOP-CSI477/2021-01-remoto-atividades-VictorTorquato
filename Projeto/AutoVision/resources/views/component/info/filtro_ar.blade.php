
<div class="d-flex justify-content-left" style="margin-top: 2rem; align-items: center">
    @include('component.icon', ['size' => "64px"])
    <h3 class="text-primary" style="margin-left: 1rem">{{ $component->label }}</h3>
</div>
<hr>

<label for="funcaoText" style="font-weight: bold">Função do componente:</label>
<p id="funcaoText">Esse componente garante que impurezas e partículas não cheguem ao motor durante a captação de oxigênio.</p>

<label for="manutencaoText" style="font-weight: bold">Manutenção do componente:</label>
<p id="manutencaoText">Com o carro frio, deve se abrir o capô e encontrar o filtro, geralmente ele fica em uma caixa preta, onde deve-se retirar os parafusos e trocar o filtro. Caso o filtro não seja descartável também pode-se optar por fazer a limpeza do mesmo.</p>

<label for="manutencaoText" style="font-weight: bold">Problemas causados pela falta de manutenção:</label>
<p>Sem a devida manutenção do componente, o desempenho do motor cai e o consumo de combustível aumenta, isso porque a passagem de oxigênio pode estar obstruída, além disso faz com que o motor se degrade prematuramente. Outro problema é que os gases resultantes da queima do combustível no motor tornam-se ainda mais poluentes.</p>

<div class="d-flex justify-content-center" style="margin: 2rem">
    <h5>Recomendamos que as manutenções/revisões sejam feitas por especialistas, para seu bem e do seu carro!</h5>
</div>