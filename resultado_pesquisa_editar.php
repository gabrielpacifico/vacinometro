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
  <title>Resultado da pesquisa</title>
  
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

<section class="container" id="resultpesquisa">

    <center>
    <h1 id="titlepesq">Resultado da pesquisa por filtros</h1>
    </center>
    
    <div class="container">
      <div class="table-responsive">
      <table id="tablepesq" class="table table-hover table-bordered">
        <thead>
          <tr>
            <th scope="col">Nome/Idade</th>
            <th scope="col">Categoria/Dose</th>
            <th scope="col">UBS</th>
          </tr>
        </thead>    

        <?php
        
        include 'conexao.php';
          
             /** vai pegar a página atual pelo GET */
          $pag = (isset($_GET['pagina']))?$_GET['pagina'] : 1;

          $sql = "SELECT * FROM `beneficiarios` ORDER BY `data_de_vacinacao` DESC";
          $buscar = mysqli_query($conexao, $sql);

            /** Variável que vai definir quantos registros por página = 20 */
          $reg_por_pag = "30";

          $total_registros = mysqli_num_rows($buscar);
          $total_paginas = ceil($total_registros/$reg_por_pag);

          /** Define a página que sempre vai começar sendo exibida, no caso sempre a primeira */
          $inicio = ($reg_por_pag * $pag) - $reg_por_pag;

          /** Vai definir o limite de registros que irão ser exibidos */
          $limite = mysqli_query($conexao, "$sql LIMIT $inicio, $reg_por_pag");


            $links_laterais = 5;
            
            // variáveis para o loop
            $inicio2 = $pag - $links_laterais;
            $limite2 = $pag + $links_laterais;

          /** Variáveis para os botões de próximo e anterior */
          $anterior = $pag -1;
          $proximo = $pag +1;

          $beneficiario = mysqli_real_escape_string($conexao, $_GET['buscanome']);
          $cpf_beneficiario = mysqli_real_escape_string($conexao, $_GET['buscacpf']);
          $sus_beneficiario = mysqli_real_escape_string($conexao, $_GET['buscasus']);
          $datavac_beneficiario = mysqli_real_escape_string($conexao, $_GET['datavac']);
          $ubs_beneficiario = mysqli_real_escape_string($conexao, $_GET['buscaubs']);
      
      /** SISTEMA PARA QUANDO TODOS OS CAMPOS ESTIVEREM VAZIOS */

      if(empty($_GET['buscanome']) AND empty($_GET['buscacpf']) AND empty($_GET['buscasus']) AND empty($_GET['datavac']) AND empty($_GET['buscaubs'])){
        echo "<style> 
              footer#footer{
              display: block;
              position: absolute;
              bottom: 0;
              width: 100%;
              }
              table{
                display: none;
              }
              nav{
                display: none;
              }
              a#btn-hidden{
                display: none;
              }
              div#registros_total{
                display: none;
              }
              a#voltar{
                margin-top: 30px;
              }
              </style>";
          echo '<div class="alert alert-danger d-flex align-items-center" id="aviso2" role="alert">
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">
            <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
          </svg>
          <div>
          Campos de pesquisa vazios, tente novamente.
          </div>
        </div>';
            }else{

              $query = "SELECT * FROM beneficiarios WHERE ";

            // PESQUISA COM BENEFICIÁRIO E UNIDADE DE SAÚDE JUNTOS
            if ($beneficiario != "" || $beneficiario != NULL AND $ubs_beneficiario != "" || $ubs_beneficiario != NULL) {
              $result_geral = $query . "(beneficiario LIKE '%$beneficiario%') AND (local_vacinacao = '$ubs_beneficiario' OR local_vacinacao_2 = '$ubs_beneficiario'
             OR local_vacinacao_3 = '$ubs_beneficiario' OR local_vacinacao_4 = '$ubs_beneficiario')";
            } elseif ($ubs_beneficiario != "" || $ubs_beneficiario != NULL) {
              $result_geral = $query . "local_vacinacao = '$ubs_beneficiario' OR local_vacinacao_2 = '$ubs_beneficiario'
               OR local_vacinacao_3 = '$ubs_beneficiario' OR local_vacinacao_4 = '$ubs_beneficiario'";
            } elseif ($beneficiario != "" || $beneficiario != NULL) { // Se apenas beneficiário existir, faça.
              $result_geral = $query . "beneficiario LIKE '%$beneficiario%' ";
            }

            // PESQUISA COM DATA DE VACINAÇÃO, BENFICIARIO E OU UNIDADE DE SAÚDE JUNTOS.
            if ($beneficiario != "" || $beneficiario != NULL AND $datavac_beneficiario != "" || $datavac_beneficiario != NULL) { // Se beneficiário existir e data de vacinação existir, faça.
              $result_geral = $query . "(beneficiario LIKE '%$beneficiario%') AND (data_de_vacinacao = '$datavac_beneficiario' 
                OR data_de_vacinacao_2 = '$datavac_beneficiario' OR data_de_vacinacao_3 = '$datavac_beneficiario' OR data_de_vacinacao_4 = '$datavac_beneficiario') ";
            }elseif($datavac_beneficiario != "" || $datavac_beneficiario != NULL AND $ubs_beneficiario != "" || $ubs_beneficiario != NULL){
              $result_geral = $query . "(local_vacinacao = '$ubs_beneficiario' OR local_vacinacao_2 = '$ubs_beneficiario'
              OR local_vacinacao_3 = '$ubs_beneficiario' OR local_vacinacao_4 = '$ubs_beneficiario') AND (data_de_vacinacao = '$datavac_beneficiario' OR data_de_vacinacao_2 = '$datavac_beneficiario'
                OR data_de_vacinacao_3 = '$datavac_beneficiario' OR data_de_vacinacao_4 = '$datavac_beneficiario') ";
            } elseif ($datavac_beneficiario != "" || $datavac_beneficiario != NULL) { // Se apenas a data de vacinação existir, faça.
              $result_geral = $query . "(data_de_vacinacao = '$datavac_beneficiario' OR data_de_vacinacao_2 = '$datavac_beneficiario'
                OR data_de_vacinacao_3 = '$datavac_beneficiario' OR data_de_vacinacao_4 = '$datavac_beneficiario') ";
            }

            if ($cpf_beneficiario != "" || $cpf_beneficiario != NULL) { // Se apenas o cpf existir, faça.
              $result_geral = $query . "cpfbeneficiario LIKE '$cpf_beneficiario' ";
            }
            if ($sus_beneficiario != "" || $sus_beneficiario != NULL) { // Se apenas o cartão do sus existir, faça.
              $result_geral = $query . "susbeneficiario LIKE '$sus_beneficiario' ";
            }

              $result_geral = mysqli_query($conexao, $result_geral);
          
              $rows = mysqli_num_rows($result_geral);
          
          if($rows == 0){
            echo '<div class="alert alert-danger d-flex align-items-center" id="aviso" role="alert">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">
              <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
            </svg>
            <div>
            Nenhum beneficiário foi encontrado.
            </div>
          </div>';
          echo "<style>
            table{
              display: none;
            }
            nav{
              display: none;
            }
            a#btn-hidden{
              display: none;
            }
            div#registros_total{
              display: none;
            }
            a#voltar{
              margin-top: 30px;
            }
          </style>";
          }
          ?>

          <?php
            // CONDICIONAL PARA QUANDO HOUVER MENOS DE 10 REGISTROS, NÃO APARECER O BOTÃO DE VOLTAR NO COMEÇO DA PÁGINA
            if($rows > 10){
              echo '<a href="listavacinados_editar.php" class="btn btn-primary" role="button" id="btn-hidden"><i class="fas fa-arrow-left"></i></a>';
            
            }
          ?>

          <div id="registros_total" class="text-end">
            <h3 id="quantregistros">Foram encontrados: <?php echo $rows; ?> registros.</h3>
          </div>
        <?php

                while($array = mysqli_fetch_array($result_geral)){
                    $id_beneficiarios = $array['id_beneficiarios'];
                    $beneficiario = $array['beneficiario'];
                    $cpf_beneficiario = $array['cpfbeneficiario'];
                    $sus_beneficiario = $array['cpfbeneficiario'];
                    $buscar_idade = $array['idade'];
                    $buscar_categoria = $array['categoria'];
                    $buscar_unidade = $array['local_vacinacao'];
                    $buscar_unidade_2 = $array['local_vacinacao_2'];
                    $buscar_unidade_3 = $array['local_vacinacao_3'];
                    $buscar_unidade_4 = $array['local_vacinacao_4'];
                    $buscar_dose = $array['dose'];

                    if($rows <= 30){
                      echo "<style>
                        .pagination{
                          display: none;
                        }
                      </style>";
                    }else{
                      
                    }
                

              ?>

        <tbody>
          <tr onclick="location.href='editar_beneficiario.php?id=<?php echo $id_beneficiarios ?>'" style="cursor: pointer;">
            <td> <?php echo $beneficiario ?> <br> Idade: <?php echo $buscar_idade ?> </td>
            <td> <?php echo $buscar_categoria ?> <br> Dose: <?php echo $buscar_dose ?></td>
            <td><?php  
            if ($buscar_unidade_4 == NULL || $buscar_unidade_4 == "Local de vacinação") {
              echo "";
            } elseif ($buscar_unidade_4 != NULL || $buscar_unidade_4 != "Local de vacinação") {
              echo $buscar_unidade_4;
            }

            if ($buscar_unidade_4 == NULL || $buscar_unidade_4 == "Local de vacinação") {
              if ($buscar_unidade_3 == NULL || $buscar_unidade_3 == "Local de vacinação") {
                echo "";
              } elseif ($buscar_unidade_3 != NULL || $buscar_unidade_3 != "VLocal de vacinação") {
                echo $buscar_unidade_3;
              }
            }

            if ($buscar_unidade_3 == NULL || $buscar_unidade_3 == "Local de vacinação" AND $buscar_unidade_4 == NULL || $buscar_unidade_4 == "Local de vacinação") {
              if ($buscar_unidade_2 == NULL || $buscar_unidade_2 == "Local de vacinação") {
                echo "";
              } elseif ($buscar_unidade_2 != NULL || $buscar_unidade_2 != "Local de vacinação") {
                echo $buscar_unidade_2;
              }
            }

            if ($buscar_unidade_2 == NULL || $buscar_unidade_2 == "Local de vacinação" AND $buscar_unidade_3 == NULL || $buscar_unidade_3 == "Local de vacinação") {
              if ($buscar_unidade == NULL || $buscar_unidade == "Local de vacinação") {
                echo "";
              } elseif ($buscar_unidade != NULL || $buscar_unidade != "Local de vacinação") {
                echo $buscar_unidade;
              }
            }
            ?>
              </td>
            <?php
            }
            } 
            ?> 
          </tr>
        </tbody>
      </table>

      <nav style="float: right; background: none;" aria-label="Page navigation">
  <ul class="pagination">
    <?php
    if($pag >1){
    
    ?>
    <li class="page-item">
      <a class="page-link" href="?pagina=<?php echo $anterior; ?>&buscanome=<?php echo $beneficiario; ?>&buscacpf=<?php echo $cpf_beneficiario; ?>&buscasus=<?php echo $sus_beneficiario; ?>" aria-label="Previous">
        <span aria-hidden="true">&laquo;</span>
      </a>
    </li>
    <?php } ?>
  

    <?php 
    for ($i = $inicio2; $i <= $limite2; $i++)
    {
     if ($i == $pag)
     {
      echo "<li class='page-item active'><a class='page-link' href='?pagina=$i&buscanome=$beneficiario&buscacpf=$cpf_beneficiario&buscasus=$sus_beneficiario'>$i</a></li>";
     }
     else
     {
      if ($i >= 1 && $i <= $total_paginas)
      {
       echo "<li class='page-item'><a class='page-link' href='?pagina=$i&buscanome=$beneficiario&buscacpf=$cpf_beneficiario&buscasus=$sus_beneficiario'>$i</a></li>";
      }
     }
    }
    ?>


    <?php 
    if($pag < $total_paginas){

    ?>
    <li class="page-item">
      <a class="page-link" href="?pagina=<?php echo $proximo;?>&buscanome=<?php echo $beneficiario; ?>&buscacpf=<?php echo $cpf_beneficiario; ?>&buscasus=<?php echo $sus_beneficiario; ?>" aria-label="Next">
        <span aria-hidden="true">&raquo;</span>
      </a>
    </li>
    <?php } ?>
  </ul>
</nav>
  <a href="listavacinados_editar.php" class="btn btn-primary" role="button"><i class="fas fa-arrow-left"></i></a>
    </div>
  </div>

</section>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

</body>
</html>