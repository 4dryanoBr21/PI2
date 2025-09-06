<?php
  include 'conexao.php';
  
  $nome  = $_POST['nome'];
  $email = $_POST['email'];
  $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT); // Criptografa a senha
  
  $conn = "INSERT INTO usuario (nome, email, senha) VALUES (?, ?, ?)";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("sss", $nome, $email, $senhaHash);

  if ($stmt->execute()) {
      header("Location: ../index.php");
      
  } else {
      echo "Erro: " . $stmt->error;
  }

?>