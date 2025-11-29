<?php
include("../functions/conexao.php");

if (isset($_POST['submit'])) {

    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $result = mysqli_query($mysqli, "INSERT INTO criador (nome_criador, email, senha) VALUES ('$nome', '$email', '$senha')");

    header("Location: login.php");
}
?>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../style.css">
    <link rel="shortcut icon" href="img/MI_legenda_branco.png" type="image/x-icon">
    <title>ME INSCREVO - Register</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <div class="text-center">
                    <img src="../img/MI_legenda.png" class="rounded" alt="Logo" style="height: 300px;">
                </div>
                <div class="card">
                    <div class="card-body">
                        <h2 class="text-center fw-bold">Register</h2><br>
                        <form action="" method="POST">
                            <label for="exampleInput1" class="form-label">Username</label>
                            <input name="nome" type="text" class="form-control" id="exampleInput1" required><br>

                            <label for="exampleInputEmail1" class="form-label">Email address</label>
                            <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required><br>

                            <label for="exampleInputPassword1" class="form-label">Password</label>
                            <input name="senha" type="password" class="form-control" id="exampleInputPassword1" required><br>

                            <div class="d-grid gap-2">
                                <button class="btn btn-dark" name="submit" type="submit">Registrar</button>
                                <button id="login_page" class="btn" type="button">Login</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-4"></div>
        </div>
    </div>
</body>

<script>
    const login = document.getElementById("login_page")

    function login_page() {
        window.open("login.php", "_self")
    }

    login.addEventListener("click", login_page)
</script>

</html>