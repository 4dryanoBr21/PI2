<?php

include('/php/protect.php');

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
      <a href="/php/logout.php"><span id="emoji" style="font-size: 20px; cursor: pointer;">❌</span></a>
    </div>
    <h1>Salas disponiveis</h1>
    <div class="salas-container">
      <div class="salas-card">
        <h2><a href="usr.php">Nome da Sala 1</a></h2>
      </div>
    </div>
    <form action="criar.php">
      <input type="text" placeholder="Procurar sala existente" class="form-input-salas">
      <button type="submit">Criar Reunião</button>
    </form>
  </div>
</body>
</html>