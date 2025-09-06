<?php

  if(isset($_POST['submit'])) {

    include_once("conexao.php");
  
    $nome = $_POST['cad_nome'];
    $email = $_POST['cad_email'];
    $senha = $_POST['cad_senha'];

    $result = new mysqli("INSERT INTO usuario (nome, email, senha) VALUES ('$nome', '$email', '$senha')");

    echo "Cadastro"

  }
?>