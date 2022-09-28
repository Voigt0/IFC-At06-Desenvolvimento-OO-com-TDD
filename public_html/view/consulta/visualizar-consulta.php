<?php
    if (session_status() === PHP_SESSION_NONE) {
        session_set_cookie_params(0);
        session_start();
        if(!isset($_SESSION['mediId']) || $_SESSION['mediId'] == ''){
            header("Location: ../login.php");
        }
    }
    include_once (__DIR__ ."/../../php/utils/autoload.php");
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
    <div class="hero">
        <nav>
            <img src="../../img/favicon/android-chrome-192x192.png" class="logo">
            <ul>
                <li><a href="#">Sobre a equipe</a></li>
                <li><a href="../consulta/addPaciente.php">Consultar pacientes</a></li>
                <a href="../usuario/perfil.php" class="perfil-btn">Perfil</a>
            </ul>
        </nav>

        <div class="heading">
            <h2>Visualizar consultas</h2>
        </div>

        <table class="content-table">
            <thead>
                <tr>
                    <th>N°</th>
                    <th>Nome</th>
                    <th>Gravidade</th>
                    <th>Data</th>
                    <th>Horário</th>
                    <th>Estado</th>                    
                    <th>Relatório</th>
                </tr>
            </thead>
            <tbody>
            <?php 
                $tabela = Consulta::visualizarConsultas($_SESSION['mediId'], 0);
                foreach($tabela as $key => $value) {
            ?>
            <tr>
                <th><?php echo $value['consId'];?></th>
                <td><a href="cadastrar-paciente.php?paciId=<?php echo $value['paciId']?>"><?php echo $value['paciNome'];?></td></a>
                <td><?php echo $value['consGravidade'];?></td>
                <td><?php echo $value['consData'];?></td>
                <td><?php echo $value['consHorario'];?></td>
                <td><?php if($value['consEstado'] == 0){echo "<a href='../../php/controle/controle-concluir-consulta'>Não concluida</a>";}else{echo "Concluida";}?></td>
                <td>
                    <?php
                        if(!empty($value['relaId'])) {
                            echo "<a href='../relatorio/configurar-relatorio.php?relaId=".$value['relaId']."'>Visualizar</a>";
                        } else {
                            echo "<a href='../../php/controle-gerar-relatorio.php?consId=".$value['consId']."'>Gerar</a>";
                        }
                    ?>
                </td>
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