<?php

    if(isset($_POST['cad_nome']) && isset($_POST['cad_email']) && isset($_POST['cad_senha']) && isset($_POST['cad_senha_confirm'])) {

        include_once("conexao.php");
  
        $nome = trim($_POST['cad_nome']);
        $email = trim($_POST['cad_email']);
        $senha = $_POST['cad_senha'];
        $senha_confirm = $_POST['cad_senha_confirm'];

        // Validações
        if(empty($nome)) {
            echo "Nome é obrigatório!";
        } else if(empty($email)) {
            echo "Email é obrigatório!";
        } else if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo "Email inválido!";
        } else if(empty($senha)) {
            echo "Senha é obrigatória!";
        } else if(strlen($senha) < 6) {
            echo "Senha deve ter pelo menos 6 caracteres!";
        } else if($senha !== $senha_confirm) {
            echo "Senhas não coincidem!";
        } else {
            // Verificar se email já existe
            $check_email = "SELECT * FROM usuario WHERE email = '" . $mysqli->real_escape_string($email) . "'";
            $check_query = $mysqli->query($check_email);
            
            if($check_query->num_rows > 0) {
                echo "Email já cadastrado!";
            } else {
                $nome_escaped = $mysqli->real_escape_string($nome);
                $email_escaped = $mysqli->real_escape_string($email);
                $senha_escaped = $mysqli->real_escape_string($senha);

                $sql_code = "INSERT INTO usuario (nome, email, senha) VALUES ('$nome_escaped', '$email_escaped', '$senha_escaped')";
                $sql_query = $mysqli->query($sql_code) or die("Falha na execução do código SQL: " . $mysqli->error);
                
                if($sql_query) {
                    echo "Usuário cadastrado com sucesso!";
                } else {
                    echo "Erro ao cadastrar usuário!";
                }
            }
        }

    }
?>