<?php
    $acao = isset($_GET['acao']) ? $_GET['acao'] : '';
    include_once (__DIR__."/../utils/autoload.php");

    try {
        if($acao == 'update') {
            //Atualizar relatório
            $rela = new Relatorio($_GET['relaId'], $_POST['relaDescricao'], $_POST['relaMedicamentos'], $_POST['relaExames'], $_GET['consId']);
            $rela->update();
            header("Location: ../../view/consulta/visualizar-consulta.php?msg=Relatório cadastrado com sucesso!");
        } else if($acao == 'delete') {
            //Deletar relatório
            $rela = new Relatorio($_GET['relaId'], $_POST['relaDescricao'], $_POST['relaMedicamentos'], $_POST['relaExames'], $_GET['consId']);
            $rela->delete();
            header("Location: ../../view/consulta/visualizar-consulta.php?msg=Relatório cadastrado com sucesso!");
        } else {
            //Gerar relatório
            $rela = new Relatorio('', '', '', '', $_GET['consId']);
            $rela->create();
            header("Location: ../../view/consulta/visualizar-consulta.php?msg=Relatório cadastrado com sucesso!");
        }
    } catch(Exception $e) {
        echo "<h1>Erro ao modificar as informações.</h1><br> Erro:".$e->getMessage();
    }
?>