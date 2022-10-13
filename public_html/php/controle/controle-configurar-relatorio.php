<?php
    $acao = isset($_GET['acao']) ? $_GET['acao'] : '';
    include_once (__DIR__."/../utils/autoload.php");

    try {
        if($acao == 'update') {
            //Atualizar relatório
            $paci = new Paciente('', '', '', '', '', '', '', '', '', '', '', '', '', '', '');
            $cons = new Consulta($_GET['consId'], '', '', '', '', $paci);
            $rela = new Relatorio($_GET['relaId'], $_POST['relaDescricao'], $_POST['relaMedicamentos'], $_POST['relaExames'], $cons);
            $rela->update();
            header("Location: ../../view/consulta/visualizar-consulta.php?msg=Relatório cadastrado com sucesso!");
        } else if($acao == 'delete') {
            //Deletar relatório
            $paci = new Paciente('', '', '', '', '', '', '', '', '', '', '', '', '', '', '');
            $cons = new Consulta($_GET['consId'], '', '', '', '', $paci);
            $rela = new Relatorio($_GET['relaId'], $_POST['relaDescricao'], $_POST['relaMedicamentos'], $_POST['relaExames'], $cons);
            $rela->delete();
            header("Location: ../../view/consulta/visualizar-consulta.php?msg=Relatório cadastrado com sucesso!");
        } else {
            //Gerar relatório
            $paci = new Paciente('', '', '', '', '', '', '', '', '', '', '', '', '', '', '');
            $cons = new Consulta($_GET['consId'], '', '', '', '', $paci);
            $rela = new Relatorio('', '', '', '', $cons);
            $rela->create();
            header("Location: ../../view/consulta/visualizar-consulta.php?msg=Relatório cadastrado com sucesso!");
        }
    } catch(Exception $e) {
        echo "<h1>Erro ao modificar as informações.</h1><br> Erro:".$e->getMessage();
    }
?>