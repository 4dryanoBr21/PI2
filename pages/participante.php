<?php

include('../functions/protect.php');
include('../functions/conexao.php');

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/style.css">
  <link rel="shortcut icon" href="imagens/MI_legenda.png" type="image/x-icon">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
  <script src="js/script.js"></script>
  <title>ME INSCREVO</title>
</head>

<body class="participante-page">
  <div class="participante-container-center">
    <div class="participante-container">
      <div class="saida">
        <a href="salas.php"><span id="emoji" style="font-size: 20px; cursor: pointer;">❌</span></a>
      </div>
      <h1>Sala de test</h1>
        <!-- <?php 
          $sql = "SELECT id, nome_sala FROM sala";
          $resultado = $mysqli->query($sql);

          if ($resultado->num_rows > 0) {
            while ($sala = $resultado->fetch_assoc()) {
              echo '<h1 href="participante.php?id=' . $sala['id'] . '">' . $sala['nome_sala'] . '</h1>';
            }
          } else {
            echo "<p>Nenhuma sala disponível.</p>";
          }
        ?> -->
      <div class="cronometro">
        <p>00:00</p>
      </div>
      <div class="participante-container-texto">
        <div class="participante-container-">
          <div class="participante-container-fila">
            <h3>Adriano</h3>
            <span id="emoji" style="font-size: 20px; cursor: pointer;">🤚</span>
            <p>00:00</p>
          </div>
          <div class="participante-container-fila">
            <h3>Maria</h3>
            <span id="emoji" style="font-size: 20px; cursor: pointer;">🤚</span>
            <p>00:00</p>
          </div>
          <div class="participante-container-fila">
            <h3>José</h3>
            <span id="emoji" style="font-size: 20px; cursor: pointer;">🤚</span>
            <p>00:00</p>
          </div>
          <div class="participante-container-fila">
            <h3>Mariano</h3>
          </div>
          <div class="participante-container-fila">
            <h3>Castro</h3>
          </div>
          <div class="participante-container-fila">
            <h3>André</h3>
          </div>
          <div class="participante-container-fila">
            <h3>Sofia</h3>
          </div>
          <div class="participante-container-fila">
            <h3>Eduardo</h3>
          </div>
          <div class="participante-container-fila">
            <h3>João</h3>
          </div>
          <div class="participante-container-fila">
            <h3>Mariano</h3>
          </div>
          <div class="participante-container-fila">
            <h3>Castro</h3>
          </div>
          <div class="participante-container-fila">
            <h3>André</h3>
          </div>
          <div class="participante-container-fila">
            <h3>Sofia</h3>
          </div>
          <div class="participante-container-fila">
            <h3>Eduardo</h3>
          </div>
          <div class="participante-container-fila">
            <h3>João</h3>
          </div>
        </div>
      </div>
      <span id="emoji" style="font-size: 80px; cursor: pointer;">🤚</span>
    </div>
  </div>
</body>

</html>