<?php

    include('../functions/protect.php');
    include('../functions/conexao.php');

    $alert_message = null;
    $salas = [];
    $salas_rows = [];

    $sql = "SELECT id_sala, nome_sala FROM sala";
    $resultado = $mysqli->query($sql);
    if ($resultado) {
        while ($row = $resultado->fetch_assoc()) {
            $salas_rows[] = $row;
            $salas[] = $row['nome_sala'];
        }
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['nome_sala'])) {
        $nome_sala = trim($_POST['nome_sala']);

        if ($nome_sala === '') {
            $alert_message = "Informe o nome da sala!";
        } else {
            $stmt = $mysqli->prepare("SELECT id_sala, nome_sala FROM sala WHERE nome_sala = ? LIMIT 1");
            if ($stmt) {
                $stmt->bind_param('s', $nome_sala);
                $stmt->execute();
                $res = $stmt->get_result();

                if ($res && $res->num_rows === 1) {
                    $sala = $res->fetch_assoc();
                    $_SESSION['nome_sala'] = $sala['nome_sala'];

                    $nome_url = urlencode($sala['nome_sala']);
                    header("Location: participante.php?sala=" . $nome_url);
                    exit;
                } else {
                    $alert_message = "Sala não encontrada!";
                }

                $stmt->close();
            } else {
                $alert_message = "Erro interno ao preparar a consulta.";
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <script src="../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="../style.css">
    <link rel="shortcut icon" href="../img/MI_legenda_branco.png" type="image/x-icon">
    <title>ME INSCREVO - Salas</title>
</head>

<body>
    <div class="container">
        <img src="../img/MI_legenda.png" class="img-fluid" alt="logo" style="width: 200px;">
        <div class="card" style="width: 300px;">
            <a href="../functions/logout.php"><button type="button" class="btn-close" aria-label="Close" style="padding: 10px;"></button></a>
            <h2 style="text-align: center; font-weight: bold;">Reuniões</h2>
            <div class="card-body">
                <form method="POST">
                    <div class="d-grid gap-2 overflow-auto shadow p-3 mb-3 bg-body-tertiary rounded" style="height: 200px;">
                        <?php
                            if (count($salas_rows) > 0) {
                                foreach ($salas_rows as $sala) {
                                    echo '<div class="container d-grid gap-2">
                                            <div class="d-grid gap-2">
                                                <a href="participante.php?sala=' . urlencode($sala["nome_sala"]) . '" class="btn btn-secondary">'
                                                . htmlspecialchars($sala["nome_sala"]) .
                                                '</a>
                                            </div>
                                        </div>';
                                }
                            } else {
                                echo "<p>Nenhuma sala disponível.</p>";
                            }

                        ?>
                    </div>

                    <?php if (!empty($alert_message)): ?>
                        <div class="alert alert-warning text-center" role="alert">
                            <?php echo htmlspecialchars($alert_message); ?>
                        </div>
                    <?php endif; ?>

                    <div class="mb-3 position-relative">
                        <label for="searchInput1" class="form-label">Digite o Nome da Sala</label>
                        <input type="text" class="form-control" id="searchInput1" name="nome_sala" autocomplete="off">
                        <div id="autocomplete-list" class="autocomplete-items"></div>
                    </div>

                    <div class="d-grid gap-2">
                        <button class="btn btn-dark" type="submit">Entrar na Sala</button>
                        <button id="criar_sala" class="btn" type="button">Criar Sala</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

<script>
    
    const salas = <?php echo json_encode($salas, JSON_UNESCAPED_UNICODE); ?>;

    const input = document.getElementById("searchInput1");
    const list = document.getElementById("autocomplete-list");

    input.addEventListener("input", function() {
        const val = this.value.toLowerCase();
        list.innerHTML = "";

        if (!val) return;

        const matches = salas.filter(s => s.toLowerCase().includes(val));

        matches.forEach(sala => {
            const item = document.createElement("div");
            item.textContent = sala;
            item.addEventListener("click", function() {
                input.value = sala;
                list.innerHTML = "";
            });
            list.appendChild(item);
        });
    });

    document.addEventListener("click", function(e) {
        if (e.target !== input) {
            list.innerHTML = "";
        }
    });

    document.getElementById("criar_sala").addEventListener("click", function() {
        window.open("criar.php", "_self");
    });

</script>
</html>