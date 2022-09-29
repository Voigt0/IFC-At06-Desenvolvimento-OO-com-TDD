<?php
    // Verificar se login foi efetuado
    if (session_status() === PHP_SESSION_NONE) {
        session_set_cookie_params(0);
        session_start();
        if(isset($_SESSION['mediId']) && $_SESSION['mediId'] != '') {
            header("Location: medico/menu.php");
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
        <!-- Box = Caixa maior -->
        <div class="box">
            <!-- Caixa interna -->
            <div class="inner-box">
                <div class="forms-wrap">
                    <!-- Formulário de login -->
                    <form method="post" action="../../php/controle/controle-login.php" class="sign-in-form">
                        <!-- Cabeçalho -->
                        <div class="logo">
                            <a href="../../index.php" >
                                <h4>DocGO!</h4>
                            </a>
                        </div>

                        <div class="heading">
                            <h2>Bem-vindo</h2>
                            <h6>Ainda não tem conta?</h6>
                            <a href="#" class="toggle">Cadastre-se</a>
                        </div>

                        <div class="actual-form">
                        <!-- Campos do formulário -->
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

                    <!-- Formulário de cadastro -->
                    <form method="post" action="../../php/controle/controle-cadastro.php" autocomplete="off" class="sign-up-form">

                        <div class="heading">
                            <h2>Cadastre-se</h2>
                            <h6>Já possui uma conta?</h6>
                            <a href="#" class="toggle">Faça seu login</a>
                        </div>

                        <div class="actual-form">
                        <!-- Campos do formulário -->
                            <div class="input-wrap">
                                <input type="text" id="nome" name="nome" value="" minlength="4" class="input-field" required onblur="validar('nome', document.getElementById('nome').value);" />
                                <label>Nome completo</label>
                                <div id="div_nome"> </div>
                            </div>

                            <div class="input-wrap">
                                <input class="input-field" type="text" id="crm" name="crm" value="" pattern="[0-9]{5}-[A-Z]{2}" OnKeyPress="formatar('#####-##', this)" maxlength="8" required onblur="validar('crm', document.getElementById('crm').value);" />
                                <label>CRM</label>
                                <div id="div_crm"></div>
                            </div>
                            
                            <div class="input-wrap">
                                <input class="input-field" type="text" id="especializacao" name="especializacao" value="" required onblur="validar('especializacao', document.getElementById('especializacao').value);" />
                                <label>Especialização</label>
                                <div id="div_especializacao"> </div>
                            </div>

                            <div class="input-wrap">
                                <input class="input-field" type="text" id="telefone" name="telefone" value="" OnKeyPress="formatar('## # ####-####', this)" maxlength="14" required onblur="validar('telefone', document.getElementById('telefone').value);"/>
                                <label>Telefone de contato</label>
                                <div id="div_telefone"></div>
                            </div>

                            <div class="input-wrap">
                                <input class="input-field" type="email" id="email-cad" name="email" value="" required onblur="validar('email-cad', document.getElementById('email-cad').value);" />
                                <label>E-mail</label>
                                <div id="div_email-cad"> </div>
                            </div>

                            <div class="input-wrap">
                                <input class="input-field" type="password" id="senha-cad" name="senha" value="" maxlength="20" required onblur="validar('senha-cad', document.getElementById('senha-cad').value);" />
                                <label>Senha</label>
                                <div id="div_senha-cad"> </div>
                            </div>

                            <div class="input-wrap">
                                <input class="input-field" type="password" id="confSenha" name="confSenha" value="" maxlength="20" required onblur="validar('confSenha', document.getElementById('confSenha').value);" />
                                <label>Confirmar Senha</label>
                                <div id="div_confSenha"> </div>
                            </div>

                            <input type="submit" value="Cadastrar" class="sign-btn">
                        </div>
                    </form>
                </div>

                <div class="img">
                    <div class="images-wrapper">
                        <img src="../../img/png/login.png">
                    </div>
                </div>
            </div>
        </div>
    </main>
    <script src="../../js/login.js"></script>
    <script type="text/javascript" src="../../ajax/ajax.js"></script>


</body>
</html>