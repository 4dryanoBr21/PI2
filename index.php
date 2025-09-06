<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
    <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/style.css">
    <title>Document</title>
</head>

<body>
    <div class="container">
        <img src="img/MI_legenda.png" class="img-fluid" alt="...">
        <form action="" method="POST">
            <div class="form-floating mb-3">
                <input name="email" type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                <label for="floatingInput">Email address</label>
            </div>
            <div class="form-floating">
                <input name="password" type="password" class="form-control" id="floatingPassword" placeholder="Password">
                <label for="floatingPassword">Password</label>
            </div>
            <div class="d-grid gap-2">
                <button class="btn btn-dark" type="submit" style="margin-top: 20px;">Login</button>
        </form>
        <!-- Button Trigger Register Modal -->
        <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
            Register
        </button>
    </div>
    </div>
</body>

<!-- Register Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Register</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="form-floating">
                    <input type="text" class="form-control" id="floatingInputGroup1" placeholder="Username"
                        style="margin-bottom: 18px;">
                    <label for="floatingInputGroup1">Username</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                    <label for="floatingInput">Email address</label>
                </div>
                <div class="form-floating">
                    <input type="password" class="form-control" id="floatingPassword" placeholder="Password">
                    <label for="floatingPassword">Password</label>
                </div>
                <div class="form-floating" style="margin-top: 18px;">
                    <input type="password" class="form-control" id="floatingPassword" placeholder="Password">
                    <label for="floatingPassword">Repeat your Password</label>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-dark">Register</button>
            </div>
        </div>
    </div>
</div>

</html>

<?php

    include("../projetomi/functions/conexao.php");

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

                header("Location: pages/salas.php");

            } else {
                echo "Falha no login!";
            }

        }   

    }

?>