<?php

session_start();

$usuario = $_SESSION['usuario'];

if (!isset($_SESSION['usuario'])) {
  header('Location: login.php');
}

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title> Vacinômetro - Edição de vacinados</title>
  <link rel="shortcut icon" type="image/png" href="img/favicon.png">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css">
  <link rel="stylesheet" href="styles.css">

</head>

<body>

  <section id="navtop">
    <div class="container">
      <strong>
        <a href="https://www.independencia.ce.gov.br/" target="_blank">
          <h1>Governo municipal de Independência</h1>
        </a>
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
      <a href="logout.php" role="button" class="btn btn-sm btn-danger text-end" style="color: white;"><i class="fas fa-power-off"></i> Logout</a>
    </div>
  </nav>

  <!-- Barra de navegação acima -->

  <section class="container" id="listadevacinados">

    <center>
      <h1 id="titlevacinados">Edição dos vacinados contra a Covid-19</h1>
    </center>
    <a style="margin-bottom: 20px;" href="cadastro_geral.php" class="btn btn-primary" role="button"><i class="fas fa-arrow-left"></i></a>

    <div class="container">
      <h2 id="subtitleentrada"><i class="fas fa-search"></i>&nbsp;Caso queira buscar por alguém em específico, use nossos filtros de pesquisa.</h2>
    </div>

    <!-- Busca por filtros -->

    <section id="secbuscar" class="container">
      <form method="GET" action="resultado_pesquisa_editar.php">
        <div class="row" id="listavacinados">
          <div class="col" id="ben">
            <label>Beneficiário</label>
            <input type="text" name="buscanome" placeholder="Nome" class="form-control" autocomplete="off">
          </div>

          <div class="col" id="cpf">
            <label>CPF</label>
            <input type="text" name="buscacpf" placeholder="CPF" autocomplete="off" class="form-control">
          </div>

          <div class="col" id="sus">
            <label>Cartão do SUS</label>
            <input type="text" name="buscasus" placeholder="Nº do cartão do SUS" autocomplete="off" class="form-control">
          </div>

          <div class="col" id="ubs">
            <label>Local de vacinação</label>
            <select name="buscaubs" class="form-select">
              <option value="">Unidade de saúde</option>
              <?php

              include_once('conexao.php');
              $busca_uniatend = "SELECT * FROM `unidades`";
              $result_uni = mysqli_query($conexao, $busca_uniatend);

              while ($array = mysqli_fetch_assoc($result_uni)) {
                $id_unidade = $array['id_unidade'];
                $unidade = $array['unidade'];
                echo "<option value='$unidade'>$unidade</option>";
              }

              ?>
            </select>
          </div>

          <div class="col" id="data">
            <label> Data de vacinação</label>
            <input type="date" name="datavac" autocomplete="off" class="form-control">
          </div>

        </div>
        </div>
        <br>

        <div class="col justify-content-start">
          <button type="submit" class="btn btn-primary">Pesquisar</button>
        </div>

        <!--
        <div class="col justify-content-start" style="margin-top: 30px;" id="down">
            <a download="Registro vacinados da Covid-19" target="_blank" class="btn btn-success" href="createpdf.php"><i class="fas fa-file-alt"></i>&nbsp;Fazer o download do arquivo PDF</a>
          </div>  
        </div>
        -->
        <?php

        /** EXIBINDO A QUANTIDADE DE REGISTROS ENCONTRADOS */
        include_once('conexao.php');
        $quant_registros = "SELECT count(distinct beneficiario) as beneficiario from beneficiarios";
        $registos_result = mysqli_query($conexao, $quant_registros);

        while ($row = mysqli_fetch_array($registos_result)) {
          $resultado_registros = $row['beneficiario'];

        ?>

          <div id="registros_total" class="text-end">
            <h3 id="quantregistros">Foram encontrados: <?php echo $resultado_registros; ?> registros.</h3>

          <?php } ?>

          </div>

      </form>

    </section>

    <div class="container">
      <div class="table-responsive">
        <table id="tablevacinados" class="table table-hover table-bordered">
          <thead>
            <tr>
              <th scope="col">Nome/Idade</th>
              <th scope="col">Categoria</th>
              <th scope="col">Vacina/Dose</th>
            </tr>
          </thead>
          <?php

          include 'conexao.php';

            /** vai pegar a página atual pelo GET */
            $pag = (isset($_GET['pagina']))?$_GET['pagina'] : 1;

            $sql = "SELECT * FROM `beneficiarios` ORDER BY data_de_vacinacao OR data_de_vacinacao_2 OR data_de_vacinacao_3 OR data_de_vacinacao_4 DESC";
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


          while ($array = mysqli_fetch_array($limite)) {
            $id_beneficiarios = $array['id_beneficiarios'];
            $beneficiario = $array['beneficiario'];
            $categoria = $array['categoria'];
            $idade = $array['idade'];
            $vacina = $array['vacina'];
            $vacina_2 = $array['vacina_2'];
            $vacina_3 = $array['vacina_3'];
            $vacina_4 = $array['vacina_4'];
            $dose = $array['dose'];

          ?>

            <tbody>
              
              <tr onclick="location.href='editar_beneficiario.php?id=<?php echo $id_beneficiarios ?>'" style="cursor: pointer;">
                <td> <?php echo $beneficiario ?> <br> Idade: <?php echo $idade ?> </td>
                <td> <?php echo $categoria ?> </td>
                <td>
                  <?php
                  if ($vacina_4 == NULL || $vacina_4 == "Vacina") {
                    echo "";
                  } elseif ($vacina_4 != NULL || $vacina_4 != "Vacina") {
                    echo $vacina_4;
                  }

                  if ($vacina_4 == NULL || $vacina_4 == "Vacina") {
                    if ($vacina_3 == NULL || $vacina_3 == "Vacina") {
                      echo "";
                    } elseif ($vacina_3 != NULL || $vacina_3 != "Vacina") {
                      echo $vacina_3;
                    }
                  }

                  if ($vacina_3 == NULL || $vacina_3 == "Vacina") {
                    if ($vacina_2 == NULL || $vacina_2 == "Vacina") {
                      echo "";
                    } elseif ($vacina_2 != NULL || $vacina_2 != "Vacina") {
                      echo $vacina_2;
                    }
                  }

                  if ($vacina_2 == NULL || $vacina_2 == "Vacina") {
                    if ($vacina == NULL || $vacina == "Vacina") {
                      echo "";
                    } elseif ($vacina != NULL || $vacina != "Vacina") {
                      echo $vacina;
                    }
                  }
                  ?>
                  <br> Dose:

                  <?php echo $dose ?>
                </td>

              </tr>

            <?php } ?>

            </tbody>
        </table>
        <nav style="float: right; background: none;" aria-label="Page navigation">
          <ul class="pagination">
            <?php
            if ($pag > 1) {

            ?>
              <li class="page-item">
                <a class="page-link" href="?pagina=<?php echo $anterior; ?>" aria-label="Previous">
                  <span aria-hidden="true">&laquo;</span>
                </a>
              </li>
            <?php } ?>


            <?php
            for ($i = $inicio2; $i <= $limite2; $i++) {
              if ($i == $pag) {
                echo "<li class='page-item active'><a class='page-link' href='?pagina=$i'>$i</a></li>";
              } else {
                if ($i >= 1 && $i <= $total_paginas) {
                  echo "<li class='page-item'><a class='page-link' href='?pagina=$i'>$i</a></li>";
                }
              }
            }
            ?>


            <?php
            if ($pag < $total_paginas) {

            ?>
              <li class="page-item">
                <a class="page-link" href="?pagina=<?php echo $proximo; ?>" aria-label="Next">
                  <span aria-hidden="true">&raquo;</span>
                </a>
              </li>
            <?php } ?>
          </ul>
        </nav>
        <a href="cadastro_geral.php" class="btn btn-primary" role="button"><i class="fas fa-arrow-left"></i></a>
      </div>
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