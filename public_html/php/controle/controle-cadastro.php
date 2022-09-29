<?php
    include_once (__DIR__."/../utils/autoload.php");
    try {
        //Cadastrar médico 
        $medi = new Medico('', $_POST['nome'], $_POST['crm'], $_POST['especializacao'], $_POST['telefone'], $_POST['email'], $_POST['senha']);
        $dbme = new MedicoBD($medi);            
        $dbme->create();
        header("Location: ../../view/usuario/login.php?msg=Usuário cadastrado com sucesso!");
    } catch(Exception $e) {
        echo "<h1>Erro ao cadastrar as informações.</h1><br> Erro:".$e->getMessage();
    }
?>