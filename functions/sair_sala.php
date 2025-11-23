<?php
require("conexao.php");
session_start();

if (!isset($_SESSION['id_participante'])) {
    echo "erro";
    exit;
}

$id_participante = $_SESSION['id_participante'];

$stmt = $mysqli->prepare("UPDATE participante SET fk_sala_atual = NULL WHERE id_participante = ?");
$stmt->bind_param("i", $id_participante);

if ($stmt->execute()) {
    echo "ok";
} else {
    echo "erro";
}

$stmt->close();
?>