<?php

include('functions/protect.php');
include('functions/conexao.php');

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
    <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="../img/MI_legenda_branco.png" type="image/x-icon">
    <title>ME INSCREVO - Salas</title>
</head>

<body>
    <div class="container">
        <img src="../img/MI_legenda.png" class="img-fluid" alt="..." style="width: 200px;">
        <div class="card" style="width: 300px;">
            <button id="leave" type="button" class="btn-close" aria-label="Close" style="padding: 10px;"></button>
            <h2 style="text-align: center; font-weight: bold;">Reuniões</h2>
            <div class="card-body">
                <form>
                    <div class="d-grid gap-2 overflow-auto shadow p-3 mb-5 bg-body-tertiary rounded" style="height: 200px;">
                        <?php
                            $sql = "SELECT id, nome_sala FROM sala";
                            $resultado = $mysqli->query($sql);

                            if ($resultado->num_rows > 0) {
                              while ($sala = $resultado->fetch_assoc()) {
                                echo '
                                <div class="container d-grid gap-2">
                                    <div class="d-grid gap-2">
                                    <a href="participante.php?id=' . $sala["id"] . '" 
                                       class="btn btn-secondary">
                                       ' . htmlspecialchars($sala["nome_sala"]) . '
                                    </a>
                                  </div>
                                </div>
                                  
                                ';
                              }
                            } else {
                              echo "<p>Nenhuma sala disponível.</p>";
                            }
                        ?>

                    </div>
                    <div class="mb-3">
                        <label for="exampleInput1" class="form-label">Digite o Nome da Sala</label>
                        <input type="text" class="form-control" id="exampleInput1">
                    </div>
                    <div class="d-grid gap-2">
                        <button class="btn btn-dark" type="button">Entrar na Sala</button>
                        <button id="criar_sala" class="btn" type="button">Criar Sala</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

<script>

    const saida = document.getElementById("leave")

    function sair(){
        window.open("index.php")
    }
  
    saida.addEventListener("click", sair)

</script>

<script>

    const criar = document.getElementById("criar_sala")

    function create(){
        window.open("criar.php")
    }
  
    criar.addEventListener("click", create)

</script>

<?php

if(isset($_POST['nome_sala'])) {

            $nome_sala = $mysqli->real_escape_string($_POST['nome_sala']);

            $sql_code = "SELECT * FROM sala WHERE nome_sala = '$nome_sala'";
            $sql_query = $mysqli->query($sql_code) or die("Falha na execução do código SQL: " . $mysqli->error);
            
            $quantidade = $sql_query->num_rows;

            if($quantidade == 1) {

                $usuario = $sql_query->fetch_assoc();

                if(!isset($_SESSION)) {
                    session_start();
                }

                $_SESSION['nome_sala'] = $usuario['nome_sala'];

                header("Location: participante.php");

            } else {
                echo "Falha ao entrar na sala!";
            }

        }   

?>

</html>