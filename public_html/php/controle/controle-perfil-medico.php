<?php
    session_start();
    $acao = isset($_GET['acao']) ? $_GET['acao'] : "";

    include_once (__DIR__."/../utils/autoload.php");
    try {
        if($acao == "update") {
            //Editar médico 
            $medi = new Medico($_SESSION['mediId'], $_POST['nome'], $_POST['crm'], $_POST['especializacao'], $_POST['telefone'], $_POST['email'], $_POST['senha']);
            $medi->update();
            header("Location: ../../view/usuario/medico/perfil.php?msg=Usuário editado com sucesso!");
        } else if($acao == "delete") {
            //Deletar médico
            $medi = new Medico($_SESSION['mediId'], "", "", "", "", "", "");
            $medi->delete();
            session_destroy();
            header("Location: ../../view/usuario/login.php?msg=Usuário deletado com sucesso!");
        }
    } catch(Exception $e) {
        echo "<h1>Erro ao editar as informações.</h1><br> Erro:".$e->getMessage();
    }
?>