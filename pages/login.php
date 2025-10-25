<?php 
    include("../functions/conexao.php"); 
                
    if(isset($_POST['email']) || isset($_POST['senha'])) {

        if(strlen($_POST['email']) == 0) {
            echo "Prencha seu email!";
            } else if(strlen($_POST['senha']) == 0) {
                echo "Prencha sua senha!";
            } else {

                $email = $mysqli->real_escape_string($_POST['email']);
                $senha = $mysqli->real_escape_string($_POST['senha']);

                $sql_code = "SELECT * FROM criador WHERE email = '$email' AND senha = '$senha'";
                $sql_query = $mysqli->query($sql_code) or die("Falha na execução do SQL: " . $mysqli->error);

                $quantidade = $sql_query->num_rows;

                if($quantidade == 1) {  

                    $usuario = $sql_query->fetch_assoc();

                    if(!isset($_SESSION)) {
                        session_start();
                    }

                    $_SESSION['id'] = $usuario['id_criador'];
                    $_SESSION['nome_criador'] = $usuario['nome_criador'];

                    header("Location: criar.php");

                } else {
                    echo "email ou senha incorretos!";
                }

        }
    }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <script src="../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../style.css">
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
                        <label for="email" class="form-label">Endereço de email</label>
                        <input name="email" type="email" class="form-control" id="email">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Senha</label>
                        <input name="senha" type="password" class="form-control" id="password">
                    </div>
                    <div class="d-grid gap-2">
                        <button class="btn btn-dark" name="submit" type="submit">Entrar</button>
                        <button id="cad" class="btn" type="button">Registrar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

<script>
    document.getElementById("cad").addEventListener("click", () => {
        window.open("register.php", "_self");
    });
</script>

</html>