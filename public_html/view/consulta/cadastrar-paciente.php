<?php
    //Verificar se login foi efetuado
    session_set_cookie_params(0);
    session_start();
    if(!isset($_SESSION['mediId']) || $_SESSION['mediId'] == ''){
        header("Location: ../usuario/login.php");
    }

    include_once (__DIR__."/../../php/utils/autoload.php");

    //Salvar contexto
    if(isset($_GET['paciId'])) {
        if(Paciente::validar($_GET['paciId'])) {
            $data = Paciente::consultarData($_GET['paciId'])[0];
        } else {
            header("Location: ../consulta/visualizar-paciente.php");
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
    <link rel="stylesheet" href="../../css/cadastrar-paciente.css">
    <link rel="icon" type="image/x-icon" href="../../img/favicon/favicon.ico">
</head>
<body>
    <main>
    <div class="hero">
        <nav>
            <a href="../../index.php"><img src="../../img/favicon/android-chrome-192x192.png" class="logo"></a>
            <ul>
                <li><a href="#">Sobre a equipe</a></li>
                <li><a href="../consulta/addPaciente.php">Consultar pacientes</a></li>
                <a href="../usuario/perfil.php" class="perfil-btn">Perfil</a>
            </ul>
        </nav>
        
        <div class="heading">
            <h2>Adicione o paciente</h2>
        </div>
        
        <form method="" class="">
            <div class="form-box">
                <div class="input-box">
                    <label for="nome">Nome completo</label>
                    <input type="text" id="nome" name="nome" class="input-field" required value="<?php if(isset($data)) { echo $data['paciNome']; }?>" placeholder="Insira o nome do paciente">
                </div>
            
                <div class="input-box">
                    <label for="nascimento">Nascimento</label>
                    <input type="date" id="nascimento" name="nascimento" class="input-field" required value="<?php if(isset($data)) { echo $data['paciNascimento']; }?>" placeholder="Insira o nascimento do paciente">
                </div>

                <div class="input-box">
                    <label for="estado">Estado</label>
                    <input type="text" id="estado" name="estado" class="input-field" required value="<?php if(isset($data)) { echo $data['paciEstado']; }?>" placeholder="Insira o estado do paciente">
                </div>

                <div class="input-box">
                    <label for="cidade">Cidade</label>
                    <input type="text" id="cidade" name="cidade" class="input-field" required value="<?php if(isset($data)) { echo $data['paciCidade']; }?>" placeholder="Insira a cidade do paciente">
                </div>

                <div class="input-box">
                    <label for="endereco">Endereço</label>
                    <input type="text" id="endereco" name="endereco" class="input-field" required value="<?php if(isset($data)) { echo $data['paciEndereco']; }?>" placeholder="Insira o endereço do paciente">
                </div>

                <div class="input-box">
                    <label for="telefone">Telefone</label>
                    <input type="text" id="telefone" name="telefone" class="input-field" required value="<?php if(isset($data)) { echo $data['paciTelefone']; }?>" placeholder="Insira o telefone do paciente">
                </div>

                <div class="input-box">
                    <label for="comorbidades">Comorbidades</label>
                    <textarea id="comorbidades" name="comorbidades" class="input-field" required placeholder="Insira as comorbidades do paciente"><?php if(isset($data)) { echo $data['paciComorbidades']; }?></textarea>
                </div>

                <p>Tabagismo</p>
                <div class="input-radio">
                    <input type="radio" id="tabagismo" name="tabagismo" value="1" <?php if(isset($data) && $data['paciTabagismo'] == 1) { echo "checked"; }?>>
                    <label id="radio">Sim</label>
                    <input type="radio" id="tabagismo" name="tabagismo" value="0" <?php if(isset($data) && $data['paciTabagismo'] == 0) { echo "checked"; }?>>
                    <label id="radio">Não</label>
                </div>

                <p>Etilismo</p>
                <div class="input-radio">
                    <input type="radio" id="etilismo" name="etilismo" value="1" <?php if(isset($data) && $data['paciEtilismo'] == 1) { echo "checked"; }?>>
                    <label id="radio">Sim</label>
                    <input type="radio" id="etilismo" name="etilismo" value="0" <?php if(isset($data) && $data['paciEtilismo'] == 0) { echo "checked"; }?>>
                    <label id="radio">Não</label>
                </div>
            
                <div class="input-box">
                    <label for="alergias">Alergias</label>
                    <textarea id="alergias" name="alergias" class="input-field" required placeholder="Insira as alergias do paciente"><?php if(isset($data)) { echo $data['paciAlergias']; }?></textarea>
                </div>
                <div class="input-box">
                    <label for="medicacao">Medicações</label>
                    <textarea id="medicacao" name="medicacao" class="input-field" required placeholder="Insira as medicações do paciente"><?php if(isset($data)) { echo $data['paciMedicacao']; }?></textarea>
                </div>

                <div class="input-box">
                    <label for="historiaClinica">História Clinica</label>
                    <textarea id="historiaClinica" name="historiaClinica" class="input-field" required placeholder="Insira uma breve história clinica do paciente"><?php if(isset($data)) { echo $data['paciHistoriaClinica']; }?></textarea>
                </div>

                <div class="input-box">
                    <label for="peso">Peso</label>
                    <input type="text" id="peso" name="peso" class="input-field" required value="<?php if(isset($data)) { echo $data['paciPeso']; }?>" placeholder="Insira o peso do paciente">
                </div>

                <div class="input-box">
                    <label for="altura">Altura</label>
                    <input type="text" id="altura" name="altura" class="input-field" required value="<?php if(isset($data)) { echo $data['paciAltura']; }?>" placeholder="Insira a altura do paciente">
                </div>
        
                <input type="submit" value="Cadastrar" class="btn">

            </div>
        </form>

    </div>
    </main>
</body>
</html>