<?php
    include_once("../functions/conexao.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <script src="../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="../style.css">
    <link rel="shortcut icon" href="../img/MI_legenda_branco.png" type="image/x-icon">
    <title>ME INSCREVO - Register</title>
</head>

<body>
    <div class="container">
        <img src="../img/MI_legenda.png" class="img-fluid" alt="..." style="width: 200px;">
        <div class="card" style="width: 300px;">
            <h2 style="text-align: center; font-weight: bold; margin-top: 20px;">Register</h2>
            <div class="card-body">
                <form action="" method="POST">
                    <div class="mb-3">
                        <label for="exampleInput1" class="form-label">Username</label>
                        <input name="nome" type="text" class="form-control" id="exampleInput1" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email address</label>
                        <input  name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input name="senha" type="password" class="form-control" id="exampleInputPassword1" required>
                    </div>
                    <div class="d-grid gap-2">
                        <button class="btn btn-dark" name="submit" type="submit">Registrar</button>
                        <button id="login_page" class="btn" type="button">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

<script>

    const login = document.getElementById("login_page")

    function login_page(){
        window.open("../index.php")
    }
  
    login.addEventListener("click", login_page)

</script>

<?php

  if(isset($_POST['submit'])) {
  
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $result = mysqli_query($mysqli, "INSERT INTO usuario (nome, email, senha) VALUES ('$nome', '$email', '$senha')");

    header("Location: ../index.php");

  }
?>

</html>