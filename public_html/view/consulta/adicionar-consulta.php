<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DocGO!</title>
    <link rel="stylesheet" href="../../css/adicionar-consulta.css">
    <link rel="stylesheet" href="../../css/css-geral.css">
    <link rel="icon" type="image/x-icon" href="../../img/favicon/favicon.ico">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/js/standalone/selectize.min.js" integrity="sha256-+C0A5Ilqmu4QcSPxrlGpaZxJ04VjsRjKu+G82kl5UJk=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/css/selectize.bootstrap3.min.css" integrity="sha256-ze/OEYGcFbPRmvCnrSeKbRTtjG4vGLHXgOqsyLFTRjg=" crossorigin="anonymous" />
    <script>
        $(document).ready(function () {
            $('select').selectize({
              sortField: 'text'
            });
        });
    </script>
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

        <form method="post" action="../../php/controle/controle-adicionar-consulta.php" class="">
            <div class="heading">
                <h2>Adicione a consulta</h2>
            </div>

            <div class="form-box">
                <div class="input-box">
                    <label for="consData">Data</label>
                    <input type="date" id="consData" name="consData" class="input-field" required>
                </div>
                
                <div class="input-box">
                    <label for="consHorario">Horário</label>
                    <input type="time" id="consHorario" name="consHorario" class="input-field" required>
                </div>

                <div class="input-radio">
                    <p>Gravidade - Nível de dor</p>
                    <input type="radio" id="consGravidade" name="consGravidade" value="1">
                    <!-- <img src="../../img/png/5.png" class="img-gravidade"> -->
                    <label id="radio">1</label>
                    <input type="radio" id="consGravidade" name="consGravidade" value="2">
                    <label id="radio">2</label>
                    <input type="radio" id="consGravidade" name="consGravidade" value="3">
                    <label id="radio">3</label>
                    <input type="radio" id="consGravidade" name="consGravidade" value="4">
                    <label id="radio">4</label>
                    <input type="radio" id="consGravidade" name="consGravidade" value="5">
                    <label id="radio">5</label>
                </div>
            
                <div class="input-checkbox">
                    <p>Consulta finalizada?</p>
                    <input type="checkbox" id="consEstado" name="consEstado" value="1">
                    <label>Sim</label>
                </div>

                <div class="input-box">
                    <p>Paciente examinado:</p>
                    <select name="Paciente_paciId">
                        <option value="">Selecione um paciente</option>
                        <option value="valor1">Asher Lanay</option>
                        <option value="valor2">João Vitor</option>
                        <option value="valor3">Larissa Schmitz</option>
                        <option value="valor4">Rodrigo Voigt Filho</option>
                    </select>
                </div>

                <div class="input-box">
                    <p>Médico responsável:</p>
                    <select name="Medico_medId">
                        <option value="">Selecione um médico</option>
                        <option value="valor1">Dr. AAA</option>
                        <option value="valor2">Dra. BBB</option>
                        <option value="valor3">Dra. CCC</option>
                        <option value="valor4">Dr. DDD</option>
                    </select>
                </div>

                <input type="submit" value="Cadastrar" class="btn">
                
            </div>
        </form>

    </div>
    </main>
</body>
</html>