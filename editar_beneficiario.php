<?php

session_start();

$usuario = $_SESSION['usuario'];

if(!isset($_SESSION['usuario'])){
  header('Location: login.php');
}

include 'conexao.php';

$id = $_GET['id'];

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Vacinômetro - Editar beneficiário </title>
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
          <a href="logout.php" role="button" class="btn btn-sm btn-danger text-end" style="color: white;"><i class="fas fa-power-off"></i> Logout</a>
        </div>
      </nav>
      
      
      <!-- Barra de navegação acima -->

      <section id="editarbeneficiario" class="container">
        <center>
            <h1 id="titlebeneficiario">Editar beneficiário</h1>
        </center>
        <a href="listavacinados_editar.php" class="btn btn-primary" role="button"><i class="fas fa-arrow-left"></i></a>
        <div id="subvac">
            <h2 id="subtitlecadastro"><i class="fas fa-question-circle"></i>&nbsp; Editar beneficiários que já foram cadastrados no sistema.</h2>
        </div>

            <?php 

                include 'conexao.php';

                $sql = "SELECT * FROM `beneficiarios` WHERE id_beneficiarios = $id";
                $busca = mysqli_query($conexao, $sql);

                while($array = mysqli_fetch_assoc($busca)){
                  $id_beneficiarios = $array['id_beneficiarios'];
                  $beneficiario = $array['beneficiario'];
                  $cpfbeneficiario = $array['cpfbeneficiario'];
                  $susbeneficiario = $array['susbeneficiario'];
                  $idade = $array['idade'];
                  $sexo = $array['sexo'];
                  $data_nasc = $array['data_nasc'];
                  $fase_1_dose = $array['fase_1_dose'];
                  $dose = $array['dose'];
                  $data_de_vacinacao = $array['data_de_vacinacao'];
                  $data_de_vacinacao_2 = $array['data_de_vacinacao_2'];
                  $data_de_vacinacao_3 = $array['data_de_vacinacao_3'];
                  $data_de_vacinacao_4 = $array['data_de_vacinacao_4'];
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
                  <center>
                <form action="edicao_concluida.php" method="POST">
                  <div class="form-control" style="margin-top: 30px;">

                    <article id="cabecalhocadastro">Informações sobre a primeira dose</article>

                    <?php

                              if(isset($_SESSION['date1_invalid'])){
                              ?>
                              <div class="alert alert-danger d-flex align-items-center" id="aviso5" role="alert" >
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="24" fill="currentColor" class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">
                                  <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                              </svg>
                              <div>
                              A data de <strong>nascimento</strong> é inválida, tente novamente com uma nova data.
                              </div>
                              </div>
                              <?php 
                              }
                              unset($_SESSION['date1_invalid'])

                              ?>

                              <?php

                              if(isset($_SESSION['date2_invalid'])){
                              ?>
                              <div class="alert alert-danger d-flex align-items-center" id="aviso5" role="alert" >
                              <svg xmlns="http://www.w3.org/2000/svg" width="20" height="24" fill="currentColor" class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">
                              <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                              </svg>
                              <div>
                              A data da <strong>primeira dose</strong> é inválida, tente novamente com uma nova data.
                              </div>
                              </div>
                              <?php 
                              }
                              unset($_SESSION['date2_invalid'])

                              ?>

                              <?php

                              if(isset($_SESSION['date3_invalid'])){
                              ?>
                              <div class="alert alert-danger d-flex align-items-center" id="aviso5" role="alert" >
                              <svg xmlns="http://www.w3.org/2000/svg" width="20" height="24" fill="currentColor" class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">
                              <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                              </svg>
                              <div>
                              A data da <strong>segunda dose</strong> é inválida, tente novamente com uma nova data.
                              </div>
                              </div>
                              <?php 
                              }
                              unset($_SESSION['date3_invalid'])

                              ?>

                              <?php

                              if(isset($_SESSION['date4_invalid'])){
                              ?>
                              <div class="alert alert-danger d-flex align-items-center" id="aviso5" role="alert" >
                              <svg xmlns="http://www.w3.org/2000/svg" width="20" height="24" fill="currentColor" class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">
                              <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                              </svg>
                              <div>
                              A data da <strong>terceira dose</strong> é inválida, tente novamente com uma nova data.
                              </div>
                              </div>
                              <?php 
                              }
                              unset($_SESSION['date4_invalid'])

                              ?>

                              <?php

                              if(isset($_SESSION['date5_invalid'])){
                              ?>
                              <div class="alert alert-danger d-flex align-items-center" id="aviso5" role="alert" >
                              <svg xmlns="http://www.w3.org/2000/svg" width="20" height="24" fill="currentColor" class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">
                              <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                              </svg>
                              <div>
                              A data da <strong>quarta dose</strong> é inválida, tente novamente com uma nova data.
                              </div>
                              </div>
                              <?php 
                              }
                              unset($_SESSION['date5_invalid'])

                              ?>

                    <div class="col-md-5  m-3" style="text-align: left;">
                      <label>Beneficiário:</label>
                          <input type="name" name="beneficiariovac" class="form-control" value="<?php echo $beneficiario?>" autocomplete="off">
                          <input type="name" name="id" class="form-control" value="<?php echo $id?>" style="display: none;" autocomplete="off">
                      </div>

                      <div class="col-md-5  m-3" style="text-align: left;">
                      <label>CPF:</label>
                          <input type="name" name="cpfbeneficiario" class="form-control" value="<?php echo $cpfbeneficiario ?>" autocomplete="off">
                      </div>

                      <div class="col-md-5  m-3" style="text-align: left;">
                        <label>Cartão do SUS:</label>
                            <input type="name" name="susbeneficiario" class="form-control" value="<?php echo $susbeneficiario ?>" autocomplete="off">
                      </div>
  
                      <div class="col-md-5 m-3" style="text-align: left;">
                          <label>Idade:</label>
                              <input type="number" name="idade" class="form-control" value="<?php echo $idade ?>" autocomplete="off">
                      </div>

                      <div class="col-md-5 m-3" style="text-align: left;">
                        <label>Sexo:</label>
                        <select name="sexo" class="form-select">
                          <option <?=($sexo == 'Masculino')?'selected':''?> > Masculino </option>
                          <option <?=($sexo == 'Feminino')?'selected':''?> > Feminino </option>
                          <option <?=($sexo == 'Recusa a dizer')?'selected':''?> > Recusa a dizer </option>
                        </select>

                    </div>
  
                      <div class="col-md-5 m-3" style="text-align: left;">
                          <label>Data de nascimento:</label>
                              <input type="date" name="datanasc" class="form-control" value="<?php echo $data_nasc ?>" autocomplete="off">
                      </div>
                      
                      <div class="col-md-5 m-3" style="text-align: left;">
                        <label>Categoria:</label>
                        <select name="categoriavac" class="form-select">
                          <option <?=($categoria == 'Idosos com 75 anos ou mais')?'selected':''?> > Idosos com 75 anos ou mais </option>
                          <option <?=($categoria == 'Idosos de 70 a 74 anos')?'selected':''?> > Idosos de 70 a 74 anos </option>
                          <option <?=($categoria == 'Idosos de 65 a 69 anos')?'selected':''?> > Idosos de 65 a 69 anos </option>
                          <option <?=($categoria == 'Idosos de 60 a 64 anos')?'selected':''?> > Idosos de 60 a 64 anos </option>
                          <option <?=($categoria == 'Gestantes e puerperas com comorbidades(18 a 59 anos)')?'selected':''?> > Gestantes e puerperas com comorbidades(18 a 59 anos) </option>
                          <option <?=($categoria == 'Doença renal crônica em tratamento de diálise(18 a 59 anos)')?'selected':''?> > Doença renal crônica em tratamento de diálise(18 a 59 anos) </option>
                          <option <?=($categoria == 'Ostomia respiratória(18 a 59 anos)')?'selected':''?> > Ostomia respiratória(18 a 59 anos) </option>
                          <option <?=($categoria == 'Comorbidades')?'selected':''?> > Comorbidades </option>
                          <option <?=($categoria == 'Deficiencia permanente grave')?'selected':''?> > Deficiencia permanente grave </option>
                          <option <?=($categoria == 'Síndrome de down(18 a 59 anos)')?'selected':''?> > Síndrome de down(18 a 59 anos) </option>
                          <option <?=($categoria == 'Profissionais da saúde')?'selected':''?> > Profissionais da saúde </option>
                          <option <?=($categoria == 'Trabalhadores da educação')?'selected':''?> > Trabalhadores da educação </option>
                          <option <?=($categoria == 'População em geral')?'selected':''?> > População em geral </option>
                          <option <?=($categoria == 'Adolescentes de 12 a 17 anos')?'selected':''?> > Adolescentes de 12 a 17 anos </option>
                          <option <?=($categoria == 'Crianças de 5 a 11 anos')?'selected':''?> > Crianças de 5 a 11 anos </option>
                          <option <?=($categoria == 'Crianças de 3 e 4 anos')?'selected':''?> > Crianças de 3 e 4 anos </option>
                          <option <?=($categoria == 'Gestantes e puerperas')?'selected':''?> > Gestantes e puerperas </option>
 
                        </select>
                      </div>

                      <div class="col-md-5 m-3" style="text-align: left;">
                        <label>Fase:</label>
                            <input type="number" name="faseprimeiradose" class="form-control" value="<?php echo $fase_1_dose ?>" autocomplete="off">
                    </div>

                    <div class="col-md-5 m-3" style="text-align: left;">
                        <label>Data de vacinação:</label>
                            <input type="date" name="datavacprimeiradose" class="form-control" value="<?php echo $data_de_vacinacao?>" autocomplete="off">
                    </div>

                    <div class="col-md-5 m-3" style="text-align: left;">
                      <label>Local aplicado:</label>
                        <select name="localaplicado" class="form-select">
                          <option <?=($local_aplicado == 'Braço direito')?'selected':''?> > Braço direito </option>
                          <option <?=($local_aplicado == 'Braço esquerdo')?'selected':''?> > Braço esquerdo </option>
                          
                        </select>

                    </div>

                    <div class="col-md-5 m-3" style="text-align: left;">
                        <label>Vacinador:</label>
                            <select name="vacinadorprimeiradose" class="form-select" >
                            <option <?=($vacinador == '')?'selected':''?> > Vacinador </option>
                            <option <?=($vacinador == 'ADRIANA CRISTINA COUTINHO')?'selected':''?> > ADRIANA CRISTINA COUTINHO </option>
                            <option <?=($vacinador == 'ANA CRISTINA LACERDA MACEDO')?'selected':''?> > ANA CRISTINA LACERDA MACEDO </option>
                            <option <?=($vacinador == 'ANA LÚCIA RODRIGUES VIANA')?'selected':''?> > ANA LÚCIA RODRIGUES VIANA </option>
                            <option <?=($vacinador == 'ANTONIA EVA SOARES CAVALCANTE')?'selected':''?> > ANTONIA EVA SOARES CAVALCANTE </option>
                            <option <?=($vacinador == 'JAYME VIEIRA DE MACEDO')?'selected':''?> > JAYME VIEIRA DE MACEDO </option>
                            <option <?=($vacinador == 'LÍGIA LAISSA GOMES BASÍLIO')?'selected':''?> > LÍGIA LAISSA GOMES BASÍLIO </option>
                            <option <?=($vacinador == 'LUIZA RAIMUNDA VIEIRA NETA')?'selected':''?> > LUIZA RAIMUNDA VIEIRA NETA </option>
                            <option <?=($vacinador == 'MARY ANNY BEZERRA MELO')?'selected':''?> > MARY ANNY BEZERRA MELO </option>
                            <option <?=($vacinador == 'RAIMUNDA NONATA PONTE DE ALMEIDA COUTINHO')?'selected':''?> > RAIMUNDA NONATA PONTE DE ALMEIDA COUTINHO </option>
                            <option <?=($vacinador == 'RITA ROSANEIDE VIEIRA')?'selected':''?> > RITA ROSANEIDE VIEIRA </option>
                            <option <?=($vacinador == 'ANTONIA GILCERLENE DE SOUSA MOTA')?'selected':''?> > ANTONIA GILCERLENE DE SOUSA MOTA </option>
                            <option <?=($vacinador == 'MARIA EDILMA PINHEIRO')?'selected':''?> > MARIA EDILMA PINHEIRO </option>
                            <option <?=($vacinador == 'MARIA ROZIMEIRE BESERRA BONFIM')?'selected':''?> > MARIA ROZIMEIRE BESERRA BONFIM </option>
                            <option <?=($vacinador == 'WANDERSON LEANDRO OLIVEIRA')?'selected':''?> > WANDERSON LEANDRO OLIVEIRA </option>
                            <option <?=($vacinador == 'ANTÔNIA DOS SANTOS FERREIRA DE SOUSA')?'selected':''?> > ANTÔNIA DOS SANTOS FERREIRA DE SOUSA </option>
                            <option <?=($vacinador == 'HERLLEN BÁRBARA FERREIRA NORTE')?'selected':''?> > HERLLEN BÁRBARA FERREIRA NORTE </option>
                            <option <?=($vacinador == 'SÔNIA MARIA ARAÚJO GALVÃO')?'selected':''?> > SÔNIA MARIA ARAÚJO GALVÃO </option>
                            <option <?=($vacinador == 'AMANDA SOARES GOMES DE SOUSA')?'selected':''?> > AMANDA SOARES GOMES DE SOUSA </option>
                            <option <?=($vacinador == 'JARDIANE DO NASCIMENTO SANTOS')?'selected':''?> > JARDIANE DO NASCIMENTO SANTOS </option>
                            <option <?=($vacinador == 'ANDREIA MACEDO BONFIM')?'selected':''?> > ANDREIA MACEDO BONFIM </option>
                            <option <?=($vacinador == 'CILIA DE OLIVEIRA MOTA')?'selected':''?> > CILIA DE OLIVEIRA MOTA </option>
                            <option <?=($vacinador == 'MARIA ROSIMARA DE SOUSA OLIVEIRA')?'selected':''?> > MARIA ROSIMARA DE SOUSA OLIVEIRA </option>
                            <option <?=($vacinador == 'TAGLLA NATYELLE TORRES DE OLIVEIRA')?'selected':''?> > TAGLLA NATYELLE TORRES DE OLIVEIRA </option>
                            <option <?=($vacinador == 'MARIA VALQUIRIA BEZERRA PACIFICO DE ASSIS')?'selected':''?> > MARIA VALQUIRIA BEZERRA PACIFICO DE ASSIS </option>
                            <option <?=($vacinador == 'NIVANILDE SOUSA MARTINS')?'selected':''?> > NIVANILDE SOUSA MARTINS </option>
                            <option <?=($vacinador == 'LUMENA CRISTINA MOTA PEREIRA')?'selected':''?> > LUMENA CRISTINA MOTA PEREIRA </option>
                            <option <?=($vacinador == 'ANTÔNIA JAMILY PORTELA SIQUEIRA COSTA')?'selected':''?> > ANTÔNIA JAMILY PORTELA SIQUEIRA COSTA </option>
                        </select>
                    </div>

                    <div class="col-md-5 m-3" style="text-align: left;">
                        <label>Lote da vacina:</label>
                            <input type="name" name="loteprimeiradose" class="form-control" value="<?php echo $lote_1_dose ?>" autocomplete="off">
                    </div>

                    <div class="col-md-5 m-3" style="text-align: left;">
                        <label>Vacina:</label>
                        <select name="vacina" class="form-select">
                          <option <?=($vacina == '')?'selected':''?> > Vacina </option>
                          <option <?=($vacina == 'BUTANTAN/CORONAVAC')?'selected':''?> > BUTANTAN/CORONAVAC </option>
                          <option <?=($vacina == 'FIOCRUZ/ASTRAZENECA')?'selected':''?> > FIOCRUZ/ASTRAZENECA </option>
                          <option <?=($vacina == 'PFIZER-BELGIVA')?'selected':''?> > PFIZER-BELGIVA </option>
                          <option <?=($vacina == 'PFIZER-PEDIATRICA')?'selected':''?> > PFIZER-PEDIÁTRICA </option>
                          <option <?=($vacina == 'JANSSEN PHARMACEUTICA NV')?'selected':''?> > JANSSEN PHARMACEUTICA NV </option>
                        </select>
                    </div>

                    <div class="col-md-5 m-3" style="text-align: left;">
                      <label>Local de vacinação:</label>
                        <select style="margin-bottom: 20px;" name="localvacinacaoprimeiradose" class="form-select">
                          <option <?=($local_vacinacao == '')?'selected':''?> > Local de vacinação </option>
                          <option <?=($local_vacinacao == 'UBS - EMATUBA')?'selected':''?> > UBS - EMATUBA </option>
                          <option <?=($local_vacinacao == 'UBS - IAPI')?'selected':''?> > UBS - IAPI </option>
                          <option <?=($local_vacinacao == 'UBS - MONTE SINAI')?'selected':''?> > UBS - MONTE SINAI </option>
                          <option <?=($local_vacinacao == 'UBS - NOVA BETÂNEA')?'selected':''?> > UBS - NOVA BETÂNEA </option>
                          <option <?=($local_vacinacao == 'UBS - PALESTINA')?'selected':''?> > UBS - PALESTINA </option>
                          <option <?=($local_vacinacao == 'UBS - SEDE I CENTRO DE SAÚDE')?'selected':''?> > UBS - SEDE I CENTRO DE SAÚDE </option>
                          <option <?=($local_vacinacao == 'UBS - SEDE II 70')?'selected':''?> > UBS - SEDE II 70 </option>
                          <option <?=($local_vacinacao == 'UBS - SEDE III COHAB')?'selected':''?> > UBS - SEDE III COHAB </option>
                          <option <?=($local_vacinacao == 'UBS- SEDE IV COHAB')?'selected':''?> > UBS- SEDE IV COHAB </option>
                          <option <?=($local_vacinacao == 'UBS - TRANQUEIRAS')?'selected':''?> > UBS - TRANQUEIRAS </option>
                          <option <?=($local_vacinacao == 'UBS - VÁRZEA GRANDE')?'selected':''?> > UBS - VÁRZEA GRANDE </option>

                  </select>
                  </div>

                  <article id="cabecalhocadastro">Informações sobre a segunda dose</article>

                    <div class="col-md-5 m-3" style="text-align: left;">
                        <label>Data de vacinação:</label>
                            <input type="date" name="datavacsegundadose" class="form-control" value="<?php echo $data_de_vacinacao_2 ?>" autocomplete="off">
                    </div>

                    <div class="col-md-5 m-3" style="text-align: left;">
                        <label>Vacinador:</label>
                      <select name="vacinadorsegundadose" class="form-select" >
                            <option <?=($vacinador_2_dose == '')?'selected':''?> > Vacinador </option>
                            <option <?=($vacinador_2_dose == 'ADRIANA CRISTINA COUTINHO')?'selected':''?> > ADRIANA CRISTINA COUTINHO </option>
                            <option <?=($vacinador_2_dose == 'ANA CRISTINA LACERDA MACEDO')?'selected':''?> > ANA CRISTINA LACERDA MACEDO </option>
                            <option <?=($vacinador_2_dose == 'ANA LÚCIA RODRIGUES VIANA')?'selected':''?> > ANA LÚCIA RODRIGUES VIANA </option>
                            <option <?=($vacinador_2_dose == 'ANTONIA EVA SOARES CAVALCANTE')?'selected':''?> > ANTONIA EVA SOARES CAVALCANTE </option>
                            <option <?=($vacinador_2_dose == 'JAYME VIEIRA DE MACEDO')?'selected':''?> > JAYME VIEIRA DE MACEDO </option>
                            <option <?=($vacinador_2_dose == 'LÍGIA LAISSA GOMES BASÍLIO')?'selected':''?> > LÍGIA LAISSA GOMES BASÍLIO </option>
                            <option <?=($vacinador_2_dose == 'LUIZA RAIMUNDA VIEIRA NETA')?'selected':''?> > LUIZA RAIMUNDA VIEIRA NETA </option>
                            <option <?=($vacinador_2_dose == 'MARY ANNY BEZERRA MELO')?'selected':''?> > MARY ANNY BEZERRA MELO </option>
                            <option <?=($vacinador_2_dose == 'RAIMUNDA NONATA PONTE DE ALMEIDA COUTINHO')?'selected':''?> > RAIMUNDA NONATA PONTE DE ALMEIDA COUTINHO </option>
                            <option <?=($vacinador_2_dose == 'RITA ROSANEIDE VIEIRA')?'selected':''?> > RITA ROSANEIDE VIEIRA </option>
                            <option <?=($vacinador_2_dose == 'ANTONIA GILCERLENE DE SOUSA MOTA')?'selected':''?> > ANTONIA GILCERLENE DE SOUSA MOTA </option>
                            <option <?=($vacinador_2_dose == 'MARIA EDILMA PINHEIRO')?'selected':''?> > MARIA EDILMA PINHEIRO </option>
                            <option <?=($vacinador_2_dose == 'MARIA ROZIMEIRE BESERRA BONFIM')?'selected':''?> > MARIA ROZIMEIRE BESERRA BONFIM </option>
                            <option <?=($vacinador_2_dose == 'WANDERSON LEANDRO OLIVEIRA')?'selected':''?> > WANDERSON LEANDRO OLIVEIRA </option>
                            <option <?=($vacinador_2_dose == 'ANTÔNIA DOS SANTOS FERREIRA DE SOUSA')?'selected':''?> > ANTÔNIA DOS SANTOS FERREIRA DE SOUSA </option>
                            <option <?=($vacinador_2_dose == 'HERLLEN BÁRBARA FERREIRA NORTE')?'selected':''?> > HERLLEN BÁRBARA FERREIRA NORTE </option>
                            <option <?=($vacinador_2_dose == 'SÔNIA MARIA ARAÚJO GALVÃO')?'selected':''?> > SÔNIA MARIA ARAÚJO GALVÃO </option>
                            <option <?=($vacinador_2_dose == 'AMANDA SOARES GOMES DE SOUSA')?'selected':''?> > AMANDA SOARES GOMES DE SOUSA </option>
                            <option <?=($vacinador_2_dose == 'JARDIANE DO NASCIMENTO SANTOS')?'selected':''?> > JARDIANE DO NASCIMENTO SANTOS </option>
                            <option <?=($vacinador_2_dose == 'ANDREIA MACEDO BONFIM')?'selected':''?> > ANDREIA MACEDO BONFIM </option>
                            <option <?=($vacinador_2_dose == 'CILIA DE OLIVEIRA MOTA')?'selected':''?> > CILIA DE OLIVEIRA MOTA </option>
                            <option <?=($vacinador_2_dose == 'MARIA ROSIMARA DE SOUSA OLIVEIRA')?'selected':''?> > MARIA ROSIMARA DE SOUSA OLIVEIRA </option>
                            <option <?=($vacinador_2_dose == 'TAGLLA NATYELLE TORRES DE OLIVEIRA')?'selected':''?> > TAGLLA NATYELLE TORRES DE OLIVEIRA </option>
                            <option <?=($vacinador_2_dose == 'MARIA VALQUIRIA BEZERRA PACIFICO DE ASSIS')?'selected':''?> > MARIA VALQUIRIA BEZERRA PACIFICO DE ASSIS </option>
                            <option <?=($vacinador_2_dose == 'NIVANILDE SOUSA MARTINS')?'selected':''?> > NIVANILDE SOUSA MARTINS </option>
                            <option <?=($vacinador_2_dose == 'LUMENA CRISTINA MOTA PEREIRA')?'selected':''?> > LUMENA CRISTINA MOTA PEREIRA </option>
                            <option <?=($vacinador_2_dose == 'ANTÔNIA JAMILY PORTELA SIQUEIRA COSTA')?'selected':''?> > ANTÔNIA JAMILY PORTELA SIQUEIRA COSTA </option>
                      </select>
                    </div>

                    <div class="col-md-5 m-3" style="text-align: left;">
                        <label>Lote:</label>
                            <input type="name" name="lotesegundadose" class="form-control" value="<?php echo $lote_2_dose ?>" autocomplete="off">
                    </div>

                    <div class="col-md-5 m-3" style="text-align: left;">
                        <label>Vacina:</label>
                        <select name="vacina_2" class="form-select">
                          <option <?=($vacina_2 == '')?'selected':''?> > Vacina </option>
                          <option <?=($vacina_2 == 'BUTANTAN/CORONAVAC')?'selected':''?> > BUTANTAN/CORONAVAC </option>
                          <option <?=($vacina_2 == 'FIOCRUZ/ASTRAZENECA')?'selected':''?> > FIOCRUZ/ASTRAZENECA </option>
                          <option <?=($vacina_2 == 'PFIZER-BELGIVA')?'selected':''?> > PFIZER-BELGIVA </option>
                          <option <?=($vacina_2 == 'PFIZER-PEDIATRICA')?'selected':''?> > PFIZER-PEDIÁTRICA </option>
                          <option <?=($vacina_2 == 'JANSSEN PHARMACEUTICA NV')?'selected':''?> > JANSSEN PHARMACEUTICA NV </option>
                        </select>
                    </div>

                    <div class="col-md-5 m-3" style="text-align: left;">
                      <label>Local de vacinação:</label>
                    <select name="localvacinacaosegundadose" class="form-select">
                          <option <?=($local_vacinacao_2 == '')?'selected':''?> > Local de vacinação </option>
                          <option <?=($local_vacinacao_2 == 'UBS - EMATUBA')?'selected':''?> > UBS - EMATUBA </option>
                          <option <?=($local_vacinacao_2 == 'UBS - IAPI')?'selected':''?> > UBS - IAPI </option>
                          <option <?=($local_vacinacao_2 == 'UBS - MONTE SINAI')?'selected':''?> > UBS - MONTE SINAI </option>
                          <option <?=($local_vacinacao_2 == 'UBS - NOVA BETÂNEA')?'selected':''?> > UBS - NOVA BETÂNEA </option>
                          <option <?=($local_vacinacao_2 == 'UBS - PALESTINA')?'selected':''?> > UBS - PALESTINA </option>
                          <option <?=($local_vacinacao_2 == 'UBS - SEDE I CENTRO DE SAÚDE')?'selected':''?> > UBS - SEDE I CENTRO DE SAÚDE </option>
                          <option <?=($local_vacinacao_2 == 'UBS - SEDE II 70')?'selected':''?> > UBS - SEDE II 70 </option>
                          <option <?=($local_vacinacao_2 == 'UBS - SEDE III COHAB')?'selected':''?> > UBS - SEDE III COHAB </option>
                          <option <?=($local_vacinacao_2 == 'UBS- SEDE IV COHAB')?'selected':''?> > UBS- SEDE IV COHAB </option>
                          <option <?=($local_vacinacao_2 == 'UBS - TRANQUEIRAS')?'selected':''?> > UBS - TRANQUEIRAS </option>
                          <option <?=($local_vacinacao_2 == 'UBS - VÁRZEA GRANDE')?'selected':''?> > UBS - VÁRZEA GRANDE </option>

                  </select>
                  </div>

                  <article id="cabecalhocadastro">Informações sobre a terceira dose</article>

                    <div class="col-md-5 m-3" style="text-align: left;">
                        <label>Data de vacinação:</label>
                            <input type="date" name="datavacterceiradose" class="form-control" value="<?php echo $data_de_vacinacao_3 ?>" autocomplete="off">
                    </div>

                    <div class="col-md-5 m-3" style="text-align: left;">
                        <label>Vacinador:</label>
                        <select name="vacinadorterceiradose" class="form-select" >
                            <option <?=($vacinador_3_dose == '')?'selected':''?> > Vacinador </option>
                            <option <?=($vacinador_3_dose == 'ADRIANA CRISTINA COUTINHO')?'selected':''?> > ADRIANA CRISTINA COUTINHO </option>
                            <option <?=($vacinador_3_dose == 'ANA CRISTINA LACERDA MACEDO')?'selected':''?> > ANA CRISTINA LACERDA MACEDO </option>
                            <option <?=($vacinador_3_dose == 'ANA LÚCIA RODRIGUES VIANA')?'selected':''?> > ANA LÚCIA RODRIGUES VIANA </option>
                            <option <?=($vacinador_3_dose == 'ANTONIA EVA SOARES CAVALCANTE')?'selected':''?> > ANTONIA EVA SOARES CAVALCANTE </option>
                            <option <?=($vacinador_3_dose == 'JAYME VIEIRA DE MACEDO')?'selected':''?> > JAYME VIEIRA DE MACEDO </option>
                            <option <?=($vacinador_3_dose == 'LÍGIA LAISSA GOMES BASÍLIO')?'selected':''?> > LÍGIA LAISSA GOMES BASÍLIO </option>
                            <option <?=($vacinador_3_dose == 'LUIZA RAIMUNDA VIEIRA NETA')?'selected':''?> > LUIZA RAIMUNDA VIEIRA NETA </option>
                            <option <?=($vacinador_3_dose == 'MARY ANNY BEZERRA MELO')?'selected':''?> > MARY ANNY BEZERRA MELO </option>
                            <option <?=($vacinador_3_dose == 'RAIMUNDA NONATA PONTE DE ALMEIDA COUTINHO')?'selected':''?> > RAIMUNDA NONATA PONTE DE ALMEIDA COUTINHO </option>
                            <option <?=($vacinador_3_dose == 'RITA ROSANEIDE VIEIRA')?'selected':''?> > RITA ROSANEIDE VIEIRA </option>
                            <option <?=($vacinador_3_dose == 'ANTONIA GILCERLENE DE SOUSA MOTA')?'selected':''?> > ANTONIA GILCERLENE DE SOUSA MOTA </option>
                            <option <?=($vacinador_3_dose == 'MARIA EDILMA PINHEIRO')?'selected':''?> > MARIA EDILMA PINHEIRO </option>
                            <option <?=($vacinador_3_dose == 'MARIA ROZIMEIRE BESERRA BONFIM')?'selected':''?> > MARIA ROZIMEIRE BESERRA BONFIM </option>
                            <option <?=($vacinador_3_dose == 'WANDERSON LEANDRO OLIVEIRA')?'selected':''?> > WANDERSON LEANDRO OLIVEIRA </option>
                            <option <?=($vacinador_3_dose == 'ANTÔNIA DOS SANTOS FERREIRA DE SOUSA')?'selected':''?> > ANTÔNIA DOS SANTOS FERREIRA DE SOUSA </option>
                            <option <?=($vacinador_3_dose == 'HERLLEN BÁRBARA FERREIRA NORTE')?'selected':''?> > HERLLEN BÁRBARA FERREIRA NORTE </option>
                            <option <?=($vacinador_3_dose == 'SÔNIA MARIA ARAÚJO GALVÃO')?'selected':''?> > SÔNIA MARIA ARAÚJO GALVÃO </option>
                            <option <?=($vacinador_3_dose == 'AMANDA SOARES GOMES DE SOUSA')?'selected':''?> > AMANDA SOARES GOMES DE SOUSA </option>
                            <option <?=($vacinador_3_dose == 'JARDIANE DO NASCIMENTO SANTOS')?'selected':''?> > JARDIANE DO NASCIMENTO SANTOS </option>
                            <option <?=($vacinador_3_dose == 'ANDREIA MACEDO BONFIM')?'selected':''?> > ANDREIA MACEDO BONFIM </option>
                            <option <?=($vacinador_3_dose == 'CILIA DE OLIVEIRA MOTA')?'selected':''?> > CILIA DE OLIVEIRA MOTA </option>
                            <option <?=($vacinador_3_dose == 'MARIA ROSIMARA DE SOUSA OLIVEIRA')?'selected':''?> > MARIA ROSIMARA DE SOUSA OLIVEIRA </option>
                            <option <?=($vacinador_3_dose == 'TAGLLA NATYELLE TORRES DE OLIVEIRA')?'selected':''?> > TAGLLA NATYELLE TORRES DE OLIVEIRA </option>
                            <option <?=($vacinador_3_dose == 'MARIA VALQUIRIA BEZERRA PACIFICO DE ASSIS')?'selected':''?> > MARIA VALQUIRIA BEZERRA PACIFICO DE ASSIS </option>
                            <option <?=($vacinador_3_dose == 'NIVANILDE SOUSA MARTINS')?'selected':''?> > NIVANILDE SOUSA MARTINS </option>
                            <option <?=($vacinador_3_dose == 'LUMENA CRISTINA MOTA PEREIRA')?'selected':''?> > LUMENA CRISTINA MOTA PEREIRA </option>
                            <option <?=($vacinador_3_dose == 'ANTÔNIA JAMILY PORTELA SIQUEIRA COSTA')?'selected':''?> > ANTÔNIA JAMILY PORTELA SIQUEIRA COSTA </option>
                        </select>
                    </div>

                    <div class="col-md-5 m-3" style="text-align: left;">
                        <label>Lote:</label>
                            <input type="name" name="loteterceiradose" class="form-control" value="<?php echo $lote_3_dose ?>" autocomplete="off">
                    </div>

                    <div class="col-md-5 m-3" style="text-align: left;">
                        <label>Vacina:</label>
                        <select name="vacina_3" class="form-select">
                          <option <?=($vacina_3 == '')?'selected':''?> > Vacina </option>
                          <option <?=($vacina_3 == 'BUTANTAN/CORONAVAC')?'selected':''?> > BUTANTAN/CORONAVAC </option>
                          <option <?=($vacina_3 == 'FIOCRUZ/ASTRAZENECA')?'selected':''?> > FIOCRUZ/ASTRAZENECA </option>
                          <option <?=($vacina_3 == 'PFIZER-BELGIVA')?'selected':''?> > PFIZER-BELGIVA </option>
                          <option <?=($vacina_3 == 'PFIZER-PEDIATRICA')?'selected':''?> > PFIZER-PEDIÁTRICA </option>
                          <option <?=($vacina_3 == 'JANSSEN PHARMACEUTICA NV')?'selected':''?> > JANSSEN PHARMACEUTICA NV </option>
                        </select>
                    </div>

                    <div class="col-md-5 m-3" style="text-align: left;">
                      <label>Local de vacinação:</label>
                    <select name="localvacinacaoterceiradose" class="form-select">
                      <option <?=($local_vacinacao_3 == '')?'selected':''?> > Local de vacinação </option>
                      <option <?=($local_vacinacao_3 == 'UBS - EMATUBA')?'selected':''?> > UBS - EMATUBA </option>
                      <option <?=($local_vacinacao_3 == 'UBS - IAPI')?'selected':''?> > UBS - IAPI </option>
                      <option <?=($local_vacinacao_3 == 'UBS - MONTE SINAI')?'selected':''?> > UBS - MONTE SINAI </option>
                      <option <?=($local_vacinacao_3 == 'UBS - NOVA BETÂNEA')?'selected':''?> > UBS - NOVA BETÂNEA </option>
                      <option <?=($local_vacinacao_3 == 'UBS - PALESTINA')?'selected':''?> > UBS - PALESTINA </option>
                      <option <?=($local_vacinacao_3 == 'UBS - SEDE I CENTRO DE SAÚDE')?'selected':''?> > UBS - SEDE I CENTRO DE SAÚDE </option>
                      <option <?=($local_vacinacao_3 == 'UBS - SEDE II 70')?'selected':''?> > UBS - SEDE II 70 </option>
                      <option <?=($local_vacinacao_3 == 'UBS - SEDE III COHAB')?'selected':''?> > UBS - SEDE III COHAB </option>
                      <option <?=($local_vacinacao_3 == 'UBS- SEDE IV COHAB')?'selected':''?> > UBS- SEDE IV COHAB </option>
                      <option <?=($local_vacinacao_3 == 'UBS - TRANQUEIRAS')?'selected':''?> > UBS - TRANQUEIRAS </option>
                      <option <?=($local_vacinacao_3 == 'UBS - VÁRZEA GRANDE')?'selected':''?> > UBS - VÁRZEA GRANDE </option>

                  </select>
                  </div>

                  <article id="cabecalhocadastro">Informações sobre a quarta dose</article>

                    <div class="col-md-5 m-3" style="text-align: left;">
                        <label>Data de vacinação:</label>
                            <input type="date" name="datavacquartadose" class="form-control" value="<?php echo $data_de_vacinacao_4 ?>" autocomplete="off">
                    </div>

                    <div class="col-md-5 m-3" style="text-align: left;">
                        <label>Vacinador:</label>
                        <select name="vacinadorquartadose" class="form-select" >
                            <option <?=($vacinador_4_dose == '')?'selected':''?> > Vacinador </option>
                            <option <?=($vacinador_4_dose == 'ADRIANA CRISTINA COUTINHO')?'selected':''?> > ADRIANA CRISTINA COUTINHO </option>
                            <option <?=($vacinador_4_dose == 'ANA CRISTINA LACERDA MACEDO')?'selected':''?> > ANA CRISTINA LACERDA MACEDO </option>
                            <option <?=($vacinador_4_dose == 'ANA LÚCIA RODRIGUES VIANA')?'selected':''?> > ANA LÚCIA RODRIGUES VIANA </option>
                            <option <?=($vacinador_4_dose == 'ANTONIA EVA SOARES CAVALCANTE')?'selected':''?> > ANTONIA EVA SOARES CAVALCANTE </option>
                            <option <?=($vacinador_4_dose == 'JAYME VIEIRA DE MACEDO')?'selected':''?> > JAYME VIEIRA DE MACEDO </option>
                            <option <?=($vacinador_4_dose == 'LÍGIA LAISSA GOMES BASÍLIO')?'selected':''?> > LÍGIA LAISSA GOMES BASÍLIO </option>
                            <option <?=($vacinador_4_dose == 'LUIZA RAIMUNDA VIEIRA NETA')?'selected':''?> > LUIZA RAIMUNDA VIEIRA NETA </option>
                            <option <?=($vacinador_4_dose == 'MARY ANNY BEZERRA MELO')?'selected':''?> > MARY ANNY BEZERRA MELO </option>
                            <option <?=($vacinador_4_dose == 'RAIMUNDA NONATA PONTE DE ALMEIDA COUTINHO')?'selected':''?> > RAIMUNDA NONATA PONTE DE ALMEIDA COUTINHO </option>
                            <option <?=($vacinador_4_dose == 'RITA ROSANEIDE VIEIRA')?'selected':''?> > RITA ROSANEIDE VIEIRA </option>
                            <option <?=($vacinador_4_dose == 'ANTONIA GILCERLENE DE SOUSA MOTA')?'selected':''?> > ANTONIA GILCERLENE DE SOUSA MOTA </option>
                            <option <?=($vacinador_4_dose == 'MARIA EDILMA PINHEIRO')?'selected':''?> > MARIA EDILMA PINHEIRO </option>
                            <option <?=($vacinador_4_dose == 'MARIA ROZIMEIRE BESERRA BONFIM')?'selected':''?> > MARIA ROZIMEIRE BESERRA BONFIM </option>
                            <option <?=($vacinador_4_dose == 'WANDERSON LEANDRO OLIVEIRA')?'selected':''?> > WANDERSON LEANDRO OLIVEIRA </option>
                            <option <?=($vacinador_4_dose == 'ANTÔNIA DOS SANTOS FERREIRA DE SOUSA')?'selected':''?> > ANTÔNIA DOS SANTOS FERREIRA DE SOUSA </option>
                            <option <?=($vacinador_4_dose == 'HERLLEN BÁRBARA FERREIRA NORTE')?'selected':''?> > HERLLEN BÁRBARA FERREIRA NORTE </option>
                            <option <?=($vacinador_4_dose == 'SÔNIA MARIA ARAÚJO GALVÃO')?'selected':''?> > SÔNIA MARIA ARAÚJO GALVÃO </option>
                            <option <?=($vacinador_4_dose == 'AMANDA SOARES GOMES DE SOUSA')?'selected':''?> > AMANDA SOARES GOMES DE SOUSA </option>
                            <option <?=($vacinador_4_dose == 'JARDIANE DO NASCIMENTO SANTOS')?'selected':''?> > JARDIANE DO NASCIMENTO SANTOS </option>
                            <option <?=($vacinador_4_dose == 'ANDREIA MACEDO BONFIM')?'selected':''?> > ANDREIA MACEDO BONFIM </option>
                            <option <?=($vacinador_4_dose == 'CILIA DE OLIVEIRA MOTA')?'selected':''?> > CILIA DE OLIVEIRA MOTA </option>
                            <option <?=($vacinador_4_dose == 'MARIA ROSIMARA DE SOUSA OLIVEIRA')?'selected':''?> > MARIA ROSIMARA DE SOUSA OLIVEIRA </option>
                            <option <?=($vacinador_4_dose == 'TAGLLA NATYELLE TORRES DE OLIVEIRA')?'selected':''?> > TAGLLA NATYELLE TORRES DE OLIVEIRA </option>
                            <option <?=($vacinador_4_dose == 'MARIA VALQUIRIA BEZERRA PACIFICO DE ASSIS')?'selected':''?> > MARIA VALQUIRIA BEZERRA PACIFICO DE ASSIS </option>
                            <option <?=($vacinador_4_dose == 'NIVANILDE SOUSA MARTINS')?'selected':''?> > NIVANILDE SOUSA MARTINS </option>
                            <option <?=($vacinador_4_dose == 'LUMENA CRISTINA MOTA PEREIRA')?'selected':''?> > LUMENA CRISTINA MOTA PEREIRA </option>
                            <option <?=($vacinador_4_dose == 'ANTÔNIA JAMILY PORTELA SIQUEIRA COSTA')?'selected':''?> > ANTÔNIA JAMILY PORTELA SIQUEIRA COSTA </option>
                        </select>
                    </div>

                    <div class="col-md-5 m-3" style="text-align: left;">
                        <label>Lote:</label>
                            <input type="name" name="lotequartadose" class="form-control" value="<?php echo $lote_4_dose ?>" autocomplete="off">
                    </div>

                    <div class="col-md-5 m-3" style="text-align: left;">
                        <label>Vacina:</label>
                        <select name="vacina_4" class="form-select">
                          <option <?=($vacina_4 == '')?'selected':''?> > Vacina </option>
                          <option <?=($vacina_4 == 'BUTANTAN/CORONAVAC')?'selected':''?> > BUTANTAN/CORONAVAC </option>
                          <option <?=($vacina_4 == 'FIOCRUZ/ASTRAZENECA')?'selected':''?> > FIOCRUZ/ASTRAZENECA </option>
                          <option <?=($vacina_4 == 'PFIZER-BELGIVA')?'selected':''?> > PFIZER-BELGIVA </option>
                          <option <?=($vacina_4 == 'PFIZER-PEDIATRICA')?'selected':''?> > PFIZER-PEDIÁTRICA </option>
                          <option <?=($vacina_4 == 'JANSSEN PHARMACEUTICA NV')?'selected':''?> > JANSSEN PHARMACEUTICA NV </option>
                        </select>
                    </div>

                    <div class="col-md-5 m-3" style="text-align: left;">
                      <label>Local de vacinação:</label>
                    <select name="localvacinacaoquartadose" class="form-select">
                      <option <?=($local_vacinacao_4 == '')?'selected':''?> > Local de vacinação </option>
                      <option <?=($local_vacinacao_4 == 'UBS - EMATUBA')?'selected':''?> > UBS - EMATUBA </option>
                      <option <?=($local_vacinacao_4 == 'UBS - IAPI')?'selected':''?> > UBS - IAPI </option>
                      <option <?=($local_vacinacao_4 == 'UBS - MONTE SINAI')?'selected':''?> > UBS - MONTE SINAI </option>
                      <option <?=($local_vacinacao_4 == 'UBS - NOVA BETÂNEA')?'selected':''?> > UBS - NOVA BETÂNEA </option>
                      <option <?=($local_vacinacao_4 == 'UBS - PALESTINA')?'selected':''?> > UBS - PALESTINA </option>
                      <option <?=($local_vacinacao_4 == 'UBS - SEDE I CENTRO DE SAÚDE')?'selected':''?> > UBS - SEDE I CENTRO DE SAÚDE </option>
                      <option <?=($local_vacinacao_4 == 'UBS - SEDE II 70')?'selected':''?> > UBS - SEDE II 70 </option>
                      <option <?=($local_vacinacao_4 == 'UBS - SEDE III COHAB')?'selected':''?> > UBS - SEDE III COHAB </option>
                      <option <?=($local_vacinacao_4 == 'UBS- SEDE IV COHAB')?'selected':''?> > UBS- SEDE IV COHAB </option>
                      <option <?=($local_vacinacao_4 == 'UBS - TRANQUEIRAS')?'selected':''?> > UBS - TRANQUEIRAS </option>
                      <option <?=($local_vacinacao_4 == 'UBS - VÁRZEA GRANDE')?'selected':''?> > UBS - VÁRZEA GRANDE </option>

                  </select>
                  </div>
              
                      <div class="col-md-5  m-3" style="text-align: left;">
                          <label>Observações:</label>
                          <input type="name" name="check-obs" class="form-control" value="<?php echo $observacao ?>" autocomplete="off">
                          <input type="name" name="id" class="form-control" value="<?php echo $id?>" style="display: none;" autocomplete="off">
                      </div>
                  
                  <div class="col-md-5 m-3" style="text-align: left;">
                      <label>Dose:</label><br>
                          <select name="dose" class="form-select" required>
                              <option value="">Dose</option>
                              <option value="1">1</option>
                              <option value="2">2</option>
                              <option value="3">Dose de reforço</option>
                              <option value="4">4</option>
                              <option value="Dose única">Dose única</option>
                              <option value="Dose única + reforço">Dose única + reforço</option>
                          </select>
                          <div class="form-text" style="font-style: italic; margin-bottom: 30px; color: red;" id="ajuda" onclick="help()"><i class="far fa-question-circle"></i>&nbsp; Ajuda</div>
                  </div>
                
                  <div class="col-md-5 m-3" >
                  <a href="excluir_beneficiario.php?id=<?php echo $id_beneficiarios ?>" class="btn btn-danger" style="margin-left: 5px;" role="button" onclick="return confirm('Tem certeza que deseja excluir?')">Excluir</a>
                      <a href="cadastro_geral.php" class="btn btn-primary" role="button">Menu cadastro</a>
                
                      <button type="submit" class="btn btn-success" onclick="return confirm('Você tem certeza que deseja editar esses dados?')">Concluir edição</button>
                  </div>

                      
                  </div>
                </form>
              </center>

            <?php } ?>

      </section>


      <script>

            document.querySelector('#ajuda').addEventListener('mouseover',() => {
            document.querySelector('#ajuda').style.cursor = 'pointer';
            });

        function help(){
            document.getElementById("ajuda").innerHTML = "<div class='form-text' style='font-style: italic;font-size: 15px; margin-bottom: 30px; color: gray;'>Antes de confirmar a edição marque '1' se você cadastrou apenas a primeira dose, marque '2' se você cadastrou a primeira e a segunda dose ou marque 'Dose única' se cadastrou algum beneficiário da JANSSEN PHARMACEUTICA NV.</div>"

        }

      </script>

      <!-- FOOTER -->

      <?php 
include_once 'footer.html';
?>


      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
      
</body>
</html>
