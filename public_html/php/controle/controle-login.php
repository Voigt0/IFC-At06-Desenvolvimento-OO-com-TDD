<?php
    $email = isset($_POST['email']) ? $_POST['email'] : "";
    $senha = isset($_POST['senha']) ? $_POST['senha'] : "";

    include_once (__DIR__."/../utils/autoload.php");
    try {
        //Login do usuário com sucesso, Login do usuário sem sucesso
        if(MedicoLogin::autenticar($email, $senha)) {
            header("Location: ../../view/usuario/medico/menu.php?msg=Email logado com sucesso!");
        } else if(isset($email) && isset($senha)) {
            header("Location: ../../view/usuario/login.php?msg=Email ou senha inválidos!");
        } else {
            header("Location: ../../view/usuario/login.php");
        }
    } catch(Exception $e) {
        echo "<h1>Erro ao logar com as informações.</h1><br> Erro:".$e->getMessage();
    }
?>