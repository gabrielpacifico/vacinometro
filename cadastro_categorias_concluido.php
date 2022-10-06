<?php

session_start();

$usuario = $_SESSION['usuario'];

if(!isset($_SESSION['usuario'])){
  header('Location: login.php');
}

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Vacinômetro - Cadastro de categorias concluído</title>
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

      <?php 

        include_once 'conexao.php';

        $categoria = $_POST['categoria'];

        $sqlcode = "INSERT INTO `categorias`(`categoria`) VALUES ('$categoria')";

        if (mysqli_query($conexao, $sqlcode)) {
        
            ?> <center><br><br><h2 id="cadastroconcluido"> Cadastro feito com sucesso! </h2>
             <a href="cadastro_categorias.php" class="btn btn-primary" style="margin-top: 30px;">Voltar</a></center> <?php
                                                }
        
            else { 
        
                ?> <h2 id="cadastroconcluido"> Erro!! O cadastro não foi feito. </h2> <?php
        
                }
        
        
        
        
            ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
      
      </body>
      </html>