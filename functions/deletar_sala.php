<?php
require("conexao.php");
session_start();

if (!isset($_SESSION['id_criador'])) {
    echo "erro_sessao";
    exit;
}

if (!isset($_POST['id_sala'])) {
    echo "erro_sala";
    exit;
}

$id_sala = intval($_POST['id_sala']);
$id_criador = intval($_SESSION['id_criador']);

/* 1. Remover vínculo do criador com a sala */
$stmt1 = $mysqli->prepare("UPDATE criador SET fk_sala_criada = NULL WHERE id_criador = ?");
$stmt1->bind_param("i", $id_criador);
$stmt1->execute();

/* 2. Deletar a sala somente se realmente for do criador */
$stmt2 = $mysqli->prepare("DELETE FROM sala WHERE id_sala = ? AND fk_criador = ?");
$stmt2->bind_param("ii", $id_sala, $id_criador);

if ($stmt2->execute()) {
    echo "ok";
} else {
    echo "erro";
}

$stmt1->close();
?>