<?php
    //Verificar se login foi efetuado
    session_set_cookie_params(0);
    session_start();
    if(!isset($_SESSION['mediId']) || $_SESSION['mediId'] == ''){
        header("Location: ../usuario/login.php");
    } 

    include_once (__DIR__."/../../php/utils/autoload.php");

    $pesquisa = isset($_POST["pesquisa"]) ? $_POST["pesquisa"] : "";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DocGO!</title>
    <link rel="stylesheet" href="../../css/visualizar-paciente.css">
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

    <!-- Tabela dos pacientes -->
    <table class="content-table">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Classificação</th>
                    <th>Tipo</th>
                    <th>Idade recomendada</th>
                    <th>Editar</th>
                    <th>Excluir</th>
                </tr>
            </thead>
            <tbody>
            <?php 
                $tabela = Remedio::consultar(0, $pesquisa);
                foreach($tabela as $key => $value) {
            ?>
            <tr>
                <td><?php echo $value['remeNome'];?></td>
                <td><?php echo $value['remeClassificacao'];?></td>
                <td><?php echo $value['remeTipo'];?></td>
                <td><?php echo $value['remeIdade'];?></td>
                <td class="img"><a href='cadastrar-remedio.php?remeId=<?php echo $value['remeId'];?>&acao=update'><img src="../../img/icon/editar.svg" style="width: 1.8vw;"></a></td>
                <td class="img"><a onclick="return confirm('Deseja mesmo excluir?')" href="../../php/controle/controle-configurar-remedio.php?remeId=<?php echo $value['remeId'];?>&acao=delete"><img src="../../img/icon/deletar.svg" style="width: 1.8vw;"></a></td>
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