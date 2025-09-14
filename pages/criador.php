https://www.youtube.com/watch?v=n6OJXt6eTko&list=PLWXw8Gu52TRI5NJmexwA9qco33goFxbHK<?php

include('../functions/conexao.php');
include('../functions/protect.php');

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/style.css">
  <link rel="shortcut icon" href="imagens/MI_legenda.png" type="image/x-icon">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
    rel="stylesheet">
  <script src="js/script.js"></script>
  <title>ME INSCREVO</title>
</head>

<body class="criador-page">
  <div class="criador-container-center">
    <div class="criador-container">
      <div class="saida">
        <a href="../functions/sair_e_deletar_sala.php" id=""><span id="emoji" style="font-size: 20px; cursor: pointer;">❌</span></a>
      </div>
      <?php

        $sql = "SELECT nome_sala FROM sala";
        $result = $mysqli->query($sql);

        if ($result->num_rows > 0) {
          $row = $result->fetch_assoc();
          echo "<h1>" . htmlspecialchars($row['nome_sala']) . "</h1>";
        } else {
          echo "Nenhum produto encontrado.";
        }


      ?>
      <div class="cronometro">
        <p>00:00</p>
      </div>
      <div class="criador-container-texto">
        <div class="criador-container-">
          <div class="criador-container-fila">
            <h3>Adriano</h3><span id="emoji" style="font-size: 20px; cursor: pointer;">🤚</span>
            <p>00:00</p>
          </div>
          <div class="criador-container-fila">
            <h3>Maria</h3><span id="emoji" style="font-size: 20px; cursor: pointer;">🤚</span>
            <p>00:00</p>
          </div>
          <div class="criador-container-fila">
            <h3>José</h3><span id="emoji" style="font-size: 20px; cursor: pointer;">🤚</span>
            <p>00:00</p>
          </div>
          <div class="criador-container-fila">
            <h3>Mariano</h3>
          </div>
          <div class="criador-container-fila">
            <h3>Castro</h3>
          </div>
          <div class="criador-container-fila">
            <h3>André</h3>
          </div>
          <div class="criador-container-fila">
            <h3>Sofia</h3>
          </div>
          <div class="criador-container-fila">
            <h3>Eduardo</h3>
          </div>
          <div class="criador-container-fila">
            <h3>João</h3>
          </div>
        </div>
      </div>
      <span id="emoji" style="font-size: 80px; cursor: pointer;">🕐</span>
    </div>
  </div>
</body>
<script>
  // Função para atualizar o cronômetro
  
  `tempo_fala`
  function atualizarCronometro() {
    const cronometro = document.querySelector('.cronometro p');
    let tempo = 0;

    setInterval(() => {
      tempo++;
      const minutos = Math.floor(tempo / 60);
      const segundos = tempo % 60;
      cronometro.textContent = `${String(minutos).padStart(2, '0')}:${String(segundos).padStart(2, '0')}`;
    }, 1000);
  }
// Iniciar o cronômetro ao carregar a página
  window.onload = atualizarCronometro;  


</script>
</html>