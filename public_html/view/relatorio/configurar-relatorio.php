<?php
    // Verificar se login foi efetuado
    if (session_status() === PHP_SESSION_NONE) {
        session_set_cookie_params(0);
        session_start();
        if(!isset($_SESSION['mediId']) || $_SESSION['mediId'] == ''){
            header("Location: ../login.php");
        }
    }
    include_once (__DIR__ ."/../../php/utils/autoload.php");

    // Salvar contexto
    if(isset($_GET['relaId'])) {
        if(Relatorio::validar($_GET['relaId'])) {
            $data = Relatorio::consultarData($_GET['relaId'])[0];
        } else {
            header("Location: ../consulta/configurar-relatorio.php");
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
    <link rel="stylesheet" href="../../css/relatorio.css">
    <link rel="stylesheet" href="../../css/css-geral.css">
    <link rel="icon" type="image/x-icon" href="../../img/favicon/favicon.ico">
</head>
<body>

    <main>
        <div class="hero">
        <!-- Navbar -->
        <nav>
            <a href="../../index.php"><img src="../../img/favicon/android-chrome-192x192.png" class="logo"></a>
            <ul>
                <li><a href="https://docgo.carrd.co">Sobre a equipe</a></li>
                <li><a href="../consulta/visualizar-paciente.php">Consultar pacientes</a></li>
                <li><a href="../consulta/configurar-consulta.php">Criar consulta</a></li>
                <li><a href="../consulta/visualizar-consulta.php">Visualizar consulta</a></li>
                <a href="../usuario/medico/perfil.php" class="perfil-btn">Perfil</a>
            </ul>
        </nav>

        <div class="heading">
            <h2>Relatório da consulta Nº <?php if(isset($data)) { echo $data['Consulta_consId'];}?></h2>
            <div class="img">
                <a href="../../php/controle/controle-configurar-relatorio.php?acao=delete&&relaId=<?php echo $data['relaId'];?>"><img src="../../img/icon/deletar.svg" width="50px" class="delete"></a>
                <!-- <a href="../../php/controle/controle-configurar-relatorio.php?acao=update&&relaId=<?php echo $data['relaId'];?>"><img src="../../img/icon/editar.svg" width="50px" class="delete"></a> -->
            </div>

        </div>

        <!-- Formulário -->
        <form method="post" action="../../php/controle/controle-configurar-relatorio.php?relaId=<?php echo $data['relaId'];?>&consId=<?php echo $data['Consulta_consId'];?>&acao=update" class="">
            <div class="form-box">
                <div class="input-box">
                    <label for="relaDescricao">Descrição</label>
                    <input type="text" id="relaDescricao" name="relaDescricao" class="input-field" placeholder="Insira a descrição da consulta" value="<?php if(isset($data)) { echo $data['relaDescricao']; }?>" required>
                </div>
                
                <div class="input-box">
                    <label for="relaMedicamentos">Medicamentos</label>
                    <input type="text" id="relaMedicamentos" name="relaMedicamentos" class="input-field" placeholder="Insira os medicamentos necessários" value="<?php if(isset($data)) { echo $data['relaMedicamentos']; }?>" required>
                </div>

                <div class="input-box">
                    <label for="relaExames">Exames</label>
                    <input type="text" id="relaExames" name="relaExames" class="input-field" placeholder="Insira os exames necessários" value="<?php if(isset($data)) { echo $data['relaExames']; }?>"required>
                </div>

                <input type="submit" value="Salvar" class="btn">
                
            </div>
        </form>
        </div>
    </main>
</body>
</html>