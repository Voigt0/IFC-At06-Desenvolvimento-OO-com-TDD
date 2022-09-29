<?php
    session_start();
    $acao = isset($_GET['acao']) ? $_GET['acao'] : '';

    include_once (__DIR__."/../utils/autoload.php");
    try {
        if($acao == "update") {
            //Atualizar Paciente 
            $paci = new Paciente($_GET['paciId'], $_POST['nome'], $_POST['nascimento'], $_POST['estado'], $_POST['cidade'], $_POST['endereco'], $_POST['telefone'], $_POST['comorbidades'], $_POST['tabagismo'], $_POST['etilismo'], $_POST['alergias'], $_POST['medicacao'], $_POST['historiaClinica'], $_POST['peso'],$_POST['altura']);
            $bdpa = new PacienteBD($paci);
            $bdpa->update();
            header("Location: ../../view/consulta/visualizar-paciente.php?msg=Paciente atualizado com sucesso!");
        } else if($acao == "delete") {
            //Excluir Consulta
            $paci = new Paciente($_GET['paciId'], '', '', '', '', '', '', '','', '', '', '', '', '', '');
            $bdpa = new PacienteBD($paci);
            $bdpa->delete();
            header("Location: ../../view/consulta/visualizar-paciente.php?msg=Paciente excluída com sucesso!");            
        } else {
            //Cadastrar Paciente
            $paci = new Paciente('', $_POST['nome'], $_POST['nascimento'], $_POST['estado'], $_POST['cidade'], $_POST['endereco'], $_POST['telefone'], $_POST['comorbidades'], $_POST['tabagismo'], $_POST['etilismo'], $_POST['alergias'], $_POST['medicacao'], $_POST['historiaClinica'], $_POST['peso'], $_POST['altura']);
            $bdpa = new PacienteBD($paci);
            $bdpa->create();
            header("Location: ../../view/consulta/visualizar-paciente.php?msg=Paciente cadastrado com sucesso!");
            }
    } catch(Exception $e) {
        echo "<h1>Erro ao cadastrar as informações.</h1><br> Erro:".$e->getMessage();
    }
?>