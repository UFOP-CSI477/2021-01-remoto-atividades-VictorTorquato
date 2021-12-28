
<div class="d-flex justify-content-left" style="margin-top: 2rem; align-items: center">
    @include('component.icon', ['size' => "64px"])
    <h3 class="text-primary" style="margin-left: 1rem">{{ $component->label }}</h3>
</div>
<hr>

<label for="funcaoText" style="font-weight: bold">Função do componente:</label>
<p id="funcaoText">Esse componente é responsável por evitar desgastes no propulsor, filtrando impurezas no óleo que circula no sistema.</p>

<label for="manutencaoText" style="font-weight: bold">Manutenção do componente:</label>
<p id="manutencaoText">A manutenção desse componente geralmente é feita ao realizar a troca do óleo, isso porque o filtro mantém até um litro de óleo usado em seu interior, o que pode contaminar o lubrificante novo. Além disso, o filtro antigo terá uma menor eficiência e o óleo novo menor vida útil.</p>

<label for="manutencaoText" style="font-weight: bold">Problemas causados pela falta de manutenção:</label>
<p>Sem a devida manutenção, resíduos e particulas acabam indo para dentro dos cilindros, podendo gerar até problemas permanentes, formação de borras no cárter e vazamentos.</p>


<div class="d-flex justify-content-center" style="margin: 2rem">
    <h5>Recomendamos que as manutenções/revisões sejam feitas por especialistas, para seu bem e do seu carro!</h5>
</div>