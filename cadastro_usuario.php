<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Vacinômetro - Cadastrar usuário</title>
  
  <link rel="shortcut icon" type="image/png" href="img/favicon.png"> 
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css">
  <link rel="stylesheet" href="styles.css">
</head>

<body id="corpologin">
    <form action="insert_usuario.php" method="POST">
   
    <div id="cadastro_user" class="container">
        <center><a href="vacinometro.php"><img id="login" src="img/logo.png"></a></center>
        <center><h1 id="titlelogin">CADASTRAR USUÁRIO&nbsp;</h1></center>
        <strong><article id="subtitlelogin">Usuário</article></strong>
        <input type="text" name="nome_usuario" class="form-control" placeholder="Nome de usuário" autocomplete="off" required>

        <?php
        if(isset($_SESSION['user_already_exists'])){
        ?>
        <div class="alert alert-danger d-flex align-items-center" id="aviso" role="alert">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">
          <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
        </svg>
        <div>
        O usuário digitado já existe, tente outro.
        </div>
      </div>
       <?php 
        }
        unset($_SESSION['user_already_exists'])
       ?>

        <strong><article id="subtitlelogin">E-mail</article></strong>
        <input type="email" name="email_usuario" class="form-control" placeholder="Email" autocomplete="off" required>

        <strong><article id="subtitlelogin">CPF/CNPJ</article></strong>
        <input type="number" name="cpfcnpj" class="form-control" placeholder="CPF ou CNPJ apenas números" autocomplete="off" required>

        <strong><article id="subtitlelogin">Cargo</article></strong>
        <select class="form-select" style="color: gray;" name="cargo" required>
          <option value="">Cargo</option>
          <option value="Operador">Operador</option>
          <option value="Administrador">Administrador</option>
        </select>

        <strong><article id="subtitlelogin">Senha</article></strong>
        <input type="password" id="txtSenha" name="senha_usuario" class="form-control" placeholder="Senha" autocomplete="off" required>
        <strong><article id="subtitlelogin">Repetir senha</article></strong>
        <input type="password" name="repetir_senha" class="form-control" placeholder="Repetir sua senha" autocomplete="off" required oninput="validaSenha(this)">
        <br>
        <small style="font-style: italic;">Ao realizar o cadastro, você terá que esperar ser aceito por algum administrador.</small>
        <br><br>
        <small><a href="login.php">Voltar para o login</a></small>
        <center>
        <br>
        <button style="width: 50%; margin-bottom: 100px;" type="submit" class="btn btn-light">Cadastrar</button></center>
    </div>

</form>

<script>
	function validaSenha (input){ 
	if (input.value != document.getElementById('txtSenha').value) {
	input.setCustomValidity('As senhas não coincidem, tente novamente.');
	} else {
	input.setCustomValidity('');
	}
	} 
	</script>

</body>
</html>