<?php
    $email = isset($_POST['email']) ? $_POST['email'] : "";
    $senha = isset($_POST['senha']) ? $_POST['senha'] : "";

    include_once (__DIR__."/../utils/autoload.php");
    try {
        //Login do usuário
        if(MedicoLogin::autenticar($email, $senha)) {
            // Em caso de sucesso
            header("Location: ../../view/usuario/medico/menu.php?msg=Email logado com sucesso!");
        } else if(isset($email) && isset($senha)) {
            // Em caso de dados incorretos
            header("Location: ../../view/usuario/login.php?msg=Email ou senha inválidos!");
        } else {
            // Demais casos
            header("Location: ../../view/usuario/login.php");
        }
    } catch(Exception $e) {
        echo "<h1>Erro ao logar com as informações.</h1><br> Erro:".$e->getMessage();
    }
?>