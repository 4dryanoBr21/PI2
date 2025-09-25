<?php
    include("../PI2/functions/conexao.php");
    session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
    <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="img/MI_legenda_branco.png" type="image/x-icon">
    <title>ME INSCREVO - Login</title>
</head>

<body>
    <div class="container">
        <img src="img/MI_legenda.png" class="img-fluid" alt="..." style="width: 200px;">
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
                        <input name="password" type="password" class="form-control" id="password">
                    </div>
                    <div class="d-grid gap-2">
                        <button class="btn btn-dark" name="submit" type="submit">Entrar</button>
                        <button id="cad" class="btn" type="button">Registrar</button>
                    </div>
                </form>

                <?php
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
                    $password = htmlspecialchars($_POST['password'], ENT_QUOTES, 'UTF-8');

                    if (strlen($email) == 0 || strlen($password) == 0) {
                        echo '<div class="alert alert-warning mt-3" role="alert">Preencha seu email e senha!</div>';
                    } else {
                        $sql_code = "SELECT * FROM usuario WHERE email = ? AND senha = ?";
                        $stmt = $mysqli->prepare($sql_code);
                        $stmt->bind_param("ss", $email, $password);
                        $stmt->execute();
                        $result = $stmt->get_result();

                        if ($result->num_rows == 1) {
                            $usuario = $result->fetch_assoc();

                            // Verifica se já está logado em outro local
                            if ($usuario['is_logged_in'] == 1) {
                                echo '<div class="alert alert-danger mt-3" role="alert">
                                        Este usuário já está logado em outro dispositivo/navegador!
                                      </div>';
                            } else {
                                // Marca como logado
                                $update = $mysqli->prepare("UPDATE usuario SET is_logged_in = 1 WHERE id = ?");
                                $update->bind_param("i", $usuario['id']);
                                $update->execute();

                                $_SESSION['id'] = $usuario['id'];
                                $_SESSION['nome'] = $usuario['nome'];
                                header("Location: /PI2/pages/salas.php");
                                exit;
                            }
                        } else {
                            echo '<div class="alert alert-danger mt-3" role="alert">Falha no login!</div>';
                        }
                        $stmt->close();
                    }
                }
                ?>
            </div>
        </div>
    </div>
</body>

<script>
    document.getElementById("cad").addEventListener("click", () => {
        window.open("../PI2/pages/register.php", "_self");
    });
</script>

</html>