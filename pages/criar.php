<!DOCTYPE html>
<html lang="en">

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
    <div class="container">
        <img src="../img/MI_legenda.png" class="img-fluid" alt="..." style="width: 200px;">
        <div class="card" style="width: 300px;">
            <button type="button" class="btn-close" aria-label="Close" style="padding: 10px;"></button>
            <h2 style="text-align: center; font-weight: bold;">Criar Sala</h2>
            <div class="card-body">
                <form action="" method="POST">
                    <div class="mb-3">
                        <label for="exampleInput1" class="form-label">Nome da Sala</label>
                        <input name="nome" type="text" class="form-control" id="exampleInput1" required />
                    </div>
                    <div class="mb-3">
                        <label for="exampleInput1" class="form-label">Tempo de fala dos participantes</label>
                        <input name="tempo" type="time" class="form-control" id="exampleInput1" required />
                    </div>
                    <div class="d-grid gap-2">
                        <button class="btn btn-dark" name="submit" type="submit">Criar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

<?php

    include_once("../functions/conexao.php");
    include('../functions/protect.php');

    if(isset($_POST['submit'])) {
  
        $nome = $_POST['nome'];
        $tempo = $_POST['tempo'];

        $result = mysqli_query($mysqli, "INSERT INTO sala (nome_sala, tempo_maximo_fala) VALUES ('$nome', '$tempo')");

        $_SESSION['nome_sala'] = $nome;

        header("Location: criador.php");
        exit();

    }
?>

</html>