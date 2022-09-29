<?php
    // Verificar se login foi efetuado
    if (session_status() === PHP_SESSION_NONE) {
        session_set_cookie_params(0);
        session_start();
        if(isset($_SESSION['mediId']) && $_SESSION['mediId'] != '') {
            header("Location: view/usuario/medico/menu.php");
        } else if(isset($_SESSION['receId']) && $_SESSION['receId'] != '') {
            header("Location: view/usuario/recepcionista/menu.php");
        }
    }
    
    include_once (__DIR__."/../../../php/utils/autoload.php");

     $pesquisa = isset($_POST["pesquisa"]) ? $_POST["pesquisa"] : "";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DocGO!</title>
    <link rel="stylesheet" href="../../../css/visualizar-paciente.css">
    <link rel="stylesheet" href="../../../css/css-geral.css">
    <link rel="icon" type="image/x-icon" href="../../../img/favicon/favicon.ico">
</head>
<body>
<main>
    <div class="hero">
        <!-- Navbar -->
        <nav>
            <a href="../../../index.php"><img src="../../../img/favicon/android-chrome-192x192.png" class="logo"></a>
            <ul>
                <li><a href="https://docgo.carrd.co">Sobre a equipe</a></li>
            </ul>
        </nav>

    <!-- Tabela de médicos -->
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
                $tabela = MedicoBD::consultar(2, $pesquisa);
                foreach($tabela as $key => $value) {
            ?>
            <tr>
                <td><?php echo $value['mediNome'];?></td></a>
                <td><?php echo $value['mediCrm'];?></td>
                <td><?php echo $value['mediEspecializacao'];?></td>
                <td><?php echo $value['mediTelefone'];?></td>
                <td><?php echo $value['mediEmail'];?></td>
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