<?php
include('protect.php');
include('conexao.php');

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
?>