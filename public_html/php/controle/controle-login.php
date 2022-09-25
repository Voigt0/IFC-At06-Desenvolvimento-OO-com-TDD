<?php
    $tipo = isset($_POST['tipo']) ? $_POST['tipo'] : "";
    $email = isset($_POST['email']) ? $_POST['email'] : "";
    $senha = isset($_POST['senha']) ? $_POST['senha'] : "";
    
    echo $tipo;
    echo $email;
    echo $senha;

    include_once (__DIR__."/../utils/autoload.php");
    try {
        //Login do usuário com sucesso, Login do usuário sem sucesso, Logout do usuário
        if($tipo == "medico") {
            if(Medico::autenticar($email, $senha)) {
                header("Location: ../../view/usuario/medico/menu.php?msg=Email logado com sucesso!");
            } else if(isset($email) && isset($senha)) {
                header("Location: ../../view/usuario/login.php?msg=Email ou senha inválidos!");
            } else {
                header("Location: ../../view/usuario/login.php");
            }
        } else if($tipo == "recepcionista") {
            if(Recepcionista::autenticar($email, $senha)) {
                header("Location: ../../view/usuario/recepcionista/menu.php?msg=Usuário logado com sucesso!");
            } else if(isset($email) && isset($senha)) {
                header("Location: ../../view/usuario/login.php?msg=Email ou senha inválidos!");
            } else {
                header("Location: ../../view/usuario/login.php");
            }
        }        
    } catch(Exception $e) {
        echo "<h1>Erro ao logar com as informações.</h1><br> Erro:".$e->getMessage();
    }
?>