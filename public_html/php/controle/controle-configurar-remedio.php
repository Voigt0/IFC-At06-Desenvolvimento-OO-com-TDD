<?php
    $acao = isset($_GET['acao']) ? $_GET['acao'] : '';
    include_once (__DIR__."/../utils/autoload.php");

    try {
        if($acao == 'update') {
            //Atualizar remédio
            $reme = new Remedio($_GET['remeId'], $_POST['nome'], $_POST['classificacao'], $_POST['tipo'], $_POST['idade']);
            $reme->update();
            header("Location: ../../view/remedio/visualizar-remedio.php?msg=Remédio cadastrado com sucesso!");
        } else if($acao == 'delete') {
            //Deletar remédio
            $reme = new Remedio($_GET['remeId'], $_POST['nome'], $_POST['classificacao'], $_POST['tipo'], $_POST['idade']);
            $reme->delete();
            header("Location: ../../view/remedio/visualizar-remedio.php?msg=Remédio cadastrado com sucesso!");
        } else {
            //Gerar remédio
            $reme = new Remedio('', '', '', '', $_POST['remeId']);
            $reme->create();
            header("Location: ../../view/remedio/visualizar-remedio.php?msg=Remédio cadastrado com sucesso!");
        }
    } catch(Exception $e) {
        echo "<h1>Erro ao modificar as informações.</h1><br> Erro:".$e->getMessage();
    }

?>