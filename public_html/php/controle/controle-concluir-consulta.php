<?php
    session_start();
    $id = isset($_GET['consId']) ? $_GET['consId'] : "";
    $estado = isset($_GET['consEstado']) ? $_GET['consEstado'] : "";

    include_once (__DIR__."/../utils/autoload.php");

    if(!Consulta::validar($_SESSION['mediId'])) {
        header("Location: ../consulta/visualizar-consulta.php");
    }
    try {
        if($estado == "0") {$estado = "1";} else {$estado = "0";}
        //Editar estado
        Consulta::modificarEstado($id, $estado);
        header("Location: ../../view/consulta/visualizar-consulta.php?msg=Consulta editada com sucesso!");
    } catch(Exception $e) {
        echo "<h1>Erro ao editar as informações.</h1><br> Erro:".$e->getMessage();
    }
?>