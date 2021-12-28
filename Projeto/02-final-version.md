# **CSI606-2021-01 - Remoto - Trabalho Final - Resultados**
## *Aluna(o): Victor Elias Torquato Barboza*

--------------

<!-- Este documento tem como objetivo apresentar o projeto desenvolvido, considerando o que foi definido na proposta e o produto final. -->

### Resumo

 O presente trabalho se insere no contexto de vida de diversas pessoas que utilizam seus veículos diariamente. O problema encontrado é que muitas vezes o motorista comum não consegue ou não dispõe de tempo para controlar as revisões e/ou manutenções que são de suma importância para um bom funcionamento de seu veículo, são tantos componentes que devem ser verificados que as vezes passam despercebidos para ele. Isso se agrava ainda mais quando o motorista utiliza/possui mais de um veículo a sua disposição. Dessa forma, há uma necessidade de automatizar o processo de controle de revisões, para que o usuário possa manter seu(s) carro(s) em bom estado e ter uma noção da importância de realizar as revisões.

### 1. Funcionalidades implementadas
<!-- Descrever as funcionalidades que eram previstas e foram implementas. -->

  - Controle de usuários (Sigin, Login);
  - CRUD de carros;
  - Apresentação dos componentes de cada veículo;
  - Controle das Revisões dos componentes por ordem de prioridade;
  - Apresentação de informações relevantes para tal cenário;
  
### 2. Funcionalidades previstas e não implementadas
<!-- Descrever as funcionalidades que eram previstas e não foram implementas, apresentando uma breve justificativa do porquê elas não foram incluídas -->
  - Barra de progresso para melhor visualização das próximas revisões;
  - PopUp para atualização da quilometragem do veículo.

### 3. Outras funcionalidades implementadas
<!-- Descrever as funcionalidades implementas além daquelas que foram previstas, caso se aplique.  -->

### 4. Principais desafios e dificuldades
<!-- Descrever os principais desafios encontrados no desenvolvimento do trabalho, quais foram as dificuldades e como elas foram superadas e resolvidas. -->
  Alguns desafios foram encontrados durante o decorrer do projeto, como a quantidade de componentes que um carro possui e que devem ser revisados e a forma como o sistema organiza tais informações, a falta de alguns recursos extras como barras de progresso e popups para atualizar a quilometragem dos carros, as diferentes formas de classificar as revisões (tempo e quilometragem) e informações distintas dependendo da fonte.
  
  A principal medida tomada foi tentar padronizar o máximo o modelo utilizado, criando assim uma entidade de componente que atenderia as especificações. As informações relevantes às revisões foram coletadas levando em conta o tempo médio e a quilometragem média encontrados nas pesquisas. Já os recursos como barras de progresso e popups não foram aplicados devido a obrigatoriedade da utilização de complexas estruturas ou frameworks que estão além de meus conhecimentos no momento.

### 5. Instruções para instalação e execução
<!-- Descrever o que deve ser feito para instalar (ou baixar) a aplicação, o que precisa ser configurando (parâmetros, banco de dados e afins) e como executá-la. -->
  - Requisitos: *Para baixar e executar o projeto são necessários a instalação das seguintes dependências*
 
    1. Git - https://git-scm.com/
    2. PHP - https://www.php.net/
    3. Laravel - https://laravel.com/
    4. Composer - https://getcomposer.org/

  Após instaladas, siga o passo a passo para realizar a execução (Windows):
  
  1. Abra o console na sua área de trabalho (shift + clique direito e "Abrir janela de comando aqui");
  2. Digite os comandos abaixo um por vez e pressione "Enter":
    
    git clone https://github.com/UFOP-CSI477/2021-01-remoto-atividades-VictorTorquato/
    cd 2021-01-remoto-atividades-VictorTorquato
    cd Projeto
    cd AutoVision
    php composer.phar install
    php artisan migrate
    php artisan serve
   
  3. Com isso, o projeto estará rodando em sua máquina;
  4. Agora basta abrir um navegador de sua preferência no link: http://localhost:8000/
  5. Pronto!
  
### 6. Referências
<!-- Referências podem ser incluídas, caso necessário. Utilize o padrão ABNT. -->
  FONSECA, Gustavo. Como Fazer Manutenção Preventiva de Veículos – Checklist Com 19 Dicas. DoutorMultas, 2021. Disponível em: https://doutormultas.com.br/manutencao-preventiva/ Acesso em: 14/12/2021;
  
  ANGELO, Bárbara. Calendário ensina a fazer a manutenção preventiva de carros. AutoPapo, 2018. Disponível em: https://autopapo.uol.com.br/noticia/calendario-de-manutencao-preventiva-de-carros/ Acesso em: 14/12/2021;
  
  DUGO, Glauce. Qual A Importância Do Alinhamento E Balanceamento?. BridgeStone, 2013. Disponível em: https://www.bridgestone.com.br/pt/sobre-nos/noticias/alinhamento-balanceamento Acesso em: 21/12/2021;
  
  ANDRADE, Laurie. Como calibrar o pneu e quantas libras usar no seu carro?. AutoPapo, 2020. Disponível em: https://autopapo.uol.com.br/noticia/como-calibrar-pneu-pressao-ideal/ Acesso em: 21/12/2021;
  
  Manutenção preventiva das correias. FoxLux. Disponível em: https://www.foxlux.com.br/blog/dicas/cuide-bem-do-seu-carro-o-abc-da-manutencao-preventiva-das-correias/ Acesso em: 23/12/2021;
  
  ANGELO, Bárbara. Troca de óleo do motor: saiba tudo sobre esse procedimento. AutoPapo, 2019. Disponível em: https://autopapo.uol.com.br/noticia/troca-de-oleo-motor-carro/ Acesso em: 23/12/2021;
  
  Fluido do radiador de carro: qual é a hora de trocar e completar?. Rodobens. Disponível em: https://blog.rodobens.com.br/fluido-do-radiador-de-carro-qual-e-a-hora-de-trocar-e-completar Acesso em: 24/12/2021;
  
  Manutenção Do Filtro De Combustível: Saiba Mais. Bompreço Auto Peças, 2017. Disponível em: https://blog.bomprecopecas.com.br/manutencao-do-filtro-de-combustivel-saiba-mais/ Acesso em: 24/12/2021;
  
  Manutenção de freios: qual a importância e como fazer?. Meu Porto Seguro, 2019. Disponível em: https://www.meuportoseguro.com.br/meu-carro/manutencao-de-freios-qual-a-importancia-e-como-fazer/ Acesso em: 24/12/2021.
  
  Você sabe a importância do filtro de ar do carro? Descubra agora!. Portal Auto Shopping, 2018. Disponível em: https://www.portalautoshopping.com.br/blog/voce-sabe-a-importancia-do-filtro-de-ar-do-carro-descubra-agora/ Acesso em: 24/12/2021.