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
    <title>Vacinômetro - Cadastro de vacinadores</title>
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
            <h1 id="titlevacinados">Cadastro de vacinadores</h1>
        </center>
        <a href="cadastro_geral.php" class="btn btn-primary" role="button"><i class="fas fa-arrow-left"></i></a>
        <div id="subvac">
            <h2 id="subtitlecadastro"><i class="fas fa-question-circle"></i>&nbsp; Cadastro de vacinadores do município de Independência/CE</h2>
        </div>

        <center>

        <form action="cadastro_vacinador_concluido.php" method="POST">
            <div class="form-control">
                <div class="col-md-5  m-3" style="text-align: left;">
                    <label>Vacinador</label>
                    <input type="text" name="vacinador" class="form-control" placeholder="Vacinador" autocomplete="off" required>
                </div>
                <div class="col-md-5 m-3" >
                        <a href="cadastro_geral.php" class="btn btn-primary" role="button">Menu cadastro</a>
                  
                        <button type="submit" class="btn btn-success" onclick="return confirm('Você tem certeza que deseja cadastrar esse vacinador?')">Cadastrar</button>
                    </div>
                  
                
                </div>
            </div>
        </form>

        </center>

</body>
</html>