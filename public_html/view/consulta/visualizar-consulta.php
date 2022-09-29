<?php
    //Verificar se login foi efetuado
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
            <h2>Visualizar consultas</h2>
            <a href="../usuario/medico/menu.php"><img src="../../img/icon/backIcon.svg" class="back"></a>
        </div>

        <!-- Tabela das consultas -->
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
                    <th>Editar</th>
                    <th>Excluir</th>
                </tr>
            </thead>
            <tbody>
            <?php 
                $tabela = Consulta::visualizarConsultas($_SESSION['mediId']);
                foreach($tabela as $key => $value) {
            ?>
            <tr>
                <th><?php echo $value['consId'];?></th>
                <td><a class="underline" href="cadastrar-paciente.php?paciId=<?php echo $value['paciId']?>"><?php echo $value['paciNome'];?></a></td>
                <td><?php echo $value['consGravidade'];?></td>
                <td><?php echo date("d/m/Y",strtotime($value['consData']));?></td>
                <td><?php echo $value['consHorario'];?></td>
                <td>
                    <?php 
                        if($value['consEstado'] == 0){
                            echo "<a class='underline' href='../../php/controle/controle-concluir-consulta.php?consId=$value[consId]&consEstado=$value[consEstado]'>Não concluída</a>";
                        }else{
                            echo "<a class='underline' href='../../php/controle/controle-concluir-consulta.php?consId=$value[consId]&consEstado=$value[consEstado]'>Concluída</a>";
                        }
                    ?>
                </td>
                <td>
                    <?php
                        if(!empty($value['relaId'])) {
                            echo "<a class='underline' href='../relatorio/configurar-relatorio.php?relaId=".$value['relaId']."'>Visualizar</a>";
                        } else {
                            echo "<a class='underline' href='../../php/controle/controle-configurar-relatorio.php?consId=".$value['consId']."'>Gerar</a>";
                        }
                    ?>
                </td>
                <td class="img"><a class='underline' href='configurar-consulta.php?consId=<?php echo $value['consId'];?>&acao=update'><img src="../../img/icon/editar.svg" style="width: 1.8vw;"></a></td>
                <td class="img"><a class='underline' onclick="return confirm('Deseja mesmo excluir?')" href="../../php/controle/controle-configurar-consulta.php?consId=<?php echo $value['consId'];?>&acao=delete"><img src="../../img/icon/deletar.svg" style="width: 1.8vw;"></a></td>
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