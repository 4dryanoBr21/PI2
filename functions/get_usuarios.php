<?php
include('conexao.php');

if (!isset($_GET['id_sala'])) {
    die("ID inválido");
}

$id_sala = intval($_GET['id_sala']);

$stmt = $mysqli->prepare("SELECT nome_participante FROM participante WHERE fk_sala_atual = ?");
$stmt->bind_param("i", $id_sala);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    echo "<p>Nenhum participante na sala ainda.</p>";
} else {
    while ($row = $result->fetch_assoc()) {
        echo "<p>" . htmlspecialchars($row['nome_participante']) . "</p>";
    }
}

$stmt->close();
?>