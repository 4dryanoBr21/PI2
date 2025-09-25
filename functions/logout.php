<?php
    session_start();
    include("../functions/conexao.php");
    
    if (isset($_SESSION['id'])) {
        $id = $_SESSION['id'];
    
        // Marca como deslogado
        $stmt = $mysqli->prepare("UPDATE usuario SET is_logged_in = 0 WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
    }
    
    session_unset();
    session_destroy();
    
    header("Location: ../index.php");
exit;