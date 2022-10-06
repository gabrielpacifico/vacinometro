<?php

session_start();

$usuario = $_SESSION['usuario'];

if(!isset($_SESSION['usuario'])){
  header('Location: login.php');
  exit();
}

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Vacinômetro - Cadastro de vacinados</title>
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

      <section id="cadastrovacinados" class="container">
        <center>
            <h1 id="titlevacinados">Cadastro dos vacinados contra a Covid-19</h1>
        </center>
        <a href="cadastro_geral.php" class="btn btn-primary" role="button"><i class="fas fa-arrow-left"></i></a>
        <div id="subvac">
            <h2 id="subtitlecadastro"><i class="fas fa-question-circle"></i>&nbsp; Cadastro dos vacinados contra a Covid-19, caso o beneficiário só tenha tomado a primeira dose, poderá deixar os campos de outras doses em branco e preenchê-los assim que for tomada.</h2>
        </div>

        <center>

            <form action="cadastro_vacinados_concluido.php" method="POST">
                <div style="margin-top: 30px;">

                    <article id="cabecalhocadastro">Informações sobre a primeira dose/dose única</article>

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
                        <input type="name" name="beneficiariovac" class="form-control" placeholder="Beneficiário" autocomplete="off" required>
                    </div>

                    <div class="col-md-5  m-3" style="text-align: left;">
                      <label>CPF:</label>
                          <input type="name" name="cpfbeneficiario" class="form-control" placeholder="CPF" autocomplete="off">
                      </div>

                      <?php
                   
                            if(isset($_SESSION['cpf_already_exists'])){
                      ?>
                            <div class="alert alert-danger d-flex align-items-center" id="aviso4" role="alert" >
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="24" fill="currentColor" class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">
                              <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                            </svg>
                            <div>
                            CPF duplicado, tente outro CPF ou edite o usuário no sistema.
                            </div>
                          </div>
                      <?php 
                            }
                            unset($_SESSION['cpf_already_exists'])
                      
                      ?>

                      <div class="col-md-5  m-3" style="text-align: left;">
                        <label>Cartão do SUS:</label>
                            <input type="name" name="susbeneficiario" class="form-control" placeholder="Cartão do SUS" autocomplete="off">
                        </div>

                        <?php
                   
                            if(isset($_SESSION['sus_already_exists'])){
                        ?>
                              <div class="alert alert-danger d-flex align-items-center" id="aviso4" role="alert" >
                              <svg xmlns="http://www.w3.org/2000/svg" width="20" height="24" fill="currentColor" class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">
                                <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                              </svg>
                              <div>
                              Cartão do SUS duplicado, tente outro cartão do SUS ou edite o usuário no sistema.
                              </div>
                            </div>
                        <?php 
                              }
                              unset($_SESSION['sus_already_exists'])
                        
                        ?>

                    <div class="col-md-5 m-3" style="text-align: left;">
                        <label>Idade:</label>
                            <input type="number" name="idade" class="form-control" placeholder="Idade" autocomplete="off" required>
                    </div>

                    <div class="col-md-5 m-3" style="text-align: left;">
                        <label>Sexo:</label>
                        <select name="sexo" class="form-select" required>
                          <option value="">Sexo</option>
                          <option value="Masculino">Masculino</option>
                          <option value="Feminino">Feminino</option>
                          <option value="Recusa à dizer">Recusa a dizer</option>
                        </select>

                    </div>

                    <div class="col-md-5 m-3" style="text-align: left;">
                        <label>Data de nascimento:</label>
                            <input type="date" name="datanasc" id="nasc" class="form-control" placeholder="Data de nascimento" autocomplete="off" required>
                    </div>

                    <div class="col-md-5 m-3" style="text-align: left;" required>
                            <label>Categoria:</label>
                            <select name="categoriavac" class="form-select">
                            <option value="">Categoria</option>
                            
                
                                <?php
                                include 'conexao.php';
                                $busca_categoria = "SELECT * FROM `categorias` ORDER BY categoria ASC";
                                $result = mysqli_query($conexao, $busca_categoria);
                    
                                while($array = mysqli_fetch_array($result)){
                                $id_categorias = $array['id_categorias'];
                                $categoria = $array['categoria'];
                                echo "<option value='$categoria'>$categoria</option>";
                                }
                    
                                ?>
                            </select>
                          </div>

                    <div class="col-md-5 m-3" style="text-align: left;">
                        <label>Fase:</label>
                            <input type="number" name="faseprimeiradose" class="form-control" placeholder="Utilize apenas números(ex: 1,2,3...)" autocomplete="off">
                    </div>

                    <div class="col-md-5 m-3" style="text-align: left;">
                        <label>Data de vacinação:</label>
                            <input type="date" name="datavacprimeiradose" class="form-control" placeholder="Data de vacinação" autocomplete="off">
                    </div>

                    <div class="col-md-5 m-3" style="text-align: left;">
                        <label>Local aplicado:</label>
                        <select name="localaplicado" class="form-select">
                          <option value="">Local aplicado</option>
                          <option value="Braço direito">Braço direito</option>
                          <option value="Braço esquerdo">Braço esquerdo</option>
                        </select>

                    </div>

                    <div class="col-md-5 m-3" style="text-align: left;">
                        <label>Vacinador:</label>
                            <select name="vacinadorprimeiradose" class="form-select">
                            <option value="">Vacinador</option>

                                <?php 
                                $busca_vacinador = "SELECT * FROM `vacinadores`";
                                $result_vacinador = mysqli_query($conexao, $busca_vacinador);

                                while($array = mysqli_fetch_array($result_vacinador)){
                                    $id_vacinador = $array['id_vacinador'];
                                    $vacinador = $array['vacinador'];
                                    echo "<option value='$vacinador'>$vacinador</option>";
                                }
                                
                                ?>
                            </select>
                    </div>

                    <div class="col-md-5 m-3" style="text-align: left;">
                        <label>Lote da vacina:</label>
                            <input type="name" name="loteprimeiradose" class="form-control" placeholder="Lote" autocomplete="off">
                    </div>

                    <div class="col-md-5 m-3" style="text-align: left;">
                        <label>Vacina:</label>
                        <select name="vacina" class="form-select">
                          <option value="">Vacina</option>
                          <option value="BUTANTAN/CORONAVAC">BUTANTAN/CORONAVAC</option>
                          <option value="FIOCRUZ/ASTRAZENECA">FIOCRUZ/ASTRAZENECA</option>
                          <option value="PFIZER-BELGIVA">PFIZER-BELGIVA</option>
                          <option value="PFIZER-PEDIATRICA">PFIZER-PEDIÁTRICA</option>
                          <option value="JANSSEN PHARMACEUTICA NV">JANSSEN PHARMACEUTICA NV</option>
                        </select>
                    </div>

                    <div class="col-md-5 m-3" style="text-align: left;">
                        <label>Local de vacinação:</label>
                    <select style="margin-bottom: 20px;" name="localvacinacaoprimeiradose" class="form-select">
                    <option value="">Unidade de saúde</option>


                        <?php 
                        $busca_uniatend = "SELECT * FROM `unidades`";
                        $result_uni = mysqli_query($conexao, $busca_uniatend);

                        while($array = mysqli_fetch_array($result_uni)){
                            $id_unidade = $array['id_unidade'];
                            $unidade = $array['unidade'];
                            echo "<option value='$unidade'>$unidade</option>";
                        }
                        
                        ?>
                    </select>
                    </div>  
                    <div class="accordion" id="accordionExample">
                        <div class="accordion-item">
                          <h2 class="accordion-header" id="seg-dose">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#segundaDose" aria-expanded="true" aria-controls="segundaDose">
                              Informações sobre a segunda dose/reforço dose única
                            </button>
                          </h2>
                          <div id="segundaDose" class="accordion-collapse collapse" aria-labelledby="seg-dose" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <article id="cabecalhocadastro">Informações sobre a segunda dose/reforço dose única</article>

                                <div class="col-md-5 m-3" style="text-align: left;">
                                    <label>Data de vacinação:</label>
                                        <input type="date" name="datavacsegundadose" class="form-control" placeholder="Data de vacinação" autocomplete="off">
                                </div>
            
                                <div class="col-md-5 m-3" style="text-align: left;">
                                    <label>Vacinador:</label>
                                        <select name="vacinadorsegundadose" class="form-select">
                                        <option value="">Vacinador</option>
            
                                            <?php 
                                            $busca_vacinador = "SELECT * FROM `vacinadores`";
                                            $result_vacinador = mysqli_query($conexao, $busca_vacinador);
            
                                            while($array = mysqli_fetch_array($result_vacinador)){
                                                $id_vacinador = $array['id_vacinador'];
                                                $vacinador = $array['vacinador'];
                                                echo "<option value='$vacinador'>$vacinador</option>";
                                            }
                                            
                                            ?>
                                        </select>
                                </div>
            
                                <div class="col-md-5 m-3" style="text-align: left;">
                                    <label>Lote:</label>
                                        <input type="name" name="lotesegundadose" class="form-control" placeholder="Lote" autocomplete="off">
                                </div>
            
                                <div class="col-md-5 m-3" style="text-align: left;">
                                    <label>Vacina:</label>
                                    <select name="vacina_2" class="form-select">
                                      <option value="">Vacina</option>
                                      <option value="BUTANTAN/CORONAVAC">BUTANTAN/CORONAVAC</option>
                                      <option value="FIOCRUZ/ASTRAZENECA">FIOCRUZ/ASTRAZENECA</option>
                                      <option value="PFIZER-BELGIVA">PFIZER-BELGIVA</option>
                                      <option value="PFIZER-PEDIATRICA">PFIZER-PEDIÁTRICA</option>
                                      <option value="JANSSEN PHARMACEUTICA NV">JANSSEN PHARMACEUTICA NV</option>
                                    </select>
                                </div>

                                <div class="col-md-5 m-3" style="text-align: left;">
                                    <label>Local de vacinação:</label>
                                <select name="localvacinacaosegundadose" class="form-select">
                                <option value="">Unidade de saúde</option>
            
            
                                    <?php 
                                    $busca_uniatend = "SELECT * FROM `unidades`";
                                    $result_uni = mysqli_query($conexao, $busca_uniatend);
            
                                    while($array = mysqli_fetch_array($result_uni)){
                                        $id_unidade = $array['id_unidade'];
                                        $unidade = $array['unidade'];
                                        echo "<option value='$unidade'>$unidade</option>";
                                    }
                                    
                                    ?>
                                </select>
                                </div>
                            </div>
                          </div>
                        </div>
                    
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="ter-dose">
                              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#terceiraDose" aria-expanded="false" aria-controls="terceiraDose">
                                Informações sobre a terceira dose
                              </button>
                            </h2>
                            <div id="terceiraDose" class="accordion-collapse collapse" aria-labelledby="ter-dose" data-bs-parent="#accordionExample">
                              <div class="accordion-body">
                                <article id="cabecalhocadastro">Informações sobre a terceira dose</article>

                                <div class="col-md-5 m-3" style="text-align: left;">
                                    <label>Data de vacinação:</label>
                                        <input type="date" name="datavacterceiradose" class="form-control" placeholder="Data de vacinação" autocomplete="off">
                                </div>
            
                                <div class="col-md-5 m-3" style="text-align: left;">
                                    <label>Vacinador:</label>
                                        <select name="vacinadorterceiradose" class="form-select">
                                        <option value="">Vacinador</option>
            
                                            <?php 
                                            $busca_vacinador = "SELECT * FROM `vacinadores`";
                                            $result_vacinador = mysqli_query($conexao, $busca_vacinador);
            
                                            while($array = mysqli_fetch_array($result_vacinador)){
                                                $id_vacinador = $array['id_vacinador'];
                                                $vacinador = $array['vacinador'];
                                                echo "<option value='$vacinador'>$vacinador</option>";
                                            }
                                            
                                            ?>
                                        </select>
                                </div>
            
                                <div class="col-md-5 m-3" style="text-align: left;">
                                    <label>Lote:</label>
                                        <input type="name" name="loteterceiradose" class="form-control" placeholder="Lote" autocomplete="off">
                                </div>

                                <div class="col-md-5 m-3" style="text-align: left;">
                                    <label>Vacina:</label>
                                    <select name="vacina_3" class="form-select">
                                      <option value="">Vacina</option>
                                      <option value="BUTANTAN/CORONAVAC">BUTANTAN/CORONAVAC</option>
                                      <option value="FIOCRUZ/ASTRAZENECA">FIOCRUZ/ASTRAZENECA</option>
                                      <option value="PFIZER-BELGIVA">PFIZER-BELGIVA</option>
                                      <option value="PFIZER-PEDIATRICA">PFIZER-PEDIÁTRICA</option>
                                      <option value="JANSSEN PHARMACEUTICA NV">JANSSEN PHARMACEUTICA NV</option>
                                    </select>
                                </div>
            
                                <div class="col-md-5 m-3" style="text-align: left;">
                                    <label>Local de vacinação:</label>
                                <select name="localvacinacaoterceiradose" class="form-select">
                                <option value="">Unidade de saúde</option>
            
            
                                    <?php 
                                    $busca_uniatend = "SELECT * FROM `unidades`";
                                    $result_uni = mysqli_query($conexao, $busca_uniatend);
            
                                    while($array = mysqli_fetch_array($result_uni)){
                                        $id_unidade = $array['id_unidade'];
                                        $unidade = $array['unidade'];
                                        echo "<option value='$unidade'>$unidade</option>";
                                    }
                                    
                                    ?>
                                </select>
                                </div>
                              </div>
                            </div>
                          </div>


                          <div class="accordion-item">
                            <h2 class="accordion-header" id="quart-dose">
                              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#quartaDose" aria-expanded="false" aria-controls="quartaDose">
                                Informações sobre a quarta dose
                              </button>
                            </h2>
                            <div id="quartaDose" class="accordion-collapse collapse" aria-labelledby="quart-dose" data-bs-parent="#accordionExample">
                              <div class="accordion-body">
                                <article id="cabecalhocadastro">Informações sobre a quarta dose</article>

                                <div class="col-md-5 m-3" style="text-align: left;">
                                    <label>Data de vacinação:</label>
                                        <input type="date" name="datavacquartadose" class="form-control" placeholder="Data de vacinação" autocomplete="off">
                                </div>
            
                                <div class="col-md-5 m-3" style="text-align: left;">
                                    <label>Vacinador:</label>
                                        <select name="vacinadorquartadose" class="form-select">
                                        <option value="">Vacinador</option>
            
                                            <?php 
                                            $busca_vacinador = "SELECT * FROM `vacinadores`";
                                            $result_vacinador = mysqli_query($conexao, $busca_vacinador);
            
                                            while($array = mysqli_fetch_array($result_vacinador)){
                                                $id_vacinador = $array['id_vacinador'];
                                                $vacinador = $array['vacinador'];
                                                echo "<option value='$vacinador'>$vacinador</option>";
                                            }
                                            
                                            ?>
                                        </select>
                                </div>
            
                                <div class="col-md-5 m-3" style="text-align: left;">
                                    <label>Lote:</label>
                                        <input type="name" name="lotequartadose" class="form-control" placeholder="Lote" autocomplete="off">
                                </div>

                                <div class="col-md-5 m-3" style="text-align: left;">
                                    <label>Vacina:</label>
                                    <select name="vacina_4" class="form-select">
                                      <option value="">Vacina</option>
                                      <option value="BUTANTAN/CORONAVAC">BUTANTAN/CORONAVAC</option>
                                      <option value="FIOCRUZ/ASTRAZENECA">FIOCRUZ/ASTRAZENECA</option>
                                      <option value="PFIZER-BELGIVA">PFIZER-BELGIVA</option>
                                      <option value="PFIZER-PEDIATRICA">PFIZER-PEDIÁTRICA</option>
                                      <option value="JANSSEN PHARMACEUTICA NV">JANSSEN PHARMACEUTICA NV</option>
                                    </select>
                                </div>
            
                                <div class="col-md-5 m-3" style="text-align: left;">
                                    <label>Local de vacinação:</label>
                                <select name="localvacinacaoquartadose" class="form-select">
                                <option value="">Unidade de saúde</option>
            
            
                                    <?php 
                                    $busca_uniatend = "SELECT * FROM `unidades`";
                                    $result_uni = mysqli_query($conexao, $busca_uniatend);
            
                                    while($array = mysqli_fetch_array($result_uni)){
                                        $id_unidade = $array['id_unidade'];
                                        $unidade = $array['unidade'];
                                        echo "<option value='$unidade'>$unidade</option>";
                                    }
                                    
                                    ?>
                                </select>
                                </div>
                              </div>
                            </div>
                          </div>
                       
                      
                          <div class="col-md-5  m-3" style="text-align: left;">
                            <label>Observações:</label>
                            <input type="name" name="check-obs" class="form-control" placeholder="Insira observações do beneficiário" autocomplete="off">
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
                        <a href="cadastro_geral.php" class="btn btn-primary" role="button">Menu cadastro</a>
                  
                        <button type="submit" class="btn btn-success" onclick="return confirm('Você tem certeza que deseja cadastrar esses dados?')">Cadastrar</button>
                    </div>
                  
                
                </div>
              
            </form>
          </center>

      </section>

      <script>

            document.querySelector('#ajuda').addEventListener('mouseover',() => {
            document.querySelector('#ajuda').style.cursor = 'pointer';
            });

        function help(){
            document.getElementById("ajuda").innerHTML = "<div class='form-text' style='font-style: italic;font-size: 15px; margin-bottom: 30px; color: gray;'>Antes de confirmar o cadastro marque (1) se você cadastrou apenas a primeira dose, marque (2) se você cadastrou a primeira e a segunda dose, marque (3) se você cadastrou a primeira, segunda e terceira dose ou marque (Dose única) se cadastrou algum beneficiário da JANSSEN PHARMACEUTICA NV.</div>";

        }

      </script>

      <!-- FOOTER -->

      <?php 
      include_once 'footer.html';
      ?>

      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
      
</body>
</html>