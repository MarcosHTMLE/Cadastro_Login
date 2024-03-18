<?php

ini_set('display_errors', 'Off');

error_reporting(E_ALL & ~E_WARNING);
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cadastro e Login</title>
  <link rel="stylesheet" href="index.css">
</head>
<body>
<div class="form-container">
      <h2>Login</h2>
      <form id="loginForm" method="POST" action="login.php">
        <input type="email" id="loginEmail" name="email" placeholder="E-mail" required>
        <input type="password" id="loginSenha" name="senha" placeholder="Senha" required>
        <button type="submit">Login</button>
      </form>
      <form action="cadastro.php">
        <button type="submit">Cadastre-se</button>
      </form>
    </div>
   
  </div>
</body>
</html>

<?php 

require_once("classes.php");

  $email = $_POST["email"];
  $senha = $_POST["senha"];


  $usuario = new Usuario();
  $usuario->setEmail($email);
  $usuario->setSenha($senha);

  $sql = new ClasseSQL();

  $sql->Logar($usuario->getEmail(), $usuario->getSenha());



?>
