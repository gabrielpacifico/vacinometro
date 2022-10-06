<?php session_start();

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
    <title> Vacinômetro - Cadastro de vacinas </title>
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


       <section id="cadastrovacinas" class="container">
            <center>
                <h1 id="titlevacinas">Cadastro de vacinas e doses recebidas e aplicadas</h1>
            </center>
            <a href="cadastro_geral.php" class="btn btn-primary" role="button"><i class="fas fa-arrow-left"></i></a>
            <div id="subvac">
                <h2 id="subtitlecadastro"><i class="fas fa-question-circle"></i>&nbsp; Aqui você irá cadastrar a quantidade de vacinas recebidas, a quantidade de doses aplicadas no total e na primeira e segunda dose.</h2>
            </div>

            <center>
              <?php
                      include_once 'conexao.php';

                        $codesql = "SELECT * FROM `vacinas`";
                        $inserir = mysqli_query($conexao, $codesql);

                        while($row = mysqli_fetch_assoc($inserir)){
                              $vac_recebidas = $row['vacinas_recebidas'];
                              $doses_aplicadas = $row['doses_aplicadas'];
                              $primeiradose = $row['primeira_dose'];
                              $segundadose = $row['segunda_dose'];
                              $terceiradose = $row['terceira_dose'];
                              $dose_unica = $row['dose_unica'];
                    ?>
                    
            <form action="cadastro_vacinas_concluido.php" method="POST">
                <div class="form-control" style="margin-top: 30px;">
                    <div class="col-md-5  m-3" style="text-align: left;">
                    <label>Vacinas recebidas:</label>
                        <input type="number" name="vacrecebidas" class="form-control" value="<?php echo $vac_recebidas ?>" autocomplete="off" required>
                    </div>

                    <div class="col-md-5 m-3" style="text-align: left;">
                        <label>Doses aplicadas:</label>
                            <input type="number" name="dosesaplicadas" class="form-control" value="<?php echo $doses_aplicadas ?>" autocomplete="off" required>
                    </div>

                    <div class="col-md-5 m-3" style="text-align: left;">
                        <label>Primeiras doses aplicadas: </label>
                            <input type="number" name="primeirasdosesaplicadas" class="form-control" value="<?php echo $primeiradose ?>" autocomplete="off">
                    </div>

                    <div class="col-md-5 m-3" style="text-align: left;">
                        <label>Segundas doses aplicadas: </label>
                            <input type="number" name="segundasdosesaplicadas" class="form-control" value="<?php echo $segundadose ?>" autocomplete="off">
                    </div>

                    <div class="col-md-5 m-3" style="text-align: left;">
                        <label>Terceiras doses aplicadas: </label>
                            <input type="number" name="terceirasdosesaplicadas" class="form-control" value="<?php echo $terceiradose ?>" autocomplete="off">
                    </div>

                    <div class="col-md-5 m-3" style="text-align: left;">
                        <label>Doses únicas aplicadas: </label>
                            <input type="number" name="doseunicaaplicadas" class="form-control" value="<?php echo $dose_unica ?>" autocomplete="off">
                    </div>

                    <div class="col-md-5 m-3" >
                        <a href="cadastro_geral.php" class="btn btn-primary" role="button">Menu cadastro</a>
                  
                        <button type="submit" class="btn btn-success">Cadastrar</button>
                    </div>
                  
                <?php } ?>
                </div>
              
            </form>
          </center>
        </section>

        <!-- FOOTER -->

        <?php 
        include_once 'footer.html';
        ?>

      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
      
</body>
</html>