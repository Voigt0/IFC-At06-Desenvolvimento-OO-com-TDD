<?php
    if (session_status() === PHP_SESSION_NONE) {
        session_set_cookie_params(0);
        session_start();
        if(isset($_SESSION['mediId']) && $_SESSION['mediId'] != '') {
            header("Location: medico/menu.php");
        } else if(isset($_SESSION['receId']) && $_SESSION['receId'] != '') {
            header("Location: recepcionista/menu.php");
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
    <link rel="stylesheet" href="../../css/login.css">
    <link rel="icon" type="image/x-icon" href="../../img/favicon/favicon.ico">
</head>
<body>
    <main>
        <div class="box">
            <div class="inner-box">
                <div class="forms-wrap">
                    <form method="post" action="../../php/controle/controle-login.php" class="sign-in-form">
                        <div class="logo">
                            <h4>DocGO!</h4>
                        </div>

                        <div class="heading">
                            <h2>Bem-vindo</h2>
                            <h6>Ainda não tem conta?</h6>
                            <a href="#" class="toggle">Cadastre-se</a>
                        </div>

                        

                        <div class="actual-form">

                            <div class="input-radio">
                                <input required type="radio" id="tipo" name="tipo" value="medico">
                                <label id="radio">Médico</label>
                                <input required type="radio" id="tipo" name="tipo" value="recepcionista">
                                <label id="radio">Recepcionista</label>
                            </div>

                            <div class="input-wrap">
                                <input type="email" id="email" name="email" value="" minlength="4" class="input-field" required>
                                <label>Email</label>
                            </div>

                            <div class="input-wrap">
                                <input type="password" id="senha" name="senha" value="" minlength="8" maxlength="20" class="input-field" required>
                                <label>Senha</label>
                            </div>

                            <input type="submit" value="Entrar" class="sign-btn">
                        </div>
                    </form>

                    <form method="post" action="../../php/controle/controle-cadastro.php" autocomplete="off" class="sign-up-form">

                        <div class="heading">
                            <h2>Cadastre-se</h2>
                            <h6>Já possui uma conta?</h6>
                            <a href="#" class="toggle">Faça seu login</a>
                        </div>

                        <div class="actual-form">
                            <div class="input-wrap">
                                <input type="text" id="nome" name="nome" value="" minlength="4" class="input-field" required>
                                <label>Nome completo</label>
                            </div>

                            <div class="input-radio">
                                <input required type="radio" id="tipo" name="tipo" value="medico">
                                <label id="radio">Médico</label>
                                <input required type="radio" id="tipo" name="tipo" value="recepcionista">
                                <label id="radio">Recepcionista</label>
                            </div>

                            <div class="input-wrap">
                                <input class="input-field" type="text" id="crm" name="crm" value="" required>
                                <label>CRM (apenas para médicos)</label>
                            </div>
                            
                            <div class="input-wrap">
                                <input class="input-field" type="text" id="especializacao" name="especializacao" value="" required>
                                <label>Especialização</label>
                            </div>

                            <div class="input-wrap">
                                <input class="input-field" type="text" id="telefone" name="telefone" value="" required>
                                <label>Telefone de contato</label>
                            </div>

                            <div class="input-wrap">
                                <input class="input-field" type="email" id="email" name="email" value="" required>
                                <label>E-mail</label>
                            </div>

                            <div class="input-wrap">
                                <input class="input-field" type="password" id="senha" name="senha" value="" required>
                                <label>Senha</label>
                            </div>

                            <div class="input-wrap">
                                <input class="input-field" type="password" id="confSenha" name="confSenha" value="" required>
                                <label>Confirmar Senha</label>
                            </div>

                            <input type="submit" value="Cadastrar" class="sign-btn">
                        </div>
                    </form>
                </div>

                <div class="carousel">
                    <div class="images-wrapper">
                        <img src="../../img/png/login.png">
                    </div>
                </div>
            </div>
        </div>
    </main>
    <script src="../../js/login.js"></script>
</body>
</html>