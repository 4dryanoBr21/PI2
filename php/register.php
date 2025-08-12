<?php

  if(isset($_POST['submit'])) {

    include_once("conexao.php");
  
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $result = mysqli_query($mysqli, "INSERT INTO usuario (nome, email, senha) VALUES ('$nome', '$email', '$senha')");

  }
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/style.css">
  <link rel="shortcut icon" href="imagens/MI_legenda.png" type="image/x-icon">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
  <title>ME INSCREVO - Registrar</title>
</head>

<body class="register-page">
  <img id="logo-register" src="imagens/MI_legenda.png" alt="">
  <div class="register-container">
    <h1>Registrar</h1>
    <form action="register.php" method="POST">
      <div class="register-text">
        <p>Nome completo</p>
      </div>
      <input type="text" name="nome" placeholder="Fulano da Silva" required>
      <div class="register-text">
        <p>Endereço de e-mail</p>
      </div>
      <input type="email" name="email" placeholder="exemplo@exemplo.com" required>
      <div class="register-text">
        <p>Senha</p>
      </div>
      <input type="password" name="senha" placeholder="exemplo123" required>
      <div class="login-button">
        <button name="submit" id="login-submit" type="submit">Registrar</button>
        <a id="register-ancora" href="../index.php">Login</a>
      </div>
    </form>
  </div>
</body>
</html>