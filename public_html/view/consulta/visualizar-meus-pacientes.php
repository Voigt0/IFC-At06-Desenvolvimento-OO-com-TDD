<?php
    //Verificar se login foi efetuado
    session_set_cookie_params(0);
    session_start();
    if(!isset($_SESSION['mediId']) || $_SESSION['mediId'] == ''){
        header("Location: ../usuario/login.php");
    } 

    include_once (__DIR__."/../../php/utils/autoload.php");

    $pesquisa = isset($_POST["pesquisa"]) ? $_POST["pesquisa"] : "";

    $cons = Consulta::consultarPacientesDoMedico($_SESSION['mediId']);
    $medi = new Medico($cons[0]['mediId'], $cons[0]['mediNome'], $cons[0]['mediCrm'], $cons[0]['mediEspecializacao'], $cons[0]['mediTelefone'], $cons[0]['mediEmail'], $cons[0]['mediSenha']);
    foreach($cons as $key) {
        $paci = new Paciente($key['paciId'], $key['paciNome'], $key['paciNascimento'], $key['paciEstado'], $key['paciCidade'], $key['paciEndereco'], $key['paciTelefone'], $key['paciComorbidades'], $key['paciTabagismo'], $key['paciEtilismo'], $key['paciAlergias'], $key['paciMedicacao'], $key['paciHistoriaClinica'], $key['paciPeso'],$key['paciAltura']);
        $medi->adicionarPaciente($paci);
    }
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
                <li><a href="visualizar-paciente.php">Consultar pacientes</a></li>
                <li><a href="configurar-consulta.php">Criar consulta</a></li>
                <li><a href="visualizar-consulta.php">Visualizar consulta</a></li>
                <a href="../usuario/medico/perfil.php" class="perfil-btn">Perfil</a>
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
                foreach($medi->listarPacientes() as $key => $value) {
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
            ?> 
       </table>
       <br>
       </div>
</main>
</body>
</html>