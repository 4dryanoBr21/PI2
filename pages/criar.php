<?php
include("../functions/conexao.php");
session_start();


if (!isset($_SESSION['id_criador'])) {
    header('Location: login.php');
    exit();
}

// Gera um código aleatório de 6 caracteres (letras e números)
function gerar_codigo_sala_aleatorio()
{
    $caracteres = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $codigo = '';
    $max = strlen($caracteres) - 1;
    for ($i = 0; $i < 6; $i++) {
        // random_int é seguro; aqui usamos a forma simples sem parâmetros nomeados
        $indice = random_int(0, $max);
        $codigo .= $caracteres[$indice];
    }
    return $codigo;
}

$codigo_sala = gerar_codigo_sala_aleatorio();

if (isset($_POST['submit'])) {
    // Valida e normaliza entradas
    $nome_sala = trim($_POST['nome'] ?? '');
    $tempo = trim($_POST['tempo'] ?? '');
    $codigo = trim($_POST['codigo'] ?? '');

    if ($nome_sala === '' || $tempo === '' || $codigo === '') {
        echo "Por favor preencha todos os campos.";
    } else {
        // Usa prepared statement para inserir de forma segura
        $stmt = $mysqli->prepare("INSERT INTO sala (nome_sala, codigo_sala, tempo_de_fala) VALUES (?, ?, ?)");
        if ($stmt === false) {
            echo "Erro interno. Tente novamente.";
            exit();
        }

        // Liga os valores e executa o INSERT de forma segura
        $stmt->bind_param("sss", $nome_sala, $codigo, $tempo);
        if ($stmt->execute()) {
            $id_sala = $mysqli->insert_id;
            $stmt->close();

            $update = $mysqli->prepare("UPDATE criador SET fk_sala_criada = ? WHERE id_criador = ?");
            if ($update) {
                $update->bind_param('ii', $id_sala, $_SESSION['id_criador']);
                $update->execute();
                $update->close();
            }

            $_SESSION['nome_sala'] = $nome_sala;
            header("Location: criador.php?id_sala=$id_sala");
            exit();
        } else {
            echo "Erro ao criar sala. Tente novamente.";
            $stmt->close();
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
    <title>ME INSCREVO - Criar Sala</title>
</head>

<body>
    <div class="row">
        <div class="col-md-5"></div>
        <div class="col-md-2">
            <img src="../img/MI_legenda.png" class="img-fluid" alt="...">
            <div class="card" style="width: 300px;">
                <h2 style="text-align: center; font-weight: bold;">Criar Sala</h2>
                <div class="card-body">
                    <form action="" method="POST">
                        <div class="mb-3">
                            <label for="nome" class="form-label">Nome da Sala</label>
                            <input name="nome" type="text" class="form-control" id="nome" required />
                        </div>
                        <div class="mb-3">
                            <label for="codigo" class="form-label">Código da Sala</label>
                            <input name="codigo" type="text" class="form-control" id="codigo"
                                value="<?php echo htmlspecialchars($codigo_sala, ENT_QUOTES); ?>" required />
                        </div>
                        <div class="mb-3">
                            <label for="tempo" class="form-label">Tempo de fala dos participantes</label>
                            <input name="tempo" type="time" class="form-control" id="tempo" required />
                        </div>
                        <div class="d-grid gap-2">
                            <button class="btn btn-dark" name="submit" type="submit">Criar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-5"></div>
    </div>
</body>

</html>