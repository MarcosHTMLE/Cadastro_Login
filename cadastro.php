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
  <div class="container">
    <div class="form-container">
      <h2>Cadastro</h2>
      <form id="cadastroForm" method="POST" action="cadastro.php">
        <input type="text" id="nome" placeholder="Nome" name="nome" required>
        <input type="email" id="email" placeholder="E-mail" name="email" required>
        <input type="password" id="senha" placeholder="Senha" name="senha" required>
        <button type="submit">Cadastrar</button>
      </form>
      <form action="login.php">
        <button type="submit">Login</button>
      </form>
    </div>
  </div>
</body>
</html>

<?php

    require_once("classes.php");

    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $senha = $_POST["senha"];

    $usuario = new Usuario();

    $usuario->setNome($nome);
    $usuario->setEmail($email);
    $usuario->setSenha($senha);

    $sql = new ClasseSQL();

    $sql->Cadastrar($usuario->getNome(), $usuario->getEmail(), $usuario->getSenha());

?>