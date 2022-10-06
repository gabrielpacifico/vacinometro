<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sobre a secretaria</title>
  
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

<div class="container">
    <div class="row">
        <div class="col">
            <div id="sobsec">
                <h3 id="infosec">Informações sobre a secretaria</h3>
                <hr>

                <div id="about" class="container">
                    <i class="fas fa-tag" id="tagsobre"></i><p id="about" style="display: inline;">&nbsp;CNPJ: 11.430.883/0001-96</p>
                </div>
            
                <div id="about" class="container">
                    <i class="fas fa-envelope" id="tagsobre"></i><p id="about" style="display: inline;">&nbsp;Email:  www.saude@independencia.ce.gov.br</p>
                </div>

                <div id="about" class="container">
                    <i class="fas fa-phone-alt" id="tagsobre"></i><p id="about" style="display: inline;">&nbsp;Telefone: (88) 3675.1270</p>
                </div>

                <div id="about" class="container">
                    <i class="fas fa-location-arrow" id="tagsobre"></i><p id="about" style="display: inline;">&nbsp;Endereço: Rua Cel. Sr. Pires, 260 - Centro, Independência/CE - CEP: 63640-000</p>
                </div>
                
                <div id="about" class="container">
                    <i class="fas fa-clock" id="tagsobre"></i><p id="about" style="display: inline;">&nbsp;Funcionamento: De segunda à sexta - 08h às 12h - 14h às 18h</p>
                </div>

                <h3 id="infosec2">Informações do secretário</h3>
                <hr>

                <div id="about" class="container">
                    <i class="fas fa-user" id="tagsobre"></i><p id="about" style="display: inline;">&nbsp;Secretário(a): Antonio Edi Vieira Coutinho</p>
                </div>

                <div id="about" class="container">
                    <i class="fas fa-tag" id="tagsobre"></i><p id="about" style="display: inline;">&nbsp;Cargo: Secretário(a) de saúde</p>
                </div>
                <a href="vacinometro.php" class="btn btn-primary" role="button" style="margin-top: 30px;"><i class="fas fa-arrow-left"></i></a>
            </div>
        </div>
    </div>
    
</div>

<!-- FOOTER -->

<?php 
include_once 'footer.html';
?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

</body>
</html>