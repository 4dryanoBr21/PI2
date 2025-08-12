<?php

    include("php/conexao.php");

    if(isset($_POST['email']) || isset($_POST['password'])) {

        if(strlen($_POST['email']) == 0) {
            echo "Preencha seu email!";
        } else if(strlen($_POST['password']) == 0) {
            echo "Preencha sua senha!";
        } else {

            $email = $mysqli->real_escape_string($_POST['email']);
            $senha = $mysqli->real_escape_string($_POST['password']);

            $sql_code = "SELECT * FROM usuario WHERE email = '$email' AND senha = '$senha'";
            $sql_query = $mysqli->query($sql_code) or die("Falha na execução do código SQL: " . $mysqli->error);
            
            $quantidade = $sql_query->num_rows;

            if($quantidade == 1) {

                $usuario = $sql_query->fetch_assoc();

                if(!isset($_SESSION)) {
                    session_start();
                }

                $_SESSION['id'] = $usuario['id'];
                $_SESSION['nome'] = $usuario['nome'];

                header("Location: php/salas.php");

            } else {
                echo "Falha no login!";
            }

        }   

    }

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="php/css/style.css">
  <link rel="shortcut icon" href="imagens/MI_legenda.png" type="image/x-icon">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
  <script src="js/script.js"></script>
  <title>ME INSCREVO - Login</title>
</head>

<body class="login-page">
  <img id="logo-login" src="imagens/MI_legenda.png" alt="">
  <div class="login-container">
    <h1>Login</h1>
    <form action="" method="POST">
      <div class="login-text">
        <p>Email</p>
      </div>
      <input type="text" placeholder="exemplo@exemplo.com" name="email" id="login">
      <div class="login-text">
        <p>Senha</p>
      </div>
      <input type="password" placeholder="exemplo123" name="password" id="senha">
      <div class="login-button">
        <button id="login-submit" type="submit">Entrar</button>
        <a id="register-ancora" href="php/register.php">Registrar</a>
      </div>
    </form>
  </div>
</body>

</html>