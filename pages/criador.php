<?php
include('../functions/conexao.php');

session_start();

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
  <div class="row">
    <div class="col-md-5"></div>
    <div class="col-md-2">
      <img src="../img/MI_legenda.png" class="img-fluid" alt="...">
      <div class="card" style="width: 300px;">
        <button type="button" class="btn-close" aria-label="Close"></button>
        <h2 style="text-align: center; font-weight: bold;"><?php echo $nome_sala; ?></h2>
        <div class="container">
        </div>
        <div class="card-body">
          <form>
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
              <button id="relogio" class="btn" type="button" style="font-size: 75px;">⏰</button>
            </div>
          </form>
        </div>
      </div>
    </div>
    <div class="col-md-5"></div>
  </div>
  <script>
    const emoji = document.getElementById("relogio");

    emoji.addEventListener("click", () => {
      emoji.textContent = emoji.textContent === "⏰" ? "❌" : "⏰";
    });
  </script>
</body>

</html>