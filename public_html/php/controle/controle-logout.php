<?php
    include_once (__DIR__."/../utils/autoload.php");
    session_start();
    try {
        //Logout de usuário 
        session_destroy();    
        header("Location: ../../index.php?msg=Logout realizado com sucesso!");
    } catch(Exception $e) {
        echo "<h1>Erro ao realizar logout.</h1><br> Erro:".$e->getMessage();
    }
?>