<?php include('protect.php');?>

<?php

  if(isset($_POST['submit'])) {

    include_once("conexao.php");
  
    $nome = $_POST['nome'];
    $codigo = $_POST['codigo'];
    $tempo = $_POST['tempo'];

    $result = mysqli_query($mysqli, "INSERT INTO sala (nome_sala, codigo_sala, tempo_fala) VALUES ('$nome', '$codigo', '$tempo')");

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
    <title>ME INSCREVO - Login</title>
</head>
<body class="criar-page">
    <div class="criar-container">
      <div class="saida">
        <a href="salas.php"><span id="emoji" style="font-size: 20px; cursor: pointer;">❌</span></a>
      </div>
      <h1>Criar reunião</h1>
        <form id="form" action="" method="POST">
          <input name="nome" type="text" placeholder="Nome da reunião" required />
          <input name="codigo" type="text" placeholder="Código da reunião" required />
          <p>
            Tempo de fala dos participantes
          </p>
          <input id="tempo" name="tempo" type="text" placeholder="" required />
          <button name="submit" type="submit">Criar</button>
        </form>
      </div>
</body>
</html>