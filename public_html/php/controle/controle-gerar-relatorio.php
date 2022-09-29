<?php
    include_once (__DIR__."/../utils/autoload.php");
    try {
        //Gerar relatório 
        $rela = new Relatorio('', '', '', '', $_GET['consId']);
        $rela->create();
        header("Location: ../../view/consulta/visualizar-consulta.php?msg=Relatório cadastrado com sucesso!");
    } catch(Exception $e) {
        echo "<h1>Erro ao cadastrar as informações.</h1><br> Erro:".$e->getMessage();
    }

?>