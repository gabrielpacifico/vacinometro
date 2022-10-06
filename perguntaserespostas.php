<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Perguntas e respostas</title>
  
  <link rel="shortcut icon" type="image/png" href="img/favicon.png"> 
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css">
  <link rel="stylesheet" href="styles.css">
</head>
<body>

<section id="navtop">
  <div class="container">
    <strong>
      <a href="https://www.independencia.ce.gov.br/" target="_blank"> <h1>Governo municipal de Independência</h1></a>
    </strong>
  </div>
</section>
<div>

</div>

<nav id="navbar" class="navbar navbar-expand-lg navbar-dark">
  <div class="container">
    <a class="navbar-brand" id="effect" href="vacinometro.php"><i class="fas fa-home"></i></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" id="effect" aria-current="page" href="sobre.php">Sobre a secretaria</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" id="effect" href="listavacinados.php">Transparência da vacina</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" id="effect" href="unidadesdeatendimento.php">Unidades de saúde</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<!-- Barra de navegação acima -->

<section id="perguntaserespostas" class="container">

  <center>
    <h1 id="titleperguntas">Perguntas e respostas</h1>
  </center>

<div class="container">
  <h2 id="subtitleperguntas"><i class="fas fa-question-circle"></i>&nbsp;Perguntas frequentes relacionadas ao Covid-19.</h2>
      <div class="table-responsive">
      <table id="tableperguntas" class="table table-striped table-hover table-bordered">
        <thead>
          <tr>
            <th scope="col">Pergunta</th>
            <th scope="col">Resposta</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>A vacina é gratuita?</td>
            <td>Sim, ela é disponibilizada pelo Sistema Único de Saúde (SUS), atendendo a ordem dos grupos prioritários.</td>
          </tr>

          <tr>
            <td>Quem já teve Covid-19 pode se vacinar?</td>
            <td>Pode. Não há evidências, até o momento, de qualquer risco com a vacinação de indivíduos com histórico 
              anterior de infecção ou com anticorpo detectável para SARS-CoV-2.</td>
          </tr>

          <tr>
            <td>A vacina pode ser aplicada em menores de 18 anos?</td>
            <td>A Anvisa autorizou o uso da vacina da Pfizer contra a Covid-19 em adolescentes a partir de 12 anos de idade no Brasil,
              sendo assim já é indicada e pode ser aplicada em menores de 18 anos.</td>
          </tr>

          <tr>
            <td>A vacinação contra a Covid-19 é obrigatória?</td>
            <td>Não. As vacinas nunca são obrigatórias no país. Mas existem restrições da vida civil, 
              como para concursos públicos, inscrição no Bolsa Família e viagens internacionais.</td>
          </tr>

          <tr>
            <td>Depois de vacinadas as pessoas precisam continuar usando máscara?</td>
            <td>Sim. A orientação é que as pessoas vacinadas mantenham as medidas de proteção até que a maior
               parte da população esteja vacinada, o que deve demorar algum tempo.</td>
          </tr> 
        </tbody>
      </table>
    </div>
  </div>
  <a href="vacinometro.php" class="btn btn-primary" role="button" style="margin-bottom: 20px"><i class="fas fa-arrow-left"></i></a>
</section>

<?php 
include_once 'footer.html';
?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

</body>
</html>