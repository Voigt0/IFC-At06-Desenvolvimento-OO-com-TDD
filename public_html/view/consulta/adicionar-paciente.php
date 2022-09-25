<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DocGO!</title>
    <link rel="stylesheet" href="../../css/addPaciente.css">
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
        
        <form method="post" action="../../php/controle/controle-adicionar-paciente.php" class="">
            <div class="heading">
                <h2>Adicione o paciente</h2>
            </div>


            <div class="form-box">
                <div class="input-box">
                    <label for="nome">Nome completo</label>
                    <input type="text" id="nome" name="nome" class="input-field" required>
                </div>
            
                <div class="input-box">
                    <label for="estado">Estado</label>
                    <input type="text" id="estado" name="estado" class="input-field" required>
                </div>

                <div class="input-box">
                    <label for="cidade">Cidade</label>
                    <input type="text" id="cidade" name="cidade" class="input-field" required>
                </div>

                <div class="input-box">
                    <label for="endereco">Nome completo</label>
                    <input type="text" id="endereco" name="endereco" class="input-field" required>
                </div>

                <div class="input-box">
                    <label for="telefone">Telefone</label>
                    <input type="text" id="telefone" name="telefone" class="input-field" required>
                </div>

                <div class="input-box">
                    <label for="comorbidades">Comorbidades</label>
                    <input type="text" id="comorbidades" name="comorbidades" class="input-field" required>
                </div>

                <div class="input-radio">
                    <p>Tabagismo</p>
                    <input type="radio" id="tabagismo" name="tabagismo" value="1">
                    <label id="radio">Sim</label>
                    <input type="radio" id="tabagismo" name="tabagismo" value="0">
                    <label id="radio">Não</label>
                </div>

                <div class="input-radio">
                    <p>Etilismo</p>
                    <input type="radio" id="etilismo" name="etilismo" value="1">
                    <label id="radio">Sim</label>
                    <input type="radio" id="etilismo" name="etilismo" value="0">
                    <label id="radio">Não</label>
                </div>
            
                <div class="input-box">
                    <label for="alergias">Alergias</label>
                    <input type="text" id="alergias" name="alergias" class="input-field" required>
                </div>
                <div class="input-box">
                    <label for="medicacao">Medicações</label>
                    <input type="text" id="medicacao" name="medicacao" class="input-field" required>
                </div>

                <div class="input-box">
                    <label for="historiaClinica">História Clinica</label>
                    <input type="text" id="historiaClinica" name="historiaClinica" class="input-field" required>
                </div>

                <div class="input-box">
                    <label for="peso">Peso</label>
                    <input type="text" id="peso" name="peso" class="input-field" required>
                </div>

                <div class="input-box">
                    <label for="altura">Altura</label>
                    <input type="text" id="altura" name="altura" class="input-field" required>
                </div>
        
                <center><input type="submit" value="Cadastrar" class="btn"></center>

            </div>
        </form>

    </div>
    </main>
</body>
</html>