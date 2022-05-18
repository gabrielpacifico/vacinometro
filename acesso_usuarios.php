<?php
session_start();

$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];

if(!isset($_SESSION['usuario'])){
  header('Location: login.php');
  exit();
}
  include_once('conexao.php');

            $query = "SELECT * FROM usuarios WHERE usuario = '$usuario' AND senha = '$senha' AND stats = 'Ativo'";
            $result_query = mysqli_query($conexao, $query);

            while($row = mysqli_fetch_assoc($result_query)){
              $usuario = $row['usuario'];
              $senha = $row['senha'];
              $stats = $row['stats'];
              $cargo = $row['cargo'];
            }

            if($cargo == "Operador"){
              header('Location: cadastro_geral.php');
              exit();
            } 
            if($cargo == "Administrador"){
              
            }

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Vacinômetro - Aprovação de usuários </title>
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

    <section class="container" id="acessousuarios">
            <center>
        <h1 id="titleacesso">Aprove ou reprove novos usuarios</h1>
            </center>
            <div class="container"> 
                <h2 id="subtitleacesso"><i class="fas fa-question-circle"></i>&nbsp;Aprove ou reprove operadores ou administradores para fazer alterações no sistema.</h2>
            </div>

        <div class="container">
            <div class="table-responsive">
            <table id="tablevacinados" class="table table-hover table-bordered">
            <thead>
                <tr>
                <th scope="col">Nome do usuário</th>
                <th scope="col">E-mail</th>
                <th scope="col">Status</th>
                <th scope="col">Cargo</th>
                <th scope="col">Ação</th>
                </tr>
            </thead>
                
                <?php 
                    
                        $sql = "SELECT * FROM usuarios WHERE stats = 'Em espera'";
                        $busca = mysqli_query($conexao, $sql);

                        while ($array = mysqli_fetch_array($busca)) {
                            $id_usuario = $array['id_usuario'];
                            $nome_usuario = $array['usuario'];
                            $email_usuario = $array['email'];
                            $cargo_usuario = $array['cargo'];
                            $status = $array['stats'];

                ?>
            <tbody>
                <tr>
                <td> <?php echo $nome_usuario ?> </td>
                <td> <?php echo $email_usuario ?> </td>
                <td> <?php echo $status ?></td>
                <td> <?php echo $cargo_usuario ?></td>
                <td> <a class="btn btn-success btn-sm" href="user_aprovado.php?id=<?php echo $id_usuario ?>" role="button" onclick="return confirm('Tem certeza que deseja aprovar esse usuário?')"><i class="fas fa-check"></i>&nbsp;Aprovar</a> 
                    <a class="btn btn-danger btn-sm" href="user_reprovado.php?id=<?php echo $id_usuario ?>" role="button" onclick="return confirm('Tem certeza que deseja reprovar esse usuário?')" ><i class="fas fa-times"></i>&nbsp;Reprovar</a>
                </td>

                </tr>
    
                <?php } ?>
            </tbody>
            </table>
              
    

<center>
    <h1 id="titleacesso" style="margin-top: 50px;">Usuários já cadastrados no sistema</h1>
</center>
<div class="container"> 
  <h2 id="subtitleacesso"><i class="far fa-edit"></i>&nbsp;Edite os cargos dos usuários ou exclua-os do banco de dados.</h2>
</div>

      <div class="container">
            <div class="table-responsive">
            <table id="tablevacinados" class="table table-hover table-bordered">
            <thead>
                <tr>
                <th scope="col">Nome do usuário</th>
                <th scope="col">E-mail</th>
                <th scope="col">Status</th>
                <th scope="col">Cargo</th>
                <th scope="col">Ação</th>
                </tr>
            </thead>

            <?php 
                    
                        $sql = "SELECT * FROM usuarios WHERE stats = 'Ativo'";
                        $busca = mysqli_query($conexao, $sql);

                        while ($array = mysqli_fetch_array($busca)) {
                            $id_usuario = $array['id_usuario'];
                            $nome_usuario = $array['usuario'];
                            $email_usuario = $array['email'];
                            $cargo_usuario = $array['cargo'];
                            $status = $array['stats'];

                ?>
            <tbody>
                <tr>
                <td> <?php echo $nome_usuario ?> </td>
                <td> <?php echo $email_usuario ?> </td>
                <td> <?php echo $status ?></td>
                <td> <?php echo $cargo_usuario ?></td>

                <td> <a class="btn btn btn-sm" style="background-color: rgb(219, 157, 22); color: white;" href="user_operador.php?id=<?php echo $id_usuario ?>" role="button" onclick="return confirm('Tem certeza que deseja tornar esse usuário um operador?')"><i class="fas fa-user"></i>&nbsp;Operador</a> 
                    <a class="btn btn btn-sm" style="background-color: rgb(23, 106, 230); color: white;" href="user_admin.php?id=<?php echo $id_usuario ?>" role="button" onclick="return confirm('Tem certeza que deseja tornar esse usuário um administrador?')" ><i class="fas fa-user-cog"></i>&nbsp;Administrador</a>
                    <a class="btn btn btn-sm" style="background-color: rgb(190, 30, 30); color: white;" href="user_excluir.php?id=<?php echo $id_usuario ?>" role="button" onclick="return confirm('Tem certeza que deseja excluir esse usuário do banco de dados?')" ><i class="fas fa-trash-alt"></i>&nbsp;Excluir</a>
              <?php } ?>
              </tbody>
              </table>
              <a href="cadastro_geral.php" class="btn btn-primary" style="margin-bottom:30px" role="button"><i class="fas fa-arrow-left"></i></a>
              </section>
</body>
</html>
