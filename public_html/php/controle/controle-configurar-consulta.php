<?php
    session_start();
    $acao = isset($_GET['acao']) ? $_GET['acao'] : '';

    include_once (__DIR__."/../utils/autoload.php");
    try {
        if($acao == "update") {
            //Atualizar Consulta 
            $cons = new Consulta($_GET['consId'], $_POST['consData'], $_POST['consHorario'], $_POST['consGravidade'], $_POST['consEstado'], $_POST['Paciente_paciId'], $_SESSION['mediId']);
            $cons->update();
            header("Location: ../../view/consulta/visualizar-consulta.php?msg=Consulta atualizada com sucesso!");
        } else if($acao == "delete") {
            //Excluir Consulta
            $cons = new Consulta($_GET['consId'], '', '', '', '', '', '');
            $cons->delete();
            header("Location: ../../view/consulta/visualizar-consulta.php?msg=Consulta excluída com sucesso!");            
        } else {
            //Cadastrar Consulta
            $cons = new Consulta('', $_POST['consData'], $_POST['consHorario'], $_POST['consGravidade'], $_POST['consEstado'], $_POST['Paciente_paciId'], $_SESSION['mediId']);
            $cons->create();
            header("Location: ../../view/consulta/visualizar-consulta.php?msg=Consulta cadastrada com sucesso!");
        }
    } catch(Exception $e) {
        echo "<h1>Erro ao cadastrar as informações.</h1><br> Erro:".$e->getMessage();
    }
?>