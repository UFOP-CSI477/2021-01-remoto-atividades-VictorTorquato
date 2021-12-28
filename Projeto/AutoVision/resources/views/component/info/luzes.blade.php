
<div class="d-flex justify-content-left" style="margin-top: 2rem; align-items: center">
    @include('component.icon', ['size' => "64px"])
    <h3 class="text-primary" style="margin-left: 1rem">{{ $component->label }}</h3>
</div>
<hr>

<label for="funcaoText" style="font-weight: bold">Função do componente:</label>
<p id="funcaoText">Esse componente é responsável pela visibilidade do motorista a noite e também pela sinalização do veículo.</p>

<label for="manutencaoText" style="font-weight: bold">Manutenção do componente:</label>
<p id="manutencaoText">A maior dificuldade é saber se todas estão funcionando, deve-se checar todas as lâmpadas, externas e internas. Para verificar luzes de freio e de ré, solicite a ajuda de um colega.</p>

<label for="manutencaoText" style="font-weight: bold">Problemas causados pela falta de manutenção:</label>
<p>Luzes queimadas ou que não funcionam geram diversos incômodos, sem os faróis dianteiros, a condução do veículo a noite fica inviabilizada, sem as setas e farois traseiros, não há como sinalizar as ações do motorista. Isso pode até causar acidentes, além do que andar com as luzes danificadas gera infração de trânsito.</p>


<div class="d-flex justify-content-center" style="margin: 2rem">
    <h5>Recomendamos que as manutenções/revisões sejam feitas por especialistas, para seu bem e do seu carro!</h5>
</div>