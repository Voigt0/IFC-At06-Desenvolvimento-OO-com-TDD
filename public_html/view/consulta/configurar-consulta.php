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

    //Salvar contexto
    if(isset($_GET['consId'])) {
        if(Consulta::validar($_GET['consId'])) {
            $data = Consulta::consultarData($_GET['consId'])[0];
        } else {
            header("Location: ../consulta/configurar-consulta.php");
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DocGO!</title>
    <link rel="stylesheet" href="../../css/configurar-consulta.css">
    <link rel="stylesheet" href="../../css/css-geral.css">
    <link rel="icon" type="image/x-icon" href="../../img/favicon/favicon.ico">

    <!-- Função de busca no Select -->
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

        <!-- Formulário -->
        <div class="heading">
            <h2>Adicione a consulta</h2>
            <a href="../usuario/medico/menu.php"><img src="../../img/icon/backIcon.svg" class="back"></a>
        </div>
        
        <form method="post" action="../../php/controle/controle-configurar-consulta.php?<?php if(isset($data)){echo "acao=update&&consId=".$data['consId']."";}?>" class="">
            <div class="form-box">
                <div class="input-box">
                    <label for="consData">Data</label>
                    <input type="date" id="consData" name="consData" class="input-field" value="<?php if(isset($data)) { echo $data['consData']; }?>" required>
                </div>
                
                <div class="input-box">
                    <label for="consHorario">Horário</label>
                    <input type="time" id="consHorario" name="consHorario" class="input-field" value="<?php if(isset($data)) { echo $data['consHorario']; }?>" required>
                </div>

                <div class="input-radio">
                    <p>Gravidade</p>
                    <input type="radio" id="consGravidade" name="consGravidade" value="1" <?php if(isset($data) && $data['consGravidade'] == '1') echo 'checked';?>>
                    <label id="radio">1</label>
                    <input type="radio" id="consGravidade" name="consGravidade" value="2" <?php if(isset($data) && $data['consGravidade'] == '2') echo 'checked';?>>
                    <label id="radio">2</label>
                    <input type="radio" id="consGravidade" name="consGravidade" value="3" <?php if(isset($data) && $data['consGravidade'] == '3') echo 'checked';?>>
                    <label id="radio">3</label>
                    <input type="radio" id="consGravidade" name="consGravidade" value="4" <?php if(isset($data) && $data['consGravidade'] == '4') echo 'checked';?>>
                    <label id="radio">4</label>
                    <input type="radio" id="consGravidade" name="consGravidade" value="5" <?php if(isset($data) && $data['consGravidade'] == '5') echo 'checked';?>>
                    <label id="radio">5</label>                    
                </div>
            
                <div class="input-checkbox">
                    <p>Consulta finalizada?</p>
                    <input type="checkbox" id="consEstado" name="consEstado" value="0" <?php if(isset($data) && $data['consEstado'] == '0') echo 'checked';?>>
                    <label>Não</label>
                    <input type="checkbox" id="consEstado" name="consEstado" value="1" <?php if(isset($data) && $data['consEstado'] == '1') echo 'checked';?>>
                    <label>Sim</label>
                </div>

                <div class="input-box">
                    <p>Paciente examinado:</p>
                    <select name="Paciente_paciId">
                        <?php
                            //Select Box
                            require_once "../../php/utils/select-box.php";
                            echo selectBox('Paciente', array('paciId', 'paciNome'), $data['Paciente_paciId']);
                        ?>
                    </select>
                </div>

                <div class="footer-form">
                    <input type="submit" value="Salvar" class="btn">
                </div>
            </div>
        </form>
    </div>
    </main>
</body>
</html>