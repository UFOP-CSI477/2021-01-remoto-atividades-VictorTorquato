
<div class="d-flex justify-content-left" style="margin-top: 2rem; align-items: center">
    @include('component.icon', ['size' => "64px"])
    <h3 class="text-primary" style="margin-left: 1rem">{{ $component->label }}</h3>
</div>
<hr>

<label for="funcaoText" style="font-weight: bold">Função do componente:</label>
<p id="funcaoText">Esse componente é responsável por manter as pressões dos pneus no nível correto, por meio da inserção ou remoção de ar dos mesmos, garante boa dirigibilidade e menor desgaste.</p>

<label for="manutencaoText" style="font-weight: bold">Manutenção do componente:</label>
<p id="manutencaoText">A calibragem deve ser feita de maneira igual em todos os 4 pneus, cada modelo de carro e de pneu possui um valor de pressão correspondente.</p>
<p>No calibrador, deve se digitar o valor da pressão, levar a mangueira até o pneu, retirar a tampa da válvula do pneu, encaixar a mangueira na válvula e aguardar o apito do equipamento para retirá-la de volta.</p>
<p>Além disso, confira se o estepe está cheio e se as ferramentas para realizar a troca estão ok.</p>

<label for="manutencaoText" style="font-weight: bold">Problemas causados pela falta de manutenção:</label>
<p>Sem a devida calibragem, a dirigibilidade do carro fica comprometida, há a perda de aderência, instabilidade e um maior desgaste dos pneus</p>


<div class="d-flex justify-content-center" style="margin: 2rem">
    <h5>Recomendamos que as manutenções/revisões sejam feitas por especialistas, para seu bem e do seu carro!</h5>
</div>