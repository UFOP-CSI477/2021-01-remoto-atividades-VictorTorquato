
<div class="d-flex justify-content-left" style="margin-top: 2rem; align-items: center">
    @include('component.icon', ['size' => "64px"])
    <h3 class="text-primary" style="margin-left: 1rem">{{ $component->label }}</h3>
</div>
<hr>

<label for="funcaoText" style="font-weight: bold">Função do componente:</label>
<p id="funcaoText">Esse componente é responsável por lubrificar o motor e diminuir o atrito entre as peças.</p>

<label for="manutencaoText" style="font-weight: bold">Manutenção do componente:</label>
<p id="manutencaoText">Deve-se verificar tanto o nível quanto a qualidade do óleo que está no carro. Para realizar essa verificação há uma vareta que que fica dentro do tanque de óleo e é utilizada para isso, deve-se retirá-la, limpar com uma flanela e inserir novamente para então examinar em qual nível está o óleo.</p>

<label for="manutencaoText" style="font-weight: bold">Problemas causados pela falta de manutenção:</label>
<p>Desgaste e corrosão nas peças, dificuldade na partida, perda de desempenho e até fazer com que o motor pare de funcionar.</p>


<div class="d-flex justify-content-center" style="margin: 2rem">
    <h5>Recomendamos que as manutenções/revisões sejam feitas por especialistas, para seu bem e do seu carro!</h5>
</div>