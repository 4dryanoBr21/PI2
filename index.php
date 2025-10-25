<?php
session_start();
require_once('functions/conexao.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Captura e sanitiza os dados de forma segura
    $codigo = trim(filter_input(INPUT_POST, 'codigo', FILTER_SANITIZE_STRING));
    $nome = trim(filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING));

    // Validações básicas
    if (empty($codigo)) {
        echo "⚠️ Preencha o código da sala!";
    } elseif (empty($nome)) {
        echo "⚠️ Preencha seu nome!";
    } else {
        // Verifica se a sala existe
        $stmt = $mysqli->prepare("SELECT id_sala, nome_sala FROM sala WHERE codigo_sala = ?");
        if ($stmt) {
            $stmt->bind_param("s", $codigo);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result && $result->num_rows === 1) {
                $sala = $result->fetch_assoc();
                $id_sala = $sala['id_sala'];

                // Insere o participante na tabela
                $stmt_insert = $mysqli->prepare("INSERT INTO participante (nome_participante, fk_sala_atual) VALUES (?, ?)");
                if ($stmt_insert) {
                    $stmt_insert->bind_param("si", $nome, $id_sala);
                    if ($stmt_insert->execute()) {
                        $_SESSION['codigo'] = $codigo;
                        $_SESSION['nome'] = $nome;
                        header("Location: pages/participante.php");
                        exit;
                    } else {
                        echo "❌ Erro ao inserir participante.";
                    }
                    $stmt_insert->close();
                }
            } else {
                echo "⚠️ Código de sala inválido.";
            }

            $stmt->close();
        } else {
            echo "❌ Erro ao preparar consulta SQL.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
    <script src="node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="img/MI_legenda_branco.png" type="image/x-icon">
    <title>ME INSCREVO - Login</title>
</head>

<body>
    <div class="container text-center">
        <img src="img/MI_legenda.png" class="img-fluid my-4" alt="Logo" style="width: 200px;">
        <div class="card mx-auto shadow" style="max-width: 320px;">
            <h2 class="mt-3 fw-bold">Entrar na Sala</h2>
            <div class="card-body">
                <form action="" method="POST">
                    <div class="mb-3 text-start">
                        <label for="codigo" class="form-label">Código da Sala</label>
                        <input name="codigo" type="text" class="form-control" id="codigo" required>
                    </div>
                    <div class="mb-3 text-start">
                        <label for="nome" class="form-label">Nome do Convidado</label>
                        <input name="nome" type="text" class="form-control" id="nome" required>
                    </div>
                    <div class="d-grid gap-2">
                        <button class="btn btn-dark" type="submit">Entrar</button>
                        <button id="login" class="btn btn-outline-dark" type="button">Criar Sala</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

<script>
document.getElementById("login").addEventListener("click", () => {
    window.location.href = "pages/login.php";
});
</script>

</html>