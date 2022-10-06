<?php 

include 'conexao.php';

$id = $_GET['id'];

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informações do beneficiário</title>

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

<section class="container" id="infobene">
<center>
<h1 id="titlebeneficiario">Informações do beneficiário</h1>
</center>
<br>

<?php

$sql = "SELECT * FROM `beneficiarios` WHERE id_beneficiarios = $id";
$buscar = mysqli_query($conexao, $sql);
while($array = mysqli_fetch_array($buscar)){
    $id_beneficiarios = $array['id_beneficiarios'];
    $beneficiario = $array['beneficiario'];
    $idade = $array['idade'];
    $sexo = $array['sexo'];
    $data_nasc = $array['data_nasc'];
    $data_nasc_convert = date('d/m/Y', strtotime($data_nasc));
    $fase_1_dose = $array['fase_1_dose'];
    $dose = $array['dose'];
    $data_de_vacinacao = $array['data_de_vacinacao'];
    $data_de_vacinacao_convert = date('d/m/Y', strtotime($data_de_vacinacao));
    $data_de_vacinacao_2 = $array['data_de_vacinacao_2'];
    $data_de_vacinacao_2_convert = date('d/m/Y', strtotime($data_de_vacinacao_2));
    $data_de_vacinacao_3 = $array['data_de_vacinacao_3'];
    $data_de_vacinacao_3_convert = date('d/m/Y', strtotime($data_de_vacinacao_3));
    $data_de_vacinacao_4 = $array['data_de_vacinacao_4'];
    $data_de_vacinacao_4_convert = date('d/m/Y', strtotime($data_de_vacinacao_4));
    $categoria = $array['categoria'];
    $local_aplicado = $array['local_aplicado'];
    $vacinador = $array['vacinador'];
    $vacinador_2_dose = $array['vacinador_2_dose'];
    $vacinador_3_dose = $array['vacinador_3_dose'];
    $vacinador_4_dose = $array['vacinador_4_dose'];
    $lote_1_dose = $array['lote_1_dose'];
    $lote_2_dose = $array['lote_2_dose'];
    $lote_3_dose = $array['lote_3_dose'];
    $lote_4_dose = $array['lote_4_dose'];
    $vacina = $array['vacina'];
    $vacina_2 = $array['vacina_2'];
    $vacina_3 = $array['vacina_3'];
    $vacina_4 = $array['vacina_4'];
    $local_vacinacao = $array['local_vacinacao'];
    $local_vacinacao_2 = $array['local_vacinacao_2'];
    $local_vacinacao_3 = $array['local_vacinacao_3'];
    $local_vacinacao_4 = $array['local_vacinacao_4'];
    $observacao = $array['observacao'];

?>
    <a href="listavacinados.php" class="btn btn-primary" role="button" style="margin-bottom: 30px;"><i class="fas fa-arrow-left"></i></a>

    <p><strong>Beneficiário: </strong><?php echo $beneficiario ?></p>
    <p><strong>Data de nascimento: </strong><?php echo $data_nasc_convert ?></p>
    <p><strong>Idade: </strong><?php echo $idade ?> anos</p>
    <p><strong>Sexo: </strong><?php echo $sexo ?> </p>
    <p><strong>Categoria: </strong><?php echo $categoria?></p>
    <p><strong>Local aplicado: </strong><?php echo $local_aplicado ?></p>
    <p><strong>Fase: </strong> <?php echo $fase_1_dose?> ª fase</p>

    <hr>
    <?php 

      if($dose == "Dose única" || $dose == "Dose única + reforço"){
        echo "<h2 id='subtitlebeneficiario'>Informações da dose única</h2>";
      } else{
        echo "<h2 id='subtitlebeneficiario'>Informações da 1ª dose</h2>";
      }

      if($data_de_vacinacao == "0000-00-00" AND ($lote_1_dose == "" OR $lote_1_dose == NULL) AND ($vacina == "Vacina" OR $vacina == NULL) AND ($vacinador == "Vacinador" OR $vacinador == NULL) AND ($local_vacinacao == "Local de vacinação" OR $local_vacinacao == NULL)){
        echo "<p id='semRegistro'> <strong> Aviso! </strong> Não foi cadastrada nenhuma informação </p>";
      }else{

    ?>
    

     
    <?php if($data_de_vacinacao == "0000-00-00"){
            echo "<p><strong>Data de vacinação: </strong> Sem cadastro </p>";
          }else{
            echo "<p><strong>Data de vacinação: </strong> $data_de_vacinacao_convert </p>";
          }
    ?>
    <?php

    if($lote_1_dose == ""){
      echo "<p><strong>Lote: </strong> Sem cadastro </p>";
    }else{
      echo "<p><strong>Lote: </strong> $lote_1_dose </p>";
    }
    ?>

    <?php if($vacina == "Vacina"){
            echo "<p><strong>Vacina: </strong> Sem cadastro</p>";
          }else{
            echo "<p><strong>Vacina: </strong> $vacina </p>";
          }
    ?>

    <?php if($vacinador == "Vacinador"){
            echo "<p><strong>Vacinador: </strong> Sem cadastro</p>";
          }else{
            echo "<p><strong>Vacinador: </strong> $vacinador </p>";
          }
    ?>

    <?php if($local_vacinacao == "Local de vacinação" OR $local_vacinacao == NULL){
            echo "<p><strong> Local de vacinação: </strong> Sem cadastro</p>";
          }else{
            echo "<p><strong> Local de vacinação: </strong> $local_vacinacao </p>";
          }
        }
    ?>


    <?php

      if($dose == "Dose única + reforço"){
        echo "<hr>";
        echo "<h2 id='subtitlebeneficiario'>Informações da dose de reforço</h2>";

        if($data_de_vacinacao_2 == "0000-00-00" AND ($lote_2_dose == "" OR $lote_2_dose == NULL) AND ($vacina_2 == "Vacina" OR $vacina_2 == NULL) AND ($vacinador_2_dose == "Vacinador" OR $vacinador_2_dose == NULL) AND ($local_vacinacao_2 == "Local de vacinação" OR $local_vacinacao_2 == NULL)){
          echo "<p id='semRegistro'><strong> Aviso! </strong> Não foi cadastrada nenhuma informação</p>";
        }else{
        
                if($data_de_vacinacao_2 == "0000-00-00"){
                  echo "<p> <strong> Data de vacinação: </strong> Sem cadastro </p>";
                }else{
                  echo "<p> <strong> Data de vacinação: </strong> $data_de_vacinacao_2_convert </p>";
                }

                if($lote_2_dose == ""){
                  echo "<p><strong>Lote: </strong> Sem cadastro";
                }else{
                  echo "<p><strong>Lote: </strong> $lote_2_dose </p>";
                }


                if($vacina_2 == "Vacina"){
                  echo "<p><strong>Vacina: </strong> Sem cadastro </p>";
                }else{
                  echo "<p><strong>Vacina: </strong> $vacina_2 </p>";
                }

                if($vacinador_2_dose == "Vacinador"){
                  echo "<p><strong>Vacinador: </strong> Sem cadastro </p>";
                }else{
                  echo "<p><strong>Vacinador: </strong> $vacinador_2_dose </p>";
                }
          
                if($local_vacinacao_2 == "Local de vacinação" OR $local_vacinacao_2 == NULL){
                  echo "<p><strong> Local de vacinação: </strong> Sem cadastro </p>";
                }else{
                  echo "<p><strong> Local de vacinação: </strong> $local_vacinacao_2 </p>";
                }
              }
      }
    ?>


    <?php 
    
    if($dose == 2){
      echo "<hr>";
      echo "<h2 id='subtitlebeneficiario'>Informações da 2ª dose</h2>";

      if($data_de_vacinacao_2 == "0000-00-00" AND ($lote_2_dose == "" OR $lote_2_dose == NULL) AND ($vacina_2 == "Vacina" OR $vacina_2 == NULL) AND ($vacinador_2_dose == "Vacinador" OR $vacinador_2_dose == NULL) AND ($local_vacinacao_2 == "Local de vacinação" OR $local_vacinacao_2 == NULL)){
        echo "<p id='semRegistro'><strong> Aviso! </strong> Não foi cadastrada nenhuma informação</p>";
      }else{

                if($data_de_vacinacao_2 == "0000-00-00"){
                  echo "<p> <strong> Data de vacinação: </strong> Sem cadastro </p>";
                }else{
                  echo "<p> <strong> Data de vacinação: </strong> $data_de_vacinacao_2_convert </p>";
                }

                if($lote_2_dose == ""){
                  echo "<p><strong>Lote: </strong> Sem cadastro";
                }else{
                  echo "<p><strong>Lote: </strong> $lote_2_dose </p>";
                }

                if($vacina_2 == "Vacina"){
                  echo "<p><strong>Vacina: </strong> Sem cadastro</p>";
                }else{
                  echo "<p><strong>Vacina: </strong> $vacina_2 </p>";
                }

                if($vacinador_2_dose == "Vacinador"){
                  echo "<p><strong>Vacinador: </strong> Sem cadastro</p>";
                }else{
                  echo "<p><strong>Vacinador: </strong> $vacinador_2_dose </p>";
                }

                if($local_vacinacao_2 == "Local de vacinação" OR $local_vacinacao_2 == NULL){
                  echo "<p><strong> Local de vacinação: </strong> Sem cadastro</p>";
                }else{
                  echo "<p><strong> Local de vacinação: </strong> $local_vacinacao_2 </p>";
                }
              }
    }

      if($dose == 3){
      echo "<hr>";
      echo "<h2 id='subtitlebeneficiario'>Informações da 2ª dose</h2>";

      if($data_de_vacinacao_2 == "0000-00-00" AND ($lote_2_dose == "" OR $lote_2_dose == NULL) AND ($vacina_2 == "Vacina" OR $vacina_2 == NULL) AND ($vacinador_2_dose == "Vacinador" OR $vacinador_2_dose == NULL) AND ($local_vacinacao_2 == "Local de vacinação" OR $local_vacinacao_2 == NULL)){
        echo "<p id='semRegistro'><strong> Aviso! </strong> Não foi cadastrada nenhuma informação</p>";
      }else{

              if($data_de_vacinacao_2 == "0000-00-00"){
                echo "<p> <strong> Data de vacinação: </strong> Sem cadastro</p>";
              }else{
                echo "<p> <strong> Data de vacinação: </strong> $data_de_vacinacao_2_convert </p>";
              }

              if($lote_2_dose == ""){
                echo "<p><strong>Lote: </strong> Sem cadastro";
              }else{
                echo "<p><strong>Lote: </strong> $lote_2_dose </p>";
              }

              if($vacina_2 == "Vacina"){
                echo "<p><strong>Vacina: </strong> Sem cadastro</p>";
              }else{
                echo "<p><strong>Vacina: </strong> $vacina_2 </p>";
              }

              if($vacinador_2_dose == "Vacinador"){
                echo "<p><strong>Vacinador: </strong> Sem cadastro</p>";
              }else{
                echo "<p><strong>Vacinador: </strong> $vacinador_2_dose </p>";
              }

              if($local_vacinacao_2 == "Local de vacinação" OR $local_vacinacao_2 == NULL){
                echo "<p><strong> Local de vacinação: </strong> Sem cadastro</p>";
              }else{
                echo "<p><strong> Local de vacinação: </strong> $local_vacinacao_2 </p>";
              }
            }
      echo "<hr>";
      echo "<h2 id='subtitlebeneficiario'>Informações da 3ª dose</h2>";

      if($data_de_vacinacao_3 == "0000-00-00" AND ($lote_3_dose == "" OR $lote_3_dose == NULL) AND ($vacina_3 == "Vacina" OR $vacina_3 == NULL) AND ($vacinador_3_dose == "Vacinador" OR $vacinador_3_dose == NULL) AND ($local_vacinacao_3 == "Local de vacinação" OR $local_vacinacao_3 == NULL)){
        echo "<p id='semRegistro'><strong> Aviso! </strong> Não foi cadastrada nenhuma informação</p>";
      }else{

              if($data_de_vacinacao_3 == "0000-00-00"){
                echo "<p> <strong> Data de vacinação: </strong> Sem cadastro</p>";
              }else{
                echo "<p> <strong> Data de vacinação: </strong> $data_de_vacinacao_3_convert </p>";
              }

              if($lote_3_dose == ""){
                echo "<p><strong>Lote: </strong> Sem cadastro";
              }else{
                echo "<p><strong>Lote: </strong> $lote_3_dose </p>";
              }

                if($vacina_3 == "Vacina"){
                  echo "<p><strong>Vacina: </strong> Sem cadastro</p>";
                }else{
                  echo "<p><strong>Vacina: </strong> $vacina_3 </p>";
                }

                if($vacinador_3_dose == "Vacinador"){
                  echo "<p><strong>Vacinador: </strong> Sem cadastro</p>";
                }else{
                  echo "<p><strong>Vacinador: </strong> $vacinador_3_dose </p>";
                }

                if($local_vacinacao_3 == "Local de vacinação" OR $local_vacinacao_3 == NULL){
                  echo "<p><strong> Local de vacinação: </strong> Sem cadastro</p>";
                }else{
                  echo "<p><strong> Local de vacinação: </strong> $local_vacinacao_3 </p>";
                }
              }
      }

      if($dose == 4){
        echo "<hr>";
        echo "<h2 id='subtitlebeneficiario'>Informações da 2ª dose</h2>";

        if($data_de_vacinacao_2 == "0000-00-00" AND ($lote_2_dose == "" OR $lote_2_dose == NULL) AND ($vacina_2 == "Vacina" OR $vacina_2 == NULL) AND ($vacinador_2_dose == "Vacinador" OR $vacinador_2_dose == NULL) AND ($local_vacinacao_2 == "Local de vacinação" OR $local_vacinacao_2 == NULL)){
          echo "<p id='semRegistro'><strong> Aviso! </strong> Não foi cadastrada nenhuma informação</p>";
        }else{

              if($data_de_vacinacao_2 == "0000-00-00"){
                echo "<p> <strong> Data de vacinação: </strong> Sem cadastro</p>";
              }else{
                echo "<p> <strong> Data de vacinação: </strong> $data_de_vacinacao_2_convert </p>";
              }

              if($lote_2_dose == ""){
                echo "<p><strong>Lote: </strong> Sem cadastro";
              }else{
                echo "<p><strong>Lote: </strong> $lote_2_dose </p>";
              }

                if($vacina_2 == "Vacina"){
                  echo "<p><strong>Vacina: </strong> Sem cadastro</p>";
                }else{
                  echo "<p><strong>Vacina: </strong> $vacina_2 </p>";
                }

                if($vacinador_2_dose == "Vacinador"){
                  echo "<p><strong>Vacinador: </strong> Sem cadastro</p>";
                }else{
                  echo "<p><strong>Vacinador: </strong> $vacinador_2_dose </p>";
                }

                if($local_vacinacao_2 == "Local de vacinação" OR $local_vacinacao_2 == NULL){
                  echo "<p><strong> Local de vacinação: </strong> Sem cadastro</p>";
                }else{
                  echo "<p><strong> Local de vacinação: </strong> $local_vacinacao_2 </p>";
                }
              }
        echo "<hr>";
        echo "<h2 id='subtitlebeneficiario'>Informações da 3ª dose</h2>";

        if($data_de_vacinacao_3 == "0000-00-00" AND ($lote_3_dose == "" OR $lote_3_dose == NULL) AND ($vacina_3 == "Vacina" OR $vacina_3 == NULL) AND ($vacinador_3_dose == "Vacinador" OR $vacinador_3_dose == NULL) AND ($local_vacinacao_3 == "Local de vacinação" OR $local_vacinacao_3 == NULL)){
          echo "<p id='semRegistro'><strong> Aviso! </strong> Não foi cadastrada nenhuma informação</p>";
        }else{

              if($data_de_vacinacao_3 == "0000-00-00"){
                echo "<p> <strong> Data de vacinação: </strong> Sem cadastro</p>";
              }else{
                echo "<p> <strong> Data de vacinação: </strong> $data_de_vacinacao_3_convert </p>";
              }

              if($lote_3_dose == ""){
                echo "<p><strong>Lote: </strong> Sem cadastro";
              }else{
                echo "<p><strong>Lote: </strong> $lote_3_dose </p>";
              }

                if($vacina_3 == "Vacina"){
                  echo "<p><strong>Vacina: </strong> Sem cadastro</p>";
                }else{
                  echo "<p><strong>Vacina: </strong> $vacina_3 </p>";
                }

                if($vacinador_3_dose == "Vacinador"){
                  echo "<p><strong>Vacinador: </strong> Sem cadastro</p>";
                }else{
                  echo "<p><strong>Vacinador: </strong> $vacinador_3_dose </p>";
                }

                if($local_vacinacao_3 == "Local de vacinação" OR $local_vacinacao_3 == NULL){
                  echo "<p><strong> Local de vacinação: </strong> Sem cadastro</p>";
                }else{
                  echo "<p><strong> Local de vacinação: </strong> $local_vacinacao_3 </p>";
                }
              }

        echo "<hr>";
        echo "<h2 id='subtitlebeneficiario'>Informações da 4ª dose</h2>";

        if($data_de_vacinacao_4 == "0000-00-00" AND ($lote_4_dose == "" OR $lote_4_dose == NULL) AND ($vacina_4 == "Vacina" OR $vacina_4 == NULL) AND ($vacinador_4_dose == "Vacinador" OR $vacinador_4_dose == NULL) AND ($local_vacinacao_4 == "Local de vacinação" OR $local_vacinacao_4 == NULL)){
          echo "<p id='semRegistro'><strong> Aviso! </strong> Não foi cadastrada nenhuma informação</p>";
        }else{

              if($data_de_vacinacao_4 == "0000-00-00"){
                echo "<p> <strong> Data de vacinação: </strong> Sem cadastro</p>";
              }else{
                echo "<p> <strong> Data de vacinação: </strong> $data_de_vacinacao_4_convert </p>";
              }

              if($lote_4_dose == ""){
                echo "<p><strong>Lote: </strong> Sem cadastro";
              }else{
                echo "<p><strong>Lote: </strong> $lote_4_dose </p>";
              }

                if($vacina_4 == "Vacina"){
                  echo "<p><strong>Vacina: </strong> Sem cadastro</p>";
                }else{
                  echo "<p><strong>Vacina: </strong> $vacina_4 </p>";
                }

                if($vacinador_4_dose == "Vacinador"){
                  echo "<p><strong>Vacinador: </strong> Sem cadastro</p>";
                }else{
                  echo "<p><strong>Vacinador: </strong> $vacinador_4_dose </p>";
                }

                if($local_vacinacao_4 == "Local de vacinação" OR $local_vacinacao_4 == NULL){
                  echo "<p><strong> Local de vacinação: </strong> Sem cadastro</p>";
                }else{
                  echo "<p><strong> Local de vacinação: </strong> $local_vacinacao_4 </p>";
                }
              }
        }
    
    ?>

<?php } ?>

  <h2 id='subtitlebeneficiario' style="margin-top: 30px">Observações: </h2>
  <?php
  if($observacao == NULL || $observacao == ""){
    echo "<p> Sem observações.</p>";
  }else{
    echo "<p>" . $observacao . "</p>";
  }

  ?>

<a style="margin-bottom: 20px;" href="listavacinados.php" class="btn btn-primary" role="button"><i class="fas fa-arrow-left"></i></a>

</section>

<!-- FOOTER -->

<?php 
include_once 'footer.html';
?>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

</body>
</html>