<?php
    session_start();
    include('conexao.php');
    include('protect.php');
    
    if (isset($_SESSION['nome_sala'])) {
        $nome_sala = $mysqli->real_escape_string($_SESSION['nome_sala']);
    
        $sql = "DELETE FROM sala WHERE nome_sala = '$nome_sala'";
        $mysqli->query($sql);
    
        unset($_SESSION['nome_sala']);

        session_destroy();

        header("Location: ../index.php");
        exit();
    } else {
        echo "Nome da sala não encontrado na sessão.";
    }
    
?>