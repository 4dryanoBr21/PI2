<?php

    if(isset($_POST['submit'])) {

        include_once("../functions/conexao.php");
  
        $nome = $_POST['cad_nome'];
        $email = $_POST['cad_email'];
        $senha = $_POST['cad_senha'];

        $result = pdo_query($mysqli, "INSERT INTO usuario (nome, email, senha) VALUES ('$nome', '$email', '$senha')");

    }
?>