<?php
    require("../functions/conexao.php");
    session_start();

    if (!isset($_SESSION['codigo']) || !isset($_SESSION['nome'])) {
        header("Location: ../index.php");
        exit;
    }

    $codigo_sala = $_SESSION['codigo'];
    $nome_participante = $_SESSION['nome'];

    $stmt = $mysqli->prepare("SELECT id_sala, nome_sala FROM sala WHERE codigo_sala = ?");
    $stmt->bind_param("s", $codigo_sala);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result && $result->num_rows > 0) {
        $sala = $result->fetch_assoc();
        $id_sala = $sala['id_sala'];
        $nome_sala = $sala['nome_sala'];
    } else {
        echo "Sala não encontrada.";
        exit;
    }

    $stmt->close();

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <script src="../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="../style.css">
    <link rel="shortcut icon" href="../img/MI_legenda_branco.png" type="image/x-icon">
    <title>ME INSCREVO - <?php echo htmlspecialchars($nome_sala); ?></title>
</head>

<body>
    <div class="container">
        <img src="../img/MI_legenda.png" class="img-fluid" alt="..." style="width: 200px;">
        <div class="card" style="width: 300px;">
            <h2 style="text-align: center; font-weight: bold;"><?php echo htmlspecialchars($nome_sala); ?></h2>
            <div class="container text-center">
                <p>Bem-vindo(a), <strong><?php echo htmlspecialchars($nome_participante); ?></strong></p>
            </div>
            <div class="card-body">
                <div class="d-grid gap-2 overflow-auto shadow p-3 mb-5 bg-body-tertiary rounded" style="height: 200px;">
                    <?php
                        $sql = "SELECT nome_participante FROM participante WHERE fk_sala_atual = ?";
                        $stmt_part = $mysqli->prepare($sql);
                        $stmt_part->bind_param("i", $id_sala);
                        $stmt_part->execute();
                        $result_part = $stmt_part->get_result();

                        if ($result_part->num_rows > 0) {
                            while ($row = $result_part->fetch_assoc()) {
                                echo "<p>" . htmlspecialchars($row['nome_participante']) . "</p>";
                            }
                        } else {
                            echo "<p>Nenhum participante na sala ainda.</p>";
                        }

                        $stmt_part->close();
                    ?>
                </div>
                <div class="d-grid gap-2">
                    <button id="relogio" class="btn" type="button" style="font-size: 75px;">🤚</button>
                </div>
            </div>
        </div>
    </div>
</body>
</html>