<?php

    include("conexao.php");

    if(isset($_POST['email']) && isset($_POST['password'])) {

        $email = trim($_POST['email']);
        $senha = $_POST['password'];

        if(empty($email)) {
            echo "Preencha seu email!";
        } else if(empty($senha)) {
            echo "Preencha sua senha!";
        } else if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo "Email inválido!";
        } else {

            $email_escaped = $mysqli->real_escape_string($email);
            $senha_escaped = $mysqli->real_escape_string($senha);

            $sql_code = "SELECT * FROM usuario WHERE email = '$email_escaped' AND senha = '$senha_escaped'";
            $sql_query = $mysqli->query($sql_code) or die("Falha na execução do código SQL: " . $mysqli->error);
                
            $quantidade = $sql_query->num_rows;

            if($quantidade == 1) {
                
                $usuario = $sql_query->fetch_assoc();

                if(!isset($_SESSION)) {
                    session_start();
                }

                $_SESSION['id'] = $usuario['id'];
                $_SESSION['nome'] = $usuario['nome'];

                header("Location: ../pages/salas.php");

            } else {
                echo "Email ou senha incorretos!";
            }

        }   

    }

?>