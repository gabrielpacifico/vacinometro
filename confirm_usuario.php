<?php
session_start();

if(empty($_POST['usuario']) || empty($_POST['senha'])){
    header('Location: login.php');
    exit();
}

include_once('conexao.php');

$usuario = mysqli_real_escape_string($conexao, $_POST['usuario']);
$senha = mysqli_real_escape_string($conexao, $_POST['senha']);

                    $query = "SELECT * FROM usuarios WHERE usuario = '$usuario' AND senha = md5('$senha') AND stats = 'Ativo'";

                    $result = mysqli_query($conexao, $query);

                    $row = mysqli_num_rows($result);

                        if($row == 1){
                            $_SESSION['senha']= md5($senha);
                            $_SESSION['usuario']= $usuario;
                            echo "<script>window.location.href='cadastro_geral.php';</script>";
                            exit();
                        }else{
                            $_SESSION['unauthenticated'] = true;
                            echo "<script>window.location.href='login.php';</script>";
                            exit();
                        }
                

?>
