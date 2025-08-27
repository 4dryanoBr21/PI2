<?php

    $db_host = 'localhost';
    $db_user = 'root';
    $dbpassword = 'System32';
    $dbname = 'projetomi';

    $mysqli = new mysqli($db_host,$db_user,$dbpassword,$dbname);

    /*if($mysqli -> connect_errno) {
        echo "Erro";
    }
    else
    {
        echo "Conexão feita com sucesso!";
    }*/

?>