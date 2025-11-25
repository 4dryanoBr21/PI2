<?php
require("conexao.php");
session_start();

if (!isset($_POST['id_participante'])) {
    echo "erro";
    exit;
}

$id_participante = intval($_POST['id_participante']);

// 1) Remover vínculo da sala
$stmt1 = $mysqli->prepare("UPDATE participante SET fk_sala_atual = NULL WHERE id_participante = ?");
$stmt1->bind_param("i", $id_participante);
$stmt1->execute();

// 2) Deletar o participante do banco
$stmt2 = $mysqli->prepare("DELETE FROM participante WHERE id_participante = ?");
$stmt2->bind_param("i", $id_participante);
$stmt2->execute();

// 3) Encerrar sessão do participante
if (isset($_SESSION['id_participante'])) {
    unset($_SESSION['id_participante']);
}
if (isset($_SESSION['nome'])) {
    unset($_SESSION['nome']);
}
if (isset($_SESSION['codigo'])) {
    unset($_SESSION['codigo']);
}

echo "ok";
?>