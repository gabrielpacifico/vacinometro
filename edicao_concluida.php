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
    <title> Vacinômetro - Cadastro de vacinas concluído! </title>
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

        include 'conexao.php';

            /** PRIMEIRA DOSE */
            $id = $_POST['id'];
            $beneficiario = $_POST['beneficiariovac'];
            $cpfbeneficiario = $_POST['cpfbeneficiario'];
            $susbeneficiario = $_POST['susbeneficiario'];
            $idade = $_POST['idade'];
            $sexo = $_POST['sexo'];
            $data_nasc = $_POST['datanasc'];
            $categoria = $_POST['categoriavac'];
            $fase_1_dose = $_POST['faseprimeiradose'];
            $data_vac_primeira_dose = $_POST['datavacprimeiradose'];
            $local_aplicado = $_POST['localaplicado'];
            $vacinador = $_POST['vacinadorprimeiradose'];
            $lote_1_dose = $_POST['loteprimeiradose'];
            $vacina = $_POST['vacina'];
            $vacina_2 = $_POST['vacina_2'];
            $vacina_3 = $_POST['vacina_3'];
            $vacina_4 = $_POST['vacina_4'];
            $local_vac_primeira_dose = $_POST['localvacinacaoprimeiradose'];

            /** SEGUNDA DOSE */
            $data_vac_segunda_dose = $_POST['datavacsegundadose'];
            $vacinador_2_dose = $_POST['vacinadorsegundadose'];
            $lote_2_dose = $_POST['lotesegundadose'];
            $local_vac_segunda_dose = $_POST['localvacinacaosegundadose'];

            /** TERCEIRA DOSE */

            $data_vac_terceira_dose = $_POST['datavacterceiradose'];
            $vacinador_terceira_dose = $_POST['vacinadorterceiradose'];
            $lote_terceira_dose = $_POST['loteterceiradose'];
            $local_vac_terceira_dose = $_POST['localvacinacaoterceiradose'];

            /** QUARTA DOSE */

            $data_vac_quarta_dose = $_POST['datavacquartadose'];
            $vacinador_quarta_dose = $_POST['vacinadorquartadose'];
            $lote_quarta_dose = $_POST['lotequartadose'];
            $local_vac_quarta_dose = $_POST['localvacinacaoquartadose'];

            /** CHECKBOX QUE VERIFICA SE TOMOU DOSE EM OUTRO MUNICIPIO OU NÃO */

            $obs_checkbox = $_POST['check-obs'];

            /** QUANTIDADE DE DOSES QUE FORAM APLICADAS (1,2,3,4 OU DOSE ÚNICA) */

            $dose = $_POST['dose'];

            // FAZER VERIFICAÇÃO DE DATAS SE É SUPERIOR A DO DIA ATUAL

            $data_nasc_convert = date('Y/m/d', strtotime($data_nasc));
            // echo $data_nasc_convert . " nasc <br>";

            $data_primeira_convert = date('Y/m/d', strtotime($data_vac_primeira_dose));
            // echo $data_primeira_convert . " prim <br>";

            $data_segunda_convert = date('Y/m/d', strtotime($data_vac_segunda_dose));
            // echo $data_segunda_convert . " segun <br>";

            $data_terceira_convert = date('Y/m/d', strtotime($data_vac_terceira_dose));
            // echo $data_terceira_convert . " terc <br>";

            $data_quarta_convert = date('Y/m/d', strtotime($data_vac_quarta_dose));
            // echo $data_quarta_convert . " quart <br>";

            $data_atual = date('Y/m/d');

            //VERIFICAR DATA DE NASCIMENTO
            if($data_nasc_convert > $data_atual){
            $_SESSION['date1_invalid'] = true;
              echo "<script>window.location.href='editar_beneficiario.php?id=$id';</script>";
              exit();
            // VERIFICAR PRIMEIRA DOSE
            }elseif($data_primeira_convert > $data_atual){
              $_SESSION['date2_invalid'] = true;
              echo "<script>window.location.href='editar_beneficiario.php?id=$id';</script>";
              exit();
            // VERIFICAR SEGUNDA DOSE
            }elseif($data_segunda_convert > $data_atual){
              $_SESSION['date3_invalid'] = true;
              echo "<script>window.location.href='editar_beneficiario.php?id=$id';</script>";
              exit();
            // VERIFICAR TERCEIRA DOSE
            }elseif($data_terceira_convert > $data_atual){
              $_SESSION['date4_invalid'] = true;
              echo "<script>window.location.href='editar_beneficiario.php?id=$id';</script>";
              exit();
            }
            // VERIFICAR QUARTA DOSE
            elseif($data_quarta_convert > $data_atual){
              $_SESSION['date5_invalid'] = true;
              echo "<script>window.location.href='editar_beneficiario.php?id=$id';</script>";
              exit();
            }

            $sql = "UPDATE `beneficiarios` SET `beneficiario`='$beneficiario',`cpfbeneficiario`='$cpfbeneficiario', `susbeneficiario`='$susbeneficiario', `idade`='$idade',`sexo`='$sexo', `data_nasc`='$data_nasc',
            `categoria`='$categoria',`fase_1_dose`='$fase_1_dose',`data_de_vacinacao`='$data_vac_primeira_dose',`local_aplicado`='$local_aplicado',
            `vacinador`='$vacinador',`lote_1_dose`='$lote_1_dose',`vacina`='$vacina', `vacina_2`='$vacina_2', `vacina_3`='$vacina_3', `vacina_4`='$vacina_4', `local_vacinacao`='$local_vac_primeira_dose',
            `data_de_vacinacao_2`='$data_vac_segunda_dose', `vacinador_2_dose`='$vacinador_2_dose',
            `lote_2_dose`='$lote_2_dose',`local_vacinacao_2`='$local_vac_segunda_dose',`data_de_vacinacao_3`='$data_vac_terceira_dose',`vacinador_3_dose`='$vacinador_terceira_dose',
            `lote_3_dose`='$lote_terceira_dose',`local_vacinacao_3`='$local_vac_terceira_dose', `data_de_vacinacao_4`='$data_vac_quarta_dose', `vacinador_4_dose`='$vacinador_quarta_dose', `lote_4_dose`='$lote_quarta_dose', `local_vacinacao_4`='$local_vac_quarta_dose', `dose`='$dose' WHERE id_beneficiarios = $id";

            if (mysqli_query($conexao, $sql)) {
                
            ?> <center><br><br><h2 id="cadastroconcluido"> Edição feita com sucesso! </h2>
            <a href="listavacinados_editar.php" class="btn btn-primary" style="margin-top: 30px;">Voltar</a></center> <?php
                                            }

            else {

            ?> <center><h2 style="margin-top: 30px;" id="cadastroconcluido"> Erro!! A edição não foi feita. </h2>
            <a href="cadastro_geral.php" class="btn btn-primary" style="margin-top: 30px;">Voltar</a></center> <?php

            }

        ?>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
      
</body>
</html>