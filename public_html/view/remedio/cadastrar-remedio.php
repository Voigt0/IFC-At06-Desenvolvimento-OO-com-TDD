<?php
    //Verificar se login foi efetuado
    if (session_status() === PHP_SESSION_NONE) {
        session_set_cookie_params(0);
        session_start();
        if(!isset($_SESSION['mediId']) || $_SESSION['mediId'] == ''){
            header("Location: ../login.php");
        }
    }

    include_once (__DIR__."/../../php/utils/autoload.php");

    // Salvar contexto
    if(isset($_GET['remeId'])) {
        if(Remedio::validar($_GET['remeId'])) {
            $data = Remedio::consultarData($_GET['remeId'])[0];
        } else {
            header("Location: ../consulta/visualizar-remedio.php");
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
    <link rel="stylesheet" href="../../css/css-geral.css">
    <link rel="stylesheet" href="../../css/cadastrar-paciente.css">
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
                <a href="../usuario/medico/perfil.php" class="perfil-btn">Perfil</a>
            </ul>
        </nav>

        <!-- Conteúdo da página -->
        <div class="heading">
            <h2>Adicione o medicamento</h2>
        </div>
        
        <!-- Formulário -->
        <form method="post" action="../../php/controle/controle-configurar-remedio.php?<?php if(isset($data)){echo "acao=update&&remeId=".$data['remeId']."";}?>" class="">
            <div class="form-box">
                <div class="input-box">
                    <label for="nome">Nome do remédio</label>
                    <input type="text" id="nome" name="nome" class="input-field" required value="<?php if(isset($data)) { echo $data['remeNome']; }?>" placeholder="Insira o nome do remédio">
                </div>
            
                <p>Genérico ou original</p>
                <div class="input-radio">
                    <input type="radio" id="classificacao" name="classificacao" value="Genérico" <?php if(isset($data) && $data['remeClassificacao'] == 'Genérico') { echo "checked"; }?>>
                    <label id="radio">Genérico</label>
                    <input type="radio" id="classificacao" name="classificacao" value="Original" <?php if(isset($data) && $data['remeClassificacao'] == 'Original') { echo "checked"; }?>>
                    <label id="radio">Original</label>
                </div>

                <p>Tipo do remédio</p>
                <div class="input-radio">
                    <input type="radio" id="tipo" name="tipo" value="Comprimido" <?php if(isset($data) && $data['remeTipo'] == 'Comprimido') { echo "checked"; }?>>
                    <label id="radio">Comprimido</label>
                    <input type="radio" id="tipo" name="tipo" value="Líquido" <?php if(isset($data) && $data['remeTipo'] == 'Líquido') { echo "checked"; }?>>
                    <label id="radio">Líquido</label>
                </div>

                <div class="input-box">
                    <label for="idade">Recomendado acima de quantos anos?</label>
                    <input type="number" id="idade" name="idade" class="input-field" required value="<?php if(isset($data)) { echo $data['remeIdade']; }?>" placeholder="Insira a idade indicada do remédio">
                </div>
                
                <input type="submit" value="Cadastrar" class="btn">

            </div>
        </form>

    </div>
    </main>
    <!-- Script do cadastro de pacientes -->
    <script src="../../js/cadastrar-paciente.js"></script>
</body>
</html>