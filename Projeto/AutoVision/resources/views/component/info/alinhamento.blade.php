
<div class="d-flex justify-content-left" style="margin-top: 2rem; align-items: center">
    @include('component.icon', ['size' => "64px"])
    <h3 class="text-primary" style="margin-left: 1rem">{{ $component->label }}</h3>
</div>
<hr>

<label for="funcaoText" style="font-weight: bold">Função do componente:</label>
<p id="funcaoText">Esse componente é responsável por manter a direção do carro alinhada e por evitar a vibração/trepidação do carro em altas velocidades.</p>

<label for="manutencaoText" style="font-weight: bold">Manutenção do componente:</label>
<p id="manutencaoText">Ambas as manutenções são feitas com equipamentos de precisão.</p>
<p>O alinhamento é um processo com o objetivo de ajustar o ângulo dos pneus, alinhados com o volante. Se o veículo estiver tendendo para um dos lados com o volante "reto" é sinal que precisa ser verificado.</p>
<p>Já o balanceamento consiste em ajustar o equilibrio entre as rodas e pneus e assim reduzir as vibrações causadas por problemas na rotação e translação da roda.</p>

<label for="problemasText" style="font-weight: bold">Problemas causados pela falta de manutenção:</label>
<p id="problemasText">Sem as devidas manutenções, o carro fica com a segurança comprometida, há um maior desgaste nos pneus e as desagradáveis trepidações acontecem mesmo quando o asfalto é regular.</p>


<div class="d-flex justify-content-center" style="margin: 2rem">
    <h5>Recomendamos que as manutenções/revisões sejam feitas por especialistas, para seu bem e do seu carro!</h5>
</div>