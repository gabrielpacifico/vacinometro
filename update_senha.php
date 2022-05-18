<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Alteração de senha </title>
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

include_once ('conexao.php');

$id_usuario = $_POST['id'];
$user = $_POST['user_newpass'];
$email = $_POST['email_newpass'];
$cpfcnpj = $_POST['cpfcnpj_newpass'];
$newpass = $_POST['new_pass'];
$rep_newpass = $_POST['repeat_new_pass'];

$passmd5 = md5($newpass);

$update = "UPDATE `usuarios` SET `usuario`='$user', `senha`= '$passmd5', `email`='$email', `cpfcnpj`='$cpfcnpj' WHERE id_usuario ='$id_usuario'";

if (mysqli_query($conexao, $update)) {
                
    ?> <center><br><br><h2 id="cadastroconcluido"> Senha alterada com sucesso! </h2>
    <a href="login.php" class="btn btn-primary" style="margin-top: 30px;">Voltar</a></center> <?php
                                    }

    else {

    ?> <center><h2 style="margin-top: 30px;" id="cadastroconcluido"> Erro!! A senha não pôde ser editada. </h2>
    <a href="recuperar_senha.php" class="btn btn-primary" style="margin-top: 30px;">Voltar</a></center> <?php

    }


?>