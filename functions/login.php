<?php

    include("../projetomi/functions/conexao.php");

    if(isset($_POST['email']) || isset($_POST['password'])) {

        if(strlen($_POST['email']) == 0) {
            echo "Preencha seu email!";
        } else if(strlen($_POST['password']) == 0) {
            echo "Preencha sua senha!";
        } else {

            $email = $mysqli->real_escape_string($_POST['email']);
            $senha = $mysqli->real_escape_string($_POST['password']);

            $sql_code = "SELECT * FROM usuario WHERE email = '$email' AND senha = '$senha'";
            $sql_query = $mysqli->query($sql_code) or die("Falha na execução do código SQL: " . $mysqli->error);
            
            $quantidade = $sql_query->num_rows;

            if($quantidade == 1) {

                $usuario = $sql_query->fetch_assoc();

                if(!isset($_SESSION)) {
                    session_start();
                }

                $_SESSION['id'] = $usuario['id'];
                $_SESSION['nome'] = $usuario['nome'];

                header("Location: pages/salas.php");

            } else {
                echo "Falha no login!";
            }

        }   

    }

?>