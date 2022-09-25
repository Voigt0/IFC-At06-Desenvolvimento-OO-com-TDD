<?php
    include_once (__DIR__."/../utils/autoload.php");
    try {
        if($_POST['tipo'] == "medico") {
            //Cadastrar médico
            $medi = new Medico('', $_POST['nome'], $_POST['crm'], $_POST['especializacao'], $_POST['telefone'], $_POST['email'], $_POST['senha']);
            $medi->create();
            header("Location: ../../view/usuario/login.php?msg=Usuário cadastrado com sucesso!");
        } else if($_POST['tipo'] == 'recepcionista') {
            //Cadastrar recepcionista
            $rece = new Recepcionista('', $_POST['nome'], $_POST['telefone'], $_POST['email'], $_POST['senha']);
            $rece->create();
            header("Location: ../../view/usuario/login.php?msg=Usuário cadastrado com sucesso!");
        }
    } catch(Exception $e) {
        echo "<h1>Erro ao cadastrar as informações.</h1><br> Erro:".$e->getMessage();
    }
?>