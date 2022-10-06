<?php
session_start();
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];


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
  <title> Vacinômetro - Cadastro geral </title>
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

  <section class="container" id="cadastro">
    <center>
      <h1 id="areacadastro">Área de cadastro geral do vacinômetro de Independência/CE</h1>
    </center>

    <h2 id="subtitlecadastro"><i class="fas fa-user-plus"></i>&nbsp; O que deseja cadastrar? Clique na opção desejada e realize o cadastro rapidamente.</h2>
    <center>
      <div class="row" id="cadastro_geral">
        <div class="col">
          <a href="cadastro_vacinas.php">
            <div id="cardcadastro1">
              <h2 id="iconscadastro"><i class="fas fa-syringe"></i></h2>
              <h1 id="cadastro">Cadastrar a quantidade de vacinas recebidas e doses aplicadas</h1>
          </a>
        </div>
      </div>

      <div class="col">
        <a href="cadastro_entradas.php">
          <div id="cardcadastro2">
            <center>
              <h2 id="iconscadastro"><i class="fas fa-box"></i></h2>
              <h1 id="cadastro">Cadastrar a entrada de vacinas</h1>
        </a>
    </center>
    </div>
    </div>

    <div class="col">
      <a href="cadastro_vacinados.php">
        <div id="cardcadastro3">
          <h2 id="iconscadastro"><i class="fas fa-user-plus"></i></h2>
          <h1 id="cadastro">Cadastrar os vacinados contra a Covid-19</h1>
      </a>
    </div>
    </div>

    <div class="col">
      <a href="listavacinados_editar.php">
        <div id="cardcadastro4">
          <center>
            <h2 id="iconscadastro"><i class="fas fa-user-edit"></i></h2>
            <h1 id="cadastro">Editar beneficiários já cadastrados</h1>
      </a>
      </center>
    </div>
    </div>

    <?php

    // SISTEMA PARA EXIBIR BOTÃO DE ACEITAR USUÁRIOS APENAS PARA ADMINISTRADORES

    include_once('conexao.php');

    $consult = "SELECT * FROM usuarios WHERE usuario = '$usuario' AND senha = '$senha' AND stats = 'Ativo'";
    $result_consult = mysqli_query($conexao, $consult);

    while ($row = mysqli_fetch_assoc($result_consult)) {
      $usuario = $row['usuario'];
      $senha = $row['senha'];
      $stats = $row['stats'];
      $cargo = $row['cargo'];
    }

    if ($cargo == "Administrador") {
      echo
      "<div class='col'>
                    <a href='acesso_usuarios.php'><div id='cardcadastro5'>
                      <h2 id='iconscadastro'><i class='fas fa-user-check'></i></h2>
                      <h1 id='cadastro'>Aprovar ou reprovar novos administradores no sistema</h1></a>
                </div>
              </div>
              
              <div class='col'>
            <a href='cadastro_vacinador.php'><div id='cardcadastro7'>
                <h2 id='iconscadastro'><i class='fas fa-user-nurse'></i></h2>
                <h1 id='cadastro'>Cadastrar novos vacinadores</h1></a>
            </div>
          </div>";
    }
    if ($cargo == "Operador") {
    }

    ?>

    </div>

  </section>
  </center>
  <center>
    <div class="container">
      <h1 id="moreinfo">Informações atuais obtidas do sistema</h1>
    </div>
  </center>

  <?php

  include_once 'conexao.php';

  $sql = "SELECT * FROM `vacinas`";
  $busca = mysqli_query($conexao, $sql);

  while ($array = mysqli_fetch_array($busca)) {
    $vacinas_recebidas = $array['vacinas_recebidas'];
    $doses_aplicadas = $array['doses_aplicadas'];
    $primeira_dose = $array['primeira_dose'];
    $segunda_dose = $array['segunda_dose'];
    $terceira_dose = $array['terceira_dose'];
    $quarta_dose = $array['quarta_dose'];
    $dose_unica = $array['dose_unica'];
    $porcent = ($doses_aplicadas * 100 / $vacinas_recebidas);
    /** % de vacinas aplicadas */

  ?>

    <section>
      <div id="welcome" class="container">
        <center>
          <h1 style="margin-top:20px" id="bemv">Bem vindos ao vacinômetro da prefeitura de Independência</h1>
        </center>
        <div style="margin-top: 30px" class="row">
          <div class="col-sm">
            <h2 id="card">Quantidade de Vacinas recebidas:</h2>
            <div id="vac">
              <h1 id="vac"><?php echo $vacinas_recebidas ?></h1>
            </div>
          </div>
          <div class="col-sm">
            <?php

            // SELECT E UPDATE DE TODAS AS *PRIMEIRAS DOSES* COM BASE NA DATA DE VACINAÇÃO
            $count = "SELECT COUNT(*) as primeira_dose FROM beneficiarios WHERE data_de_vacinacao != '0000-00-00'";
            $res = mysqli_query($conexao, $count);
            while ($a = mysqli_fetch_assoc($res)) {
              $primeira = $a['primeira_dose'];
            }

            $update1 = "UPDATE vacinas SET primeira_dose = $primeira";
            $query = mysqli_query($conexao, $update1);
            // echo $primeira . "<br>";

            // SELECT E UPDATE DE TODAS AS *SEGUNDAS DOSES* COM BASE NA DATA DE VACINAÇÃO
            $count = "SELECT COUNT(*) as segunda_dose FROM beneficiarios WHERE data_de_vacinacao_2 != '0000-00-00'";
            $res = mysqli_query($conexao, $count);
            while ($a = mysqli_fetch_assoc($res)) {
              $segunda = $a['segunda_dose'];
            }

            $update2 = "UPDATE vacinas SET segunda_dose = $segunda";
            $query = mysqli_query($conexao, $update2);
            // echo $segunda . "<br>";

            // SELECT E UPDATE DE TODAS AS *TERCEIRAS DOSES* COM BASE NA DATA DE VACINAÇÃO
            $count = "SELECT COUNT(*) as terceira_dose FROM beneficiarios WHERE data_de_vacinacao_3 != '0000-00-00'";
            $res = mysqli_query($conexao, $count);
            while ($a = mysqli_fetch_assoc($res)) {
              $terceira = $a['terceira_dose'];
            }

            $update3 = "UPDATE vacinas SET terceira_dose = $terceira";
            $query = mysqli_query($conexao, $update3);
            // echo $terceira . "<br>";

            // SELECT E UPDATE DE TODAS AS *QUARTAS DOSES* COM BASE NA DATA DE VACINAÇÃO
            $count = "SELECT COUNT(*) as quarta_dose FROM beneficiarios WHERE data_de_vacinacao_4 != '0000-00-00'";
            $res = mysqli_query($conexao, $count);
            while ($a = mysqli_fetch_assoc($res)) {
              $quarta = $a['quarta_dose'];
            }

            $update4 = "UPDATE vacinas SET quarta_dose = $quarta";
            $query = mysqli_query($conexao, $update4);
            // echo $quarta . "<br>";

            // SELECT E UPDATE DE TODAS AS *DOSES UNICAS* COM BASE NA DATA DE VACINAÇÃO
            $count = "SELECT COUNT(*) as dose_unica FROM beneficiarios WHERE dose = 'Dose única' OR dose = 'Dose única + reforço'";
            $res = mysqli_query($conexao, $count);
            while ($a = mysqli_fetch_assoc($res)) {
              $unica = $a['dose_unica'];
            }

            $update_unica = "UPDATE vacinas SET dose_unica = $unica";
            $query = mysqli_query($conexao, $update_unica);
            // echo $unica . "<br>";

            // SOMA E UPDATE DE TODAS AS DOSES APLICADAS
            $sum = ($primeira + $segunda + $terceira + $quarta + $unica);
            $update_total = "UPDATE vacinas SET doses_aplicadas = $sum";
            $query = mysqli_query($conexao, $update_total);
            ?>
            <h2 id="card">Quantidade de doses aplicadas:</h2>
            <div id="vac1">
              <h1 id="vac1"><?php echo $doses_aplicadas ?></h1>
            </div>
          </div>
          <div class="col-sm">
            <h2 id="card">Das doses foram aplicadas:</h2>
            <div id="vac2">
              <h1 id="vac2">&nbsp;&nbsp;<?php echo mb_strimwidth($porcent, 0, 5) ?>%</h1>
            </div>
          </div>
        </div>
        <div class="container">
          <div class="row">
            <div class="col-md" id="dose1">
              <h1>Primeira dose: <?php echo $primeira_dose ?>&nbsp;<i class="fas fa-syringe"></i> </h1>
            </div>
            <div class="col-md" id="dose2">
              <h1>Segunda dose: <?php echo $segunda_dose ?>&nbsp;<i class="fas fa-syringe"></i> </h1>
            </div>
            <div class="col-md" id="dose3">
              <h1>Terceira dose: <?php echo $terceira_dose ?>&nbsp;<i class="fas fa-syringe"></i> </h1>
            </div>
            <div class="col-md" id="dose3">
              <h1>Quarta dose: <?php echo $quarta_dose ?>&nbsp;<i class="fas fa-syringe"></i> </h1>
            </div>
            <div class="col-md" id="dose4">
              <h1>&nbsp;Dose única: <?php echo $dose_unica ?>&nbsp;<i class="fas fa-syringe"></i> </h1>
            </div>
          </div>
          <!-- Ultimas vacinas aplicadas -->

          <div id="lastvac">

            <?php

            $biggest = "SELECT GREATEST(MAX(data_de_vacinacao), MAX(data_de_vacinacao_2), MAX(data_de_vacinacao_3), MAX(data_de_vacinacao_4)) as vacina FROM beneficiarios";
            $res = mysqli_query($conexao, $biggest);
            while ($array = mysqli_fetch_assoc($res)) {
              $ult_vacina = $array['vacina'];
            }
            $res_ult_vacina = date('d/m/Y', strtotime($ult_vacina));
            /** Data da última vacina aplicada convertida pra BR */

            ?>

            Última vacina aplicada: <?php echo $res_ult_vacina ?>

          </div>


          <div id="lastvac2">

            <?php

            $biggest = "SELECT MAX(data_entr) as entrada FROM entrada";
            $res = mysqli_query($conexao, $biggest);
            while ($array = mysqli_fetch_assoc($res)) {
              $ult_entrada = $array['entrada'];
            }
            $res_ult_entrada = date('d/m/Y', strtotime($ult_entrada));
            /** Data da última entrada de vacina convertida pra BR */
            ?>

            Último lote recebido: <?php echo $res_ult_entrada ?>

          </div>

    </section>

  <?php } ?>

  <!-- Categorias -->


  <h2 id="categorias">Estatísticas de vacinação por categorias</h2>

  <section class="container" id="cat">

    <?php
    /** IDOSOS 75 ANOS OU MAIS */

    $quant_categoria = "SELECT count(categoria) as categoria from beneficiarios where categoria = 'Idosos com 75 anos ou mais'";
    $categoria_result = mysqli_query($conexao, $quant_categoria);

    while ($array = mysqli_fetch_array($categoria_result)) {
      $resultado_idosos70 = $array['categoria'];

    ?>

      <div class="row justify-content-center">
        <div class="col-md-5" id="cardcat">
          <h2 id="cattext">Idosos com 75 anos ou mais: <?php echo $resultado_idosos70 ?> </h2>
        </div>

      <?php } ?>

      <?php
      /** IDOSOS 70 A 74 ANOS */

      $quant_categoria = "SELECT count(categoria) as categoria from beneficiarios where categoria = 'Idosos de 70 a 74 anos'";
      $categoria_result = mysqli_query($conexao, $quant_categoria);

      while ($array = mysqli_fetch_array($categoria_result)) {
        $resultado_idosos70_74 = $array['categoria'];

      ?>
        <div class="col-md-5" id="cardcat2">
          <h2 id="cattext">Idosos de 70 a 74 anos: <?php echo $resultado_idosos70_74 ?> </h2>
        </div>

      <?php } ?>

      <?php
      /** IDOSOS 65 A 69 ANOS */

      $quant_categoria = "SELECT count(categoria) as categoria from beneficiarios where categoria = 'Idosos de 65 a 69 anos'";
      $categoria_result = mysqli_query($conexao, $quant_categoria);

      while ($array = mysqli_fetch_array($categoria_result)) {
        $resultado_idosos65_69 = $array['categoria'];

      ?>
        <div class="col-md-5" id="cardcat3">
          <h2 id="cattext">Idosos de 65 a 69 anos: <?php echo $resultado_idosos65_69 ?> </h2>
        </div>

      <?php } ?>

      <?php
      /** IDOSOS 60 A 64 ANOS */

      $quant_categoria = "SELECT count(categoria) as categoria from beneficiarios where categoria = 'Idosos de 60 a 64 anos'";
      $categoria_result = mysqli_query($conexao, $quant_categoria);

      while ($array = mysqli_fetch_array($categoria_result)) {
        $resultado_idosos60_64 = $array['categoria'];

      ?>
        <div class="col-md-5" id="cardcat4">
          <h2 id="cattext">Idosos de 60 a 64 anos: <?php echo $resultado_idosos60_64 ?> </h2>
        </div>

      <?php } ?>

      <?php
      /** GESTANTES E PUÉRPERAS C/ COMORBIDADES (18-59) */

      $quant_categoria = "SELECT count(categoria) as categoria from beneficiarios where categoria = 'Gestantes e puerperas com comorbidades(18 a 59 anos)'";
      $categoria_result = mysqli_query($conexao, $quant_categoria);

      while ($array = mysqli_fetch_array($categoria_result)) {
        $resultado_gestantes = $array['categoria'];

      ?>
        <div class="col-md-5" id="cardcat5">
          <h2 id="cattext">Gestantes e puerperas com comorbidades(18 a 59 anos): <?php echo $resultado_gestantes ?> </h2>
        </div>

      <?php } ?>

      <?php
      /** DOENÇA RENAL CRÔNICA EM TRATAMENTO (18-59) */

      $quant_categoria = "SELECT count(categoria) as categoria from beneficiarios where categoria = 'Doença renal crônica em tratamento de diálise(18 a 59 anos)'";
      $categoria_result = mysqli_query($conexao, $quant_categoria);

      while ($array = mysqli_fetch_array($categoria_result)) {
        $resultado_renal = $array['categoria'];

      ?>
        <div class="col-md-5" id="cardcat6">
          <h2 id="cattext">Doença renal crônica em tratamento de diálise(18 a 59 anos): <?php echo $resultado_renal ?> </h2>
        </div>

      <?php } ?>

      <?php
      /** COMORBIDADES */

      $quant_categoria = "SELECT count(categoria) as categoria from beneficiarios where categoria = 'Comorbidades'";
      $categoria_result = mysqli_query($conexao, $quant_categoria);

      while ($array = mysqli_fetch_array($categoria_result)) {
        $resultado_comorbidades = $array['categoria'];

      ?>
        <div class="col-md-5" id="cardcat8">
          <h2 id="cattext">Comorbidades: <?php echo $resultado_comorbidades ?> </h2>
        </div>

      <?php } ?>

      <?php
      /** DEFICIENCIA PERMANENTE GRAVE */

      $quant_categoria = "SELECT count(categoria) as categoria from beneficiarios where categoria = 'Deficiencia permanente grave'";
      $categoria_result = mysqli_query($conexao, $quant_categoria);

      while ($array = mysqli_fetch_array($categoria_result)) {
        $resultado_defperm = $array['categoria'];

      ?>
        <div class="col-md-5" id="cardcat9">
          <h2 id="cattext">Deficiencia permanente grave: <?php echo $resultado_defperm ?> </h2>
        </div>

      <?php } ?>

      <?php
      /** SÍNDROME DE DOWN (18-59) */

      $quant_categoria = "SELECT count(categoria) as categoria from beneficiarios where categoria = 'Síndrome de down(18 a 59 anos)'";
      $categoria_result = mysqli_query($conexao, $quant_categoria);

      while ($array = mysqli_fetch_array($categoria_result)) {
        $resultado_down = $array['categoria'];

      ?>
        <div class="col-md-5" id="cardcat10">
          <h2 id="cattext">Síndrome de down(18 a 59 anos): <?php echo $resultado_down ?> </h2>
        </div>

      <?php } ?>

      <?php
      /** PROFISSIONAIS DA SAÚDE */

      $quant_categoria = "SELECT count(categoria) as categoria from beneficiarios where categoria = 'Profissionais da saúde'";
      $categoria_result = mysqli_query($conexao, $quant_categoria);

      while ($array = mysqli_fetch_array($categoria_result)) {
        $resultado_saude = $array['categoria'];

      ?>
        <div class="col-md-5" id="cardcat11">
          <h2 id="cattext">Profissionais da saúde: <?php echo $resultado_saude ?> </h2>
        </div>

      <?php } ?>

      <?php
      /** TRABALHADORES DA EDUCAÇÃO */

      $quant_categoria = "SELECT count(categoria) as categoria from beneficiarios where categoria = 'Trabalhadores da educação'";
      $categoria_result = mysqli_query($conexao, $quant_categoria);

      while ($array = mysqli_fetch_array($categoria_result)) {
        $resultado_edu = $array['categoria'];

      ?>
        <div class="col-md-5" id="cardcat13">
          <h2 id="cattext">Trabalhadores da educação: <?php echo $resultado_edu ?> </h2>
        </div>

      <?php } ?>

      <?php
      /** POPULAÇÃO EM GERAL */

      $quant_categoria = "SELECT count(categoria) as categoria from beneficiarios where categoria = 'População em geral'";
      $categoria_result = mysqli_query($conexao, $quant_categoria);

      while ($array = mysqli_fetch_array($categoria_result)) {
        $resultado_popgeral = $array['categoria'];

      ?>
        <div class="col-md-5" id="cardcat14">
          <h2 id="cattext">População em geral: <?php echo $resultado_popgeral ?> </h2>
        </div>

      <?php } ?>

      <?php
      /** ADOLESCENTES DE 12 A 17 ANOS */

      $quant_categoria = "SELECT count(categoria) as categoria from beneficiarios where categoria = 'Adolescentes de 12 a 17 anos'";
      $categoria_result = mysqli_query($conexao, $quant_categoria);

      while ($array = mysqli_fetch_array($categoria_result)) {
        $resultado_adoles = $array['categoria'];

      ?>
        <div class="col-md-5" id="cardcat15">
          <h2 id="cattext">Adolescentes de 12 a 17 anos: <?php echo $resultado_adoles ?> </h2>
        </div>

      <?php } ?>

      <?php
      /** CRIANÇAS DE 5 A 11 ANOS */

      $quant_categoria = "SELECT count(categoria) as categoria from beneficiarios where categoria = 'Crianças de 3 e 4 anos'";
      $categoria_result = mysqli_query($conexao, $quant_categoria);

      while ($array = mysqli_fetch_array($categoria_result)) {
        $resultado_crian_1 = $array['categoria'];

      ?>
        <div class="col-md-5" id="cardcat18">
          <h2 id="cattext">Crianças de 3 e 4 anos: <?php echo $resultado_crian_1 ?> </h2>
        </div>

      <?php } ?>

      <?php
      /** CRIANÇAS DE 5 A 11 ANOS */

      $quant_categoria = "SELECT count(categoria) as categoria from beneficiarios where categoria = 'Crianças de 5 a 11 anos'";
      $categoria_result = mysqli_query($conexao, $quant_categoria);

      while ($array = mysqli_fetch_array($categoria_result)) {
        $resultado_crian = $array['categoria'];

      ?>
        <div class="col-md-5" id="cardcat16">
          <h2 id="cattext">Crianças de 5 a 11 anos: <?php echo $resultado_crian ?> </h2>
        </div>

      <?php } ?>

      <?php
      /** GESTANTES E PUERPERAS */

      $quant_categoria = "SELECT count(categoria) as categoria from beneficiarios where categoria = 'Gestantes e puerperas'";
      $categoria_result = mysqli_query($conexao, $quant_categoria);

      while ($array = mysqli_fetch_array($categoria_result)) {
        $resultado_gest = $array['categoria'];

      ?>
        <div class="col-md-5" id="cardcat17">
          <h2 id="cattext">Gestantes e puerperas: <?php echo $resultado_gest ?> </h2>
        </div>

      <?php } ?>

      </div>

  </section>

  <!-- Categorias -->

  <!-- FOOTER -->
  <?php
  include_once 'footer.html';
  ?>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

</body>

</html>