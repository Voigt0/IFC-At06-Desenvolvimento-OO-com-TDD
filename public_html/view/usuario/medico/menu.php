<?php
    // Verificar se login foi efetuado
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
    <link rel="stylesheet" href="../../../css/css-geral.css">
    <link rel="stylesheet" href="../../../css/menu.css">
    <link rel="icon" type="image/x-icon" href="../../../img/favicon/favicon.ico">
</head>
<body>
    <div class="corpo">
        <nav>
            <a href="../../../index.php"><img src="../../../img/favicon/android-chrome-192x192.png" class="logo"></a>
            <ul>
                <li><a href="https://docgo.carrd.co">Sobre a equipe</a></li>
                <li><a href="../../consulta/visualizar-paciente.php">Consultar pacientes</a></li>
                <li><a href="../../consulta/configurar-consulta.php">Criar consulta</a></li>
                <li><a href="../../consulta/visualizar-consulta.php">Visualizar consulta</a></li>

                <a href="perfil.php" class="nav-btn">Perfil</a>
            </ul>
        </nav>

        <div class="heading">
            <h2>O que deseja fazer?</h2>
        </div>

        <!-- Opções para o usuário -->
        <div class="options">
            <div class="coluna">
                <section>
                    <div class="img-button"><a href="../../consulta/visualizar-consulta.php"><button class="botao"><img src="../../../img/icon/consulta.svg" width="70%"></button></a></div>
                    <div class="button"><a href="../../consulta/visualizar-consulta.php"><button class="" type="submit" id="" name="" value="">Visualizar consultas</button></a></div>
                </section>

                <section>
                    <div class="img-button"><a href="../../consulta/configurar-consulta.php"><button class="botao"><img src="../../../img/icon/adicionar-consulta.svg" width="70%"></button></a></div>
                    <div class="button"><a href="../../consulta/configurar-consulta.php"><button class="" type="submit" id="" name="" value="">Adicionar Consulta</button></a></div>
                </section>
            </div>
                  
            <div class="coluna">
                <section>
                    <div class="img-button"><a href="../../consulta/visualizar-paciente.php"><button class="botao"><img src="../../../img/icon/paciente.svg" width="70%"></button></a></div>
                    <div class="button"><a href="../../consulta/visualizar-paciente.php"><button class="" type="submit" id="" name="" value="">Visualizar Pacientes</button></a></div>
                </section>
            
                <section>
                    <div class="img-button"><a href="perfil.php"><button class="botao"><img src="../../../img/icon/perfilIcon.svg" width="70%"></button></a></div>
                    <div class="button"><a href="perfil.php"><button class="" type="submit" id="" name="" value="">Visualizar Perfil</button></a></div>
                </section>   
            </div>
        </div>
    </div>
</body>
</html>