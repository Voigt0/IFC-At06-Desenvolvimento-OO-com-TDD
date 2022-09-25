<?php
    $tipo = "Doutor";
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DocGO!</title>
    <link rel="stylesheet" href="../../../css/perfil.css">
    <link rel="icon" type="image/x-icon" href="../../../img/favicon/favicon.ico">
</head>
<body>
    <div class="hero">
        <nav>
            <a href="../../index.php"><img src="../../../img/favicon/android-chrome-192x192.png" class="logo"></a>
            <ul>
                <li><a href="#">Sobre a equipe</a></li>
                <li><a href="../consulta/addPaciente.php">Consultar pacientes</a></li>
                <a href="../usuario/perfil.php" class="perfil-btn">Perfil</a>
            </ul>
        </nav>   
        
        <div class="heading">
            <h2>Olá, <?php echo $tipo; ?>!</h2>
            <a href="menu.php"><img src="../../../img/icon/backIcon.svg" class="back"></a>
        </div>

        <div class="img-perfil">
            <img src="../../../img/png/perfil.png" class="img">
        </div>

        <div class="corpo">
            <div class="input-box">
                <span >Nome completo</span>
                <input required class="" type="text" name="nome" id="nome" value="Nome completo" <?php if(!isset($_GET['update'])) {echo "disabled";}?>>
            </div>

            <div class="input-box">
                <span>CRM</span>
                <input required class="" type="text" name="crm" id="crm" value="CRM" <?php if(!isset($_GET['update'])) {echo "disabled";}?>>
            </div>
            
            <div class="input-box">
                <span>Especialização</span>
                <input required class="" type="text" name="especializacao" id="especializacao" value="Especialização" <?php if(!isset($_GET['update'])) {echo "disabled";}?>>
            </div>

            <div class="input-box">
                <span>Telefone</span>
                <input required class="" type="text" name="telefone" id="telefone" value="Telefone" <?php if(!isset($_GET['update'])) {echo "disabled";}?>>
            </div>

            <div class="input-box">
                <span>E-mail</span>
                <input required class="" type="text" name="email" id="email" value="E-mail" <?php if(!isset($_GET['update'])) {echo "disabled";}?>>
            </div>

            <div class="input-box">
                <span>Senha</span>
                <input required class="" type="text" name="senha" id="senha" value="Senha" <?php if(!isset($_GET['update'])) {echo "disabled";}?>>
            </div>

        </div>
        
        <input type="submit" value="Encerrar sessão" class="btn">
        <input type="submit" value="Editar" class="btn">
    </div>
</body>
</html>