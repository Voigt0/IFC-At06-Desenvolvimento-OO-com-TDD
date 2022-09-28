<?php
    include_once (__DIR__."/../utils/autoload.php");
    try {
        //Cadastrar médico
        $paci = new Paciente('', $_POST['nome'], $_POST['nascimento'], $_POST['estado'], $_POST['cidade'], $_POST['endereco'], $_POST['telefone'], $_POST['comorbidades'], $_POST['tabagismo'], $_POST['etilismo'], $_POST['alergias'], $_POST['medicacao'], $_POST['historiaClinica'], $_POST['peso'], $_POST['altura']);
        $paci->create();
        header("Location: ../../view/usuario/visualizar-paciente.php?msg=Paciente cadastrado com sucesso!");
    } catch(Exception $e) {
        echo "<h1>Erro ao cadastrar as informações.</h1><br> Erro:".$e->getMessage();
    }
?>