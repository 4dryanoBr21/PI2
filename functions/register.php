<?php

  if(isset($_POST['submit'])) {

    include_once("conexao.php");
  
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $result = new mysqli($mysqli, "INSERT INTO usuario (nome, email, senha) VALUES ('$nome', '$email', '$senha')");

  }
?>