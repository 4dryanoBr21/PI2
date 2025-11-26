<?php
$db_host = 'localhost';
$db_user = 'root';
$dbpassword = '';
$dbname = 'projetomi';

$mysqli = new mysqli($db_host, $db_user, $dbpassword, $dbname);

if ($mysqli->error) {
    die("Falha ao conectar ao banco de dados: " . $mysqli->error);
}