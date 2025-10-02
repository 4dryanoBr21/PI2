<?php
    session_start();
    $nome_sala = isset($_GET['sala']) ? urldecode($_GET['sala']) : 'Sala Desconhecida';
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
    <title>ME INSCREVO - <?php echo htmlspecialchars($nome_sala); ?></title>
</head>

<body>
    <div class="container">
        <img src="../img/MI_legenda.png" class="img-fluid" alt="..." style="width: 200px;">
        <div class="card" style="width: 300px;">
            <button id="close" type="button" class="btn-close" aria-label="Close" style="padding: 10px;"></button>
            <h2 style="text-align: center; font-weight: bold;"><?php echo htmlspecialchars($nome_sala); ?></h2>
            <div class="card-body">
                <form>
                    <div class="d-grid gap-2 overflow-auto shadow p-3 mb-5 bg-body-tertiary rounded" style="height: 200px;">
                        
                        <div id="quero_falar" style="margin-bottom: 15px;">
                            
                        </div>
                        <p>Adriano </p>
                        <p>Adriano</p>
                        <p>Adriano</p>
                    </div>
                    <div class="d-grid gap-2">
                        <button id="mao" class="btn" type="button" style="font-size: 75px;">🤚</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

<script>
  const emoji = document.getElementById("mao")
  const lista = document.getElementById("quero_falar")

  function troca_de_emoji() {
    emoji.textContent = (emoji.textContent === "🤚") ? "❌" : "🤚"
  }

  function troca_de_lista() {
    lista.textContent = (lista.textContent === "") 
    ? "<?php echo htmlspecialchars($_SESSION['nome']); ?> 🤚 00:00" 
    : "";

  }

  var fechar_btn = document.getElementById("close")

  function fechar_page(){
    open("salas.php", "_self")
  }

  fechar_btn.addEventListener("click", fechar_page)
  emoji.addEventListener("click", troca_de_emoji)
  emoji.addEventListener("click", troca_de_lista)
  
</script>

</html>