<?php
require("conexao.php");

if (!isset($_GET['id_sala'])) {
    echo "0";
    exit;
}

$id_sala = intval($_GET['id_sala']);

// verifica se a sala ainda existe
$stmt = $mysqli->prepare("SELECT id_sala FROM sala WHERE id_sala = ?");
$stmt->bind_param("i", $id_sala);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    echo "1"; // sala existe
} else {
    echo "0"; // sala apagada ou fechada
}