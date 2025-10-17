<?php

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    session_start();
    include('../functions/conexao.php'); 
    include('../functions/protect.php'); 
    
    if (!isset($_GET['id_sala'])) {
        die("Sala não especificada. <a href='criar.php'>Voltar</a>");
    }
    
    $id_sala = intval($_GET['id_sala']);
    
    $sql = "SELECT * FROM sala WHERE id_sala = $id_sala";
    $result = $mysqli->query($sql);
    
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $nome_sala = htmlspecialchars($row['nome_sala']);
        $tempo_fala = htmlspecialchars($row['tempo_de_fala']);
    } else {
        die("Sala não encontrada. <a href='criar.php'>Voltar</a>");
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
  <title>ME INSCREVO - Sala <?php echo $nome_sala; ?></title>
</head>

<body>
    <div class="container">
        <img src="../img/MI_legenda.png" class="img-fluid" alt="..." style="width: 200px;">
        <div class="card" style="width: 300px;">
            <a href="../functions/sair_e_deletar_sala.php?id_sala=<?php echo $id_sala; ?>">
              <button type="button" class="btn-close" aria-label="Close" style="padding: 10px;"></button>
            </a>

            <h2 style="text-align: center; font-weight: bold;"><?php echo $nome_sala; ?></h2>

            <div class="container">
              <p><?php echo $tempo_fala; ?></p>
            </div>

            <div class="card-body">
                <form>
                    <div class="d-grid gap-2 overflow-auto shadow p-3 mb-5 bg-body-tertiary rounded" style="height: 200px;">
                        <?php
                            
                            $sql = "SELECT participante.nome_participante FROM participante JOIN sala ON sala.id_sala = participante.fk_sala_atual WHERE sala.id_sala = $id_sala;";
                            $result = $mysqli->query($sql);
                            
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    echo "<p>" . htmlspecialchars($row['nome_participante']) . "</p>";
                                }
                            } else {
                                echo "<p>Nenhum participante encontrado.</p>";
                            }

                            
                        ?>
                    </div>
                    <div class="d-grid gap-2">
                        <button id="relogio" class="btn" type="button" style="font-size: 75px;">⏰</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

<script>
  const emoji = document.getElementById("relogio");

  emoji.addEventListener("click", () => {
    emoji.textContent = emoji.textContent === "⏰" ? "❌" : "⏰";
  });
</script>
</body>
</html>