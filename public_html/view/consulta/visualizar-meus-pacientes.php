<?php
    //Verificar se login foi efetuado
    session_set_cookie_params(0);
    session_start();
    if(!isset($_SESSION['mediId']) || $_SESSION['mediId'] == ''){
        header("Location: ../usuario/login.php");
    }

    include_once (__DIR__."/../../php/utils/autoload.php");

    $pesquisa = isset($_POST["pesquisa"]) ? $_POST["pesquisa"] : "";

    $medi = new Medico($_SESSION['mediId'], '', '',  '', '', '', '');

    $cons = Consulta::consultarConsultasDoMedico($_SESSION['mediId']);
    if(!empty($cons[0])) {
        foreach($cons as $key) {
            $paci = new Paciente($key['Paciente_paciId'], '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');
            $cons = new Consulta($key['consId'], $key['consData'], $key['consHorario'], $key['consGravidade'], $key['consEstado'], $paci, $medi);
            $medi->adicionarConsulta($cons);
        }
    }

    echo '<pre>';
    var_dump($cons);
    echo '</pre>';
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
        <h2>Meus pacientes</h2>
        <a href="visualizar-paciente.php"><img src="../../img/icon/backIcon.svg" class="back"></a>
        <a href="cadastrar-paciente.php"><input type="button" class="btn" value="Adicionar pacientes"></a>
    </div>

    <!-- Tabela dos pacientes -->
    <table class="content-table">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Nascimento</th>
                    <th>Editar</th>
                    <th>Excluir</th>
                </tr>
            </thead>
            <tbody>
            <?php 
            if(!empty($cons)) {
                foreach($medi->listarConsultas() as $key => $value) {
            ?>
            <tr>
                <td><a href="cadastrar-paciente.php?paciId=<?php echo $value->getId();?>"><?php echo $value->getNome();?></td></a>
                <td><?php echo date("d/m/Y",strtotime($value->getNascimento()));?></td>
                <td class="img"><a href='cadastrar-paciente.php?paciId=<?php echo $value->getId();?>&acao=update'><img src="../../img/icon/editar.svg" style="width: 1.8vw;"></a></td>
                <td class="img"><a onclick="return confirm('Deseja mesmo excluir?')" href="../../php/controle/controle-configurar-paciente.php?paciId=<?php echo $value->getId();?>&acao=delete"><img src="../../img/icon/deletar.svg" style="width: 1.8vw;"></a></td>
            </tr>
            </tbody>
            <?php
                }
            }
            ?> 
       </table>
       <br>
    </div>
    </main>
</body>
</html>