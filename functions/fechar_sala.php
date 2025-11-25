<?php
require("conexao.php");
session_start();

if (!isset($_SESSION['id_criador'])) {
    echo "erro";
    exit;
}

if (!isset($_POST['id_sala'])) {
    echo "erro";
    exit;
}

$id_criador = intval($_SESSION['id_criador']);
$id_sala = intval($_POST['id_sala']);

// 1) Remover vínculo do criador
$stmt1 = $mysqli->prepare("UPDATE criador SET fk_sala_criada = NULL WHERE id_criador = ?");
$stmt1->bind_param("i", $id_criador);
$stmt1->execute();

// 2) Deletar todos os participantes dessa sala
$stmt2 = $mysqli->prepare("DELETE FROM participante WHERE fk_sala_atual = ?");
$stmt2->bind_param("i", $id_sala);
$stmt2->execute();

// 3) Deletar a sala
$stmt3 = $mysqli->prepare("DELETE FROM sala WHERE id_sala = ?");
$stmt3->bind_param("i", $id_sala);
$stmt3->execute();

echo "ok";