<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Entrada de vacinas</title>
  
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

  <section class="container" id="entradadevacinas">

    <center>
    <h1 id="titleentrada">Todas as movimentações de entrada da vacina</h1>
    </center>

    <div class="container"> 
      <h2 id="subtitleentrada"><i class="far fa-calendar-check"></i>&nbsp;Registros de entradas de vacinas a partir de 2021.</h2>
    </div>
  
    
    <div class="container">
      <div class="table-responsive">
    <table id="tableentrada" class="table table-hover table-bordered">
      <thead>
        <tr>
          <th scope="col">Data</th>
          <th scope="col">Nota fiscal</th>
          <th scope="col">Descrição</th>
          <th scope="col">Vacina</th>
          <th scope="col">Lote</th>
          <th scope="col">Validade</th>
          <th scope="col">Quantidade</th>
          <th scope="col">Total</th>
        </tr>
      </thead>
      <?php 

      /** BARRA DE PAGINAÇÃO DA TABELA */
      
      include 'conexao.php';
      
      /** vai pegar a página atual pelo GET */
      $pag = (isset($_GET['pagina']))?$_GET['pagina'] : 1;

      $sql = "SELECT * FROM `entrada` ORDER BY `data_entr` DESC";
      $buscar = mysqli_query($conexao, $sql);

      /** Variável que vai definir quantos registros por página = 20 */
      $reg_por_pag = "30";

      $total_registros = mysqli_num_rows($buscar);
      $total_paginas = ceil($total_registros/$reg_por_pag);

      /** Define a página que sempre vai começar sendo exibida, no caso sempre a primeira */
      $inicio = ($reg_por_pag * $pag) - $reg_por_pag;

      /** Vai definir o limite de registros que irão ser exibidos */
      $limite = mysqli_query($conexao, "$sql LIMIT $inicio, $reg_por_pag");

      /** Variáveis para os botões de próximo e anterior */
      $anterior = $pag -1;
      $proximo = $pag +1;

      while ($array = mysqli_fetch_array($limite)){
          $data = $array['data_entr'];
          $data_convert = date('d/m/Y', strtotime($data));
          $nota_fiscal = $array['nota_fiscal'];
          $descri = $array['descri'];
          $fabricante = $array['fabricante'];
          $validade = $array['validade'];
          $validade_convert = date('d/m/Y', strtotime($validade));
          $quant = $array['quant'];
          $lote = $array['lote'];

      ?>
      <tbody>
        <tr>
  
          <td> <?php echo $data_convert ?> </td>
          <td> <?php echo $nota_fiscal ?> </td>
          <td> <?php echo $descri?> </td>
          <td> <?php echo $fabricante?> </td>
          <td> <?php echo $lote?> </td>
          <td> <?php echo $validade_convert?> </td>
          <td> <?php echo $quant?> </td>
        <?php } ?>
          <td>  <?php 
           include_once('conexao.php');
           $codesql = "SELECT SUM(quant) AS quant_total FROM `entrada`";
           $result = mysqli_query($conexao, $codesql);
           
           while($quant = mysqli_fetch_assoc($result)){
               $quantidade = $quant['quant_total'];
               echo $quantidade;
           }
        ?> </td>
        </tr>
        
    </table>
    
    <nav style="float: right; background: none;" aria-label="Page navigation">

  <ul class="pagination">
    <?php
    if($pag >1){
    
    ?>
    
    <li class="page-item">
      <a class="page-link" href="?pagina=<?php echo $anterior; ?>" aria-label="Previous">
        <span aria-hidden="true">&laquo;</span>
      </a>
    </li>
    <?php } ?>
  

    <?php 
    for($i = 1; $i <= $total_paginas; $i++){
      if($pag == $i){
        echo "<li class='page-item active'><a class='page-link' href='?pagina=$i'>$i</a></li>";
      }else{
        echo "<li class='page-item'><a class='page-link' href='?pagina=$i'>$i</a></li>";
      }
    }
    ?>

    <?php 
    if($pag < $total_paginas){

    ?>
    <li class="page-item">
      <a class="page-link" href="?pagina=<?php echo $proximo;?>" aria-label="Next">
        <span aria-hidden="true">&raquo;</span>
      </a>
    </li>
    <?php } ?>
  </ul>
</nav>

  <a href="vacinometro.php" class="btn btn-primary" role="button"><i class="fas fa-arrow-left"></i></a>
  </div>
</div>

  </section>

<!-- FOOTER -->

<?php 
include_once 'footer.html';
?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

</body>
</html>