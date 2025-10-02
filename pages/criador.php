<?php

  include('../functions/conexao.php');
  include('../functions/protect.php');

?>

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
  <title>ME INSCREVO - Sala de Test</title>
</head>

<body>
    <div class="container">
        <img src="../img/MI_legenda.png" class="img-fluid" alt="..." style="width: 200px;">
        <div class="card" style="width: 300px;">
            <a href="../functions/sair_e_deletar_sala.php"><button type="button" class="btn-close" aria-label="Close" style="padding: 10px;"></button></a>
            
            <?php

              $sql = "SELECT nome_sala FROM sala";
              $result = $mysqli->query($sql);

              if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                echo '<h2 style="text-align: center; font-weight: bold;">' . htmlspecialchars($row['nome_sala']) . '</h2>';
              } else {
                echo "Nenhum produto encontrado.";
              }
          
          
            ?>
            <div class="container">
              <p>00:00</p>
            </div>
            <div class="card-body">
                <form>
                    <div class="d-grid gap-2 overflow-auto shadow p-3 mb-5 bg-body-tertiary rounded" style="height: 200px;">
                        <p>Adriano 🤚 00:00</p>
                        <p>Adriano 🤚 00:00</p>
                        <p>Adriano 🤚 00:00</p>
                        <p>Adriano</p>
                        <p>Adriano</p>
                        <p>Adriano</p>
                        <p>Adriano</p>
                        <p>Adriano</p>
                        <p>Adriano</p>
                        <p>Adriano</p>
                        <p>Adriano</p>
                        <p>Adriano</p>
                        <p>Adriano</p>
                        <p>Adriano</p>
                        <p>Adriano</p>
                        <p>Adriano</p>
                        <p>Adriano</p>
                        <p>Adriano</p>
                        <p>Adriano</p>
                    </div>
                    <div class="d-grid gap-2">
                        <button id="relogio" class="btn" type="button" style="font-size: 75px;">⏰</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

<script>
  const emoji = document.getElementById("relogio")

  function troca_de_emoji() {
    if (emoji.textContent === "⏰") {
      emoji.textContent = "❌"
    } else {
        emoji.textContent = "⏰"
    }
  }

  emoji.addEventListener("click", troca_de_emoji)
</script>


</html>