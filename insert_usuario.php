<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Vacinômetro - Usuário cadastrado!</title>
  
  <link rel="shortcut icon" type="image/png" href="img/favicon.png"> 
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css">
  <link rel="stylesheet" href="styles.css">
</head>

<body id="corpologin">

    <?php 

        include 'conexao.php';

        $nome = $_POST['nome_usuario'];
        $email = $_POST['email_usuario'];
        $senha = $_POST['senha_usuario'];
        $cpfcnpj = $_POST['cpfcnpj'];
        $cargo = $_POST['cargo'];
        $status = 'Em espera';

        $sql_user = "SELECT * FROM usuarios WHERE usuario = '$nome'";
                    $result_user = mysqli_query($conexao, $sql_user);
                    $qnt_user = mysqli_num_rows($result_user);

                if($qnt_user > 0){
                    $_SESSION['user_already_exists'] = true;
                    echo "<script>window.location.href='cadastro_usuario.php';</script>";
                    exit();
                }else{

                    $insert = "INSERT INTO usuarios (usuario, email, senha, cpfcnpj, cargo, stats) VALUES ('$nome', '$email', md5('$senha'), '$cpfcnpj' , '$cargo', '$status')";   

                    if (mysqli_query($conexao, $insert)) {
                    
                        ?> <center><br><br><h2 id="cadastroconcluido"> Cadastro feito com sucesso! </h2>
                        <br><h2 id="cadastroconcluido"> Agora espere até ser aprovado por algum administrador. </h2>
                        <a href="login.php" class="btn btn-primary" style="margin-top: 30px;">Voltar</a></center> <?php
                                                            }
                    
                        else { 
                    
                            ?> <center><br><br><h2 id="cadastroconcluido"> Erro!! O cadastro não foi feito. </h2> 
                        <a href="cadastro_usuario.php" class="btn btn-primary" style="margin-top: 30px;">Voltar</a></center><?php
                    
                            }
                
                }
        
        
            ?>

</body>
</html>