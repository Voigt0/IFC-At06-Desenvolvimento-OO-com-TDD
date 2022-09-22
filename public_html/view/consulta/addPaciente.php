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
        
        <form method="" class="">
            <div class="heading">
                <h2>Adicione o paciente</h2>
            </div>


            <div class="form-box">
                <div class="input-box">
                    <label for="paciNome">Nome completo</label>
                    <input type="text" id="paciNome" name="paciNome" class="input-field" required>
                </div>
            
                <div class="input-box">
                    <label for="paciEstado">Estado</label>
                    <input type="text" id="paciEstado" name="paciEstado" class="input-field" required>
                </div>

                <div class="input-box">
                    <label for="paciCidade">Cidade</label>
                    <input type="text" id="paciCidade" name="paciCidade" class="input-field" required>
                </div>

                <div class="input-box">
                    <label for="paciEndereco">Nome completo</label>
                    <input type="text" id="paciEndereco" name="paciEndereco" class="input-field" required>
                </div>

                <div class="input-box">
                    <label for="paciTelefone">Telefone</label>
                    <input type="text" id="paciTelefone" name="paciTelefone" class="input-field" required>
                </div>

                <div class="input-box">
                    <label for="paciComorbidades">Comorbidades</label>
                    <input type="text" id="paciComorbidades" name="paciComorbidades" class="input-field" required>
                </div>

                <div class="input-radio">
                    <p>Tabagismo</p>
                    <input type="radio" id="paciTabagismo" name="paciTabagismo" value="1">
                    <label id="radio">Sim</label>
                    <input type="radio" id="paciTabagismo" name="paciTabagismo" value="2">
                    <label id="radio">Não</label>
                </div>

                <div class="input-radio">
                    <p>Etilismo</p>
                    <input type="radio" id="paciEtilismo" name="paciEtilismo" value="1">
                    <label id="radio">Sim</label>
                    <input type="radio" id="paciEtilismo" name="paciEtilismo" value="2">
                    <label id="radio">Não</label>
                </div>
            
                <div class="input-box">
                    <label for="paciAlergias">Alergias</label>
                    <input type="text" id="paciAlergias" name="paciAlergias" class="input-field" required>
                </div>
                <div class="input-box">
                    <label for="paciMedicacao">Medicações</label>
                    <input type="text" id="paciMedicacao" name="paciMedicacao" class="input-field" required>
                </div>

                <div class="input-box">
                    <label for="paciHistoriaClinica">História Clinica</label>
                    <input type="text" id="paciHistoriaClinica" name="paciHistoriaClinica" class="input-field" required>
                </div>

                <div class="input-box">
                    <label for="paciPeso">Peso</label>
                    <input type="text" id="paciPeso" name="paciPeso" class="input-field" required>
                </div>

                <div class="input-box">
                    <label for="paciAltura">Altura</label>
                    <input type="text" id="paciAltura" name="paciAltura" class="input-field" required>
                </div>
        
                <center><input type="submit" value="Cadastrar" class="btn"></center>

            </div>
        </form>

    </div>
    </main>
</body>
</html>