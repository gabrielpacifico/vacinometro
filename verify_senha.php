<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vacinômetro - Alterar senha</title>
    <link rel='shortcut icon' type='image/png' href='img/favicon.png'> 
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x' crossorigin='anonymous'>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css'>
    <link rel='stylesheet' href='styles.css'>

<?php

if(empty($_POST['user_recup']) || empty($_POST['email_recup']) || empty($_POST['cpfcnpj_recup'])){
    header('Location: recuperar_senha.php');
    exit();
}

include_once ('conexao.php');

    $usuario = $_POST['user_recup'];
    $email = $_POST['email_recup'];
    $cpfcnpj = $_POST['cpfcnpj_recup'];

    $found_user = "SELECT * FROM `usuarios` WHERE (usuario LIKE '$usuario') AND (email LIKE '$email') AND (cpfcnpj LIKE '$cpfcnpj')";

    $result = mysqli_query($conexao, $found_user);

    while($array = mysqli_fetch_assoc($result)){
        $id_usuario = $array['id_usuario'];
    }
    $row = mysqli_num_rows($result);
    
    if($row == 1){  
        echo "
        <body id='corporecuperar'>
        <form action='update_senha.php' method='POST'>
        <div id='recup_senha' class='container'>
        <center><a href='vacinometro.php'><img id='login' src='img/logo.png'></a></center>
        <center><h1 id='titlelogin'>Alterar senha&nbsp;</h1></center>

        <div class='alert d-flex align-items-center' id='aviso3' role='alert'>
        <svg xmlns='http://www.w3.org/2000/svg' width='24' height='24' fill='currentColor' class='bi bi-check-circle-fill me-2' viewBox='0 0 16 16'>
        <path d='M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z'/>
        </svg>
        <div>
        Usuário encontrado!
        </div>
        
        </div>

        <input type='hidden' name='id' style='color:gray;' class='form-control' value='$id_usuario' autocomplete='off' readonly>
        
        <strong><article id='subtitlelogin'>Usuário</article></strong>
        <input type='text' name='user_newpass' style='color:gray;' class='form-control' value='$usuario' autocomplete='off' readonly>

        <strong><article id='subtitlelogin'>E-mail</article></strong>
        <input type='email' name='email_newpass' style='color:gray;' class='form-control' value='$email' autocomplete='off' readonly >

        <strong><article id='subtitlelogin'>CPF/CNPJ</article></strong>
        <input type='number' name='cpfcnpj_newpass' style='color:gray;' class='form-control' value='$cpfcnpj' autocomplete='off' readonly>

        <strong><article id='subtitlelogin'>Nova senha</article></strong>
        <input type='password' id='txtSenha' name='new_pass' class='form-control' placeholder='Nova senha' autocomplete='off' required>

        <strong><article id='subtitlelogin'>Repetir nova senha</article></strong>
        <input type='password' name='repeat_new_pass' class='form-control' placeholder='Repetir nova senha' autocomplete='off' required oninput='validaSenha(this)'>
        
        <br><br>
        <a href='recuperar_senha.php' class='btn btn-primary' style='float: left;' role='button'><i class='fas fa-arrow-left'></i></a>

        <button type='submit' class='btn btn-success' style='float: right;' style='margin-bottom: 30px;'>Alterar senha</button>
        
        </div>
        </form>
        
        <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js' integrity='sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4' crossorigin='anonymous'></script>
        </body>
    
    <script>
	function validaSenha (input){ 
	if (input.value != document.getElementById('txtSenha').value) {
	input.setCustomValidity('As senhas não coincidem, tente novamente.');
	} else {
	input.setCustomValidity('');
	}
	} 
	</script>";

    } else{
        $_SESSION['not_exists'] = true;
        echo "<script>window.location.href='recuperar_senha.php';</script>";
        exit();
    }

?>