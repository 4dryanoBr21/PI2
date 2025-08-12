<?php

include('../functions/protect.php');
include('../functions/conexao.php');

?>

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

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/style.css">
  <link rel="shortcut icon" href="imagens/MI_legenda.png" type="image/x-icon">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
  <title>ME INSCREVO</title>
</head>

<body class="salas-page">
  <div class="salas-container-center">
    <div class="saida">
      <a href="../functions/logout.php"><span id="emoji" style="font-size: 20px; cursor: pointer;">❌</span></a>
    </div>
      <h1>Salas disponiveis</h1>
    <div class="salas-container">
      <div class="salas-card" id="lista-salas">
<!-- 
        <?php
          $sql = "SELECT id, nome_sala FROM sala";
          $resultado = $mysqli->query($sql);
          if ($resultado->num_rows > 0) {
            while ($sala = $resultado->fetch_assoc()) {
              echo '
                <div class="salas">
                  <a href="participante.php?id=' . $sala["id"] . '"><h2>' . htmlspecialchars($sala["nome_sala"]) . '</h2></a>
                </div>
              ';
            }
          } else {
            echo "<p>Nenhuma sala disponível.</p>";
          }
        ?> -->

      </div>
    </div>
    <form action="" method="POST">
      <input name="nome_sala" type="text" placeholder="Digite o nome da sala" class="form-input-salas">
      <button name="submit" id="entrar-sala" type="submit">Entrar</button>
    </form>
      <a href="criar.php"><button type="submit">Criar Reunião</button></a>
  </div>
</body>

<script>
  function carregarSalas() {
    fetch('../functions/salas_ajax.php')
      .then(response => response.text())
      .then(data => {
        document.getElementById('lista-salas').innerHTML = data;
      });
  }
  setInterval(carregarSalas, 1000);
  window.onload = carregarSalas;
</script>

</html>