<?php
    session_start();
    $acao = isset($_GET['acao']) ? $_GET['acao'] : '';

    include_once (__DIR__."/../utils/autoload.php");
    try {
        if($acao == "update") {
            //Atualizar Consulta
            $paci = new Paciente($_POST['Paciente_paciId'], '', '', '', '', '', '', '', '', '', '', '', '', '', '');
            $medi1 = new Medico($_SESSION['mediId'], '', '', '', '', '', '');
            $cons = new Consulta($_GET['consId'], $_POST['consData'], $_POST['consHorario'], $_POST['consGravidade'], $_POST['consEstado'], $paci, $medi);
            $medi2 = new Medico($_POST['Medico_mediId'], '', '', '', '', '', '');
            $cons->adicionarMedico($medi1);
            $cons->adicionarMedico($medi2);
            $cons->update();
            header("Location: ../../view/consulta/visualizar-consulta.php?msg=Consulta atualizada com sucesso!");
        } else if($acao == "delete") {
            //Excluir Consulta
            $paci = new Paciente('', '', '', '', '', '', '', '', '', '', '', '', '', '', '');
            $cons = new Consulta($_GET['consId'], '', '', '', '', $paci);
            $cons->delete();
            header("Location: ../../view/consulta/visualizar-consulta.php?msg=Consulta excluída com sucesso!");            
        } else {
            //Cadastrar Consulta
            $paci = new Paciente($_POST['Paciente_paciId'], '', '', '', '', '', '', '', '', '', '', '', '', '', '');
            $medi1 = new Medico($_SESSION['mediId'], '', '', '', '', '', '');
            $cons = new Consulta('', $_POST['consData'], $_POST['consHorario'], $_POST['consGravidade'], $_POST['consEstado'], $paci);
            $medi2 = new Medico($_POST['Medico_mediId'], '', '', '', '', '', '');
            $cons->adicionarMedico($medi1);
            $cons->adicionarMedico($medi2);
            $cons->create();
            header("Location: ../../view/consulta/visualizar-consulta.php?msg=Consulta cadastrada com sucesso!");
            die();
        }
    } catch(Exception $e) {
        echo "<h1>Erro ao cadastrar as informações.</h1><br> Erro:".$e->getMessage();
    }
?>