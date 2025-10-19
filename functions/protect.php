<?php
// Inicia a sessão de forma segura
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

// Verifica se o usuário está logado
if (!isset($_SESSION['id'])) {
    // Usuário não logado - impede acesso
    die("Você não pode acessar esta página porque não está logado.<p><a href=\"../index.php\">Entrar</a></p>");
}
?>