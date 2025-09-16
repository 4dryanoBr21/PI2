<?php

    include("functions/conexao.php");

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

                header("Location: salas.php");

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
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
    <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="../img/MI_legenda_branco.png" type="image/x-icon">
    <title>ME INSCREVO - Login</title>
</head>

<body>
    <div class="container">
        <img src="../img/MI_legenda.png" class="img-fluid" alt="..." style="width: 200px;">
        <div class="card" style="width: 300px;">
            <h2 style="text-align: center; font-weight: bold; margin-top: 20px;">Login</h2>
            <div class="card-body">
                <form action="" method="POST">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Endereço de email</label>
                        <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Senha</label>
                        <input name="password" type="password" class="form-control" id="exampleInputPassword1">
                    </div>
                    <div class="d-grid gap-2">
                        <button class="btn btn-dark" type="submit">Entrar</button>
                        <a class="d-grid gap-2" href="register.php"><button class="btn" type="button">Registrar</button></a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>