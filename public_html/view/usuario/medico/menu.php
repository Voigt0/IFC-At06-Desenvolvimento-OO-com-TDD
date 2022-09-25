<?php
    if (session_status() === PHP_SESSION_NONE) {
        session_set_cookie_params(0);
        session_start();
        if(!isset($_SESSION['mediId']) || $_SESSION['mediId'] == ''){
            header("Location: ../login.php");
        }
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DocGO!</title>
    <link rel="stylesheet" href="../../../css/menu.css">
    <link rel="icon" type="image/x-icon" href="../../../img/favicon/favicon.ico">
</head>
<body>
    <div class="hero">
        <nav>
            <img src="../../../img/favicon/android-chrome-192x192.png" class="logo">
            <ul>
                <li><a href="#">Sobre a equipe</a></li>
                <li><a href="../../consulta/visualizar-paciente.php">Consultar pacientes</a></li>
                <a href="perfil.php" class="perfil-btn">Perfil</a>
            </ul>
        </nav>

        <div class="heading">
            <h2>O que deseja fazer?</h2>
        </div>
        <div class="options">
            <div class="option">
                <a href="../../consulta/visualizar-consulta.php">
                    <button type="button" class="menu-btn">
                        <h4>Visualizar consultas</h4>
                    </button>
                </a>
            </div>
            <div class="option">
                <a href="../../consulta/visualizar-paciente.php">
                    <button type="button" class="menu-btn">
                        <h4>Visualizar pacientes</h4>
                    </button>
                </a>
            </div>
            <div class="option">
                <a href="perfil.php">
                    <button type="button" class="menu-btn">
                        <h4>Visualizar perfil</h4>
                    </button>
                </a>
            </div>
            <div class="option">
                <a href="../../consulta/adicionar-consulta.php">
                    <button type="button" class="menu-btn">
                        <h4>Adicionar consulta</h4>
                    </button>
                </a>
            </div>
        </div>
        
    </div>
</body>
</html>