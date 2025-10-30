<?php 
    include("../functions/conexao.php");
    
    session_start();

    if (isset($_POST['submit'])) {
    
        $nome_sala = mysqli_real_escape_string($mysqli, $_POST['nome']);
        $tempo = mysqli_real_escape_string($mysqli, $_POST['tempo']);
    
        $result = mysqli_query($mysqli, "INSERT INTO sala (nome_sala, tempo_de_fala) VALUES ('$nome_sala', '$tempo')");
    
        if ($result) {
            $id_sala = mysqli_insert_id($mysqli);

            $stmt = $mysqli->prepare("UPDATE criador SET fk_sala_criada = ? WHERE id_criador = ?");
            $stmt->bind_param("ii", $id_sala, $_SESSION['id_criador']);
            $stmt->execute();


            if (!isset($_SESSION['nome_criador'])) {
                die("Sessão inválida: nome de usuário não encontrado.");
            }
            
            $_SESSION['nome_sala'] = $_POST['nome'];

            header("Location: criador.php?id_sala=$id_sala");
            exit();
        } else {
            echo "<p style='color:red;'>Erro ao criar sala: " . mysqli_error($mysqli) . "</p>";
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