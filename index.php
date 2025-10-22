<?php
    include('functions/conexao.php');

    if (isset($_POST['codigo']) || isset($_POST['nome'])) {

        if (strlen($_POST['codigo']) == 0) {
            echo "Preencha seu código!";
        } else if (strlen($_POST['nome']) == 0) {
            echo "Preencha seu nome!";
        } else {

            $codigo = $mysqli->real_escape_string($_POST['codigo']);
            $nome = $mysqli->real_escape_string($_POST['nome']);

            // Verifica se a sala existe
            $sql_code = "SELECT id_sala, nome_sala FROM sala WHERE codigo_sala = '$codigo'";
            $sql_query = $mysqli->query($sql_code) or die("Falha na execução do SQL: " . $mysqli->error);

            $quantidade = $sql_query->num_rows;

            if ($quantidade == 1) {
            $sala = $sql_query->fetch_assoc();
            $id_sala = $sala['id_sala'];

            // Insere o participante na tabela
            $sql_insert = "INSERT INTO participante (nome_participante, fk_sala_atual) VALUES ('$nome', $id_sala)";
            $mysqli->query($sql_insert) or die("Erro ao inserir participante: " . $mysqli->error);

            if(!isset($_SESSION)) {
                session_start();
            }

            $_SESSION['codigo'] = $codigo;
            $_SESSION['nome'] = $nome;

            header("Location: pages/participante.php");
            exit;

            } else {
                echo "Código ou nome incorretos!";
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
            <h2 style="text-align: center; font-weight: bold; margin-top: 20px;">Entrar na Sala</h2>
            <div class="card-body">
                <form action="" method="POST">
                    <div class="mb-3">
                        <label for="codigo" class="form-label">Código da Sala</label>
                        <input name="codigo" type="text" class="form-control" id="codigo">
                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label">Nome do Convidado</label>
                        <input name="nome" type="text" class="form-control" id="name">
                    </div>
                    <div class="d-grid gap-2">
                        <button class="btn btn-dark" name="submit" type="submit">Entrar</button>
                        <button id="login" class="btn" type="button">Criar Sala</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

<script>
    document.getElementById("login").addEventListener("click", () => {
        window.open("pages/login.php", "_self");
    });
</script>

</html>