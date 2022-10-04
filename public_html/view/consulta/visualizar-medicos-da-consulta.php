<?php
    //Verificar se login foi efetuado
    if (session_status() === PHP_SESSION_NONE) {
        session_set_cookie_params(0);
        session_start();
        if(!isset($_SESSION['mediId']) || $_SESSION['mediId'] == ''){
            header("Location: ../login.php");
        }
    }

    $consId = isset($_GET['consId']) ? $_GET['consId'] : "";
    include_once (__DIR__ ."/../../php/utils/autoload.php");
    
    $busca = Consulta::consultarMedicos($consId);
    $paci = new Paciente('', '', '', '', '', '', '', '', '', '', '', '', '', '', '');
    $cons = new Consulta($consId, '', '', '', '', $paci);
    if(!empty($busca[0])) {
        foreach($busca as $key) {
            $medi = new Medico($key['mediId'], $key['mediNome'], $key['mediCrm'], $key['mediEspecializacao'], $key['mediTelefone'], $key['mediEmail'], $key['mediSenha']);
            $cons->adicionarMedico($medi);
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DocGO!</title>
    <link rel="stylesheet" href="../../css/visualizar-consulta.css">
    <link rel="stylesheet" href="../../css/css-geral.css">
    <link rel="icon" type="image/x-icon" href="../../img/favicon/favicon.ico">
</head>
<body>
<main>
    <div class="corpo">
        <nav>
            <a href="../../index.php"><img src="../../img/favicon/android-chrome-192x192.png" class="logo"></a>
            <ul>
                <li><a href="https://docgo.carrd.co">Sobre a equipe</a></li>
                <li><a href="visualizar-paciente.php">Consultar pacientes</a></li>
                <li><a href="configurar-consulta.php">Criar consulta</a></li>
                <li><a href="visualizar-consulta.php">Visualizar consulta</a></li>
                <a href="../usuario/medico/perfil.php" class="nav-btn">Perfil</a>
            </ul>
        </nav>

        <div class="heading">
            <h2>Visualizar médicos da consulta</h2>
            <a href="visualizar-consulta.php"><img src="../../img/icon/backIcon.svg" class="back"></a>
        </div>
        <!-- Tabela das consultas -->
        <table class="content-table">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>CRM</th>
                    <th>Especialização</th>
                    <th>Telefone</th>
                    <th>Email</th>
                </tr>
            </thead>
            <tbody>
            <?php 
                $tabela = $cons->listarMedicos();
                foreach($tabela as $key) {
            ?>
            <tr>
                <th><?php echo $key->getNome();?></th>
                <td><?php echo $key->getCrm();?></td>
                <td><?php echo $key->getEspecializacao();?></td>
                <td><?php echo $key->getTelefone();?></td>
                <td><?php echo $key->login->getEmail();?></td>
            </tr>
            </tbody>
            <?php
                } 
            ?> 
       </table>
    </div>
</main>
</body>
</html>