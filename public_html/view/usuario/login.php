<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DocGO!</title>
    <link rel="stylesheet" href="../../css/style.css">
    <link rel="icon" type="image/x-icon" href="../../img/favicon/favicon.ico">
</head>
<body>
    <main>
        <div class="box">
            <div class="inner-box">
                <div class="forms-wrap">
                    <form action="" class="sign-in-form">
                        <div class="logo">
                            <h4>DocGO!</h4>
                        </div>

                        <div class="heading">
                            <h2>Bem-vindo</h2>
                            <h6>Ainda não tem conta?</h6>
                            <a href="#" class="toggle">Cadastre-se</a>
                        </div>

                        <div class="actual-form">
                            <div class="input-wrap">
                                <input type="email" id="usuaEmail" name="usuaEmail" value="" minlength="4" class="input-field" required>
                                <label>Email</label>
                            </div>

                            <div class="input-wrap">
                                <input type="password" id="usuaSenha" name="usuaSenha" value="" minlength="8" maxlength="20" class="input-field" required>
                                <label>Password</label>
                            </div>

                            <input type="submit" value="Entrar" class="sign-btn">
                        </div>
                    </form>

                    <form action="index.html" autocomplete="off" class="sign-up-form">
                        <div class="logo">
                            <h4>DocGO!</h4>
                        </div>

                        <div class="heading">
                            <h2>Cadastre-se</h2>
                            <h6>Já possui uma conta?</h6>
                            <a href="#" class="toggle">Faça seu login</a>
                        </div>

                        <div class="actual-form">
                            <div class="input-wrap">
                                <input type="text" id="usuaNome" name="usuaNome" value="" minlength="4" class="input-field" required>
                                <label>Nome completo</label>
                            </div>

                            <div class="input-radio">
                                <input type="radio" id="usuaTipo" name="usuaTipo" value="1">
                                <label id="radio">Médico</label>
                                <input type="radio" id="usuaTipo" name="usuaTipo" value="2">
                                <label id="radio">Enfermeiro</label>
                            </div>

                            <div class="input-wrap">
                                <input class="input-field" type="text" id="usuaTelefone" name="usuaTelefone" value="" required>
                                <label>Telefone de contato</label>
                            </div>

                            <div class="input-wrap">
                                <input class="input-field" type="email" id="usuaEmail" name="usuaEmail" value="" required>
                                <label>E-mail</label>
                            </div>

                            <div class="input-wrap">
                                <input class="input-field" type="password" id="usuaPassword" name="usuaPassword" value="" required>
                                <label>Senha</label>
                            </div>

                            <div class="input-wrap">
                                <input class="input-field" type="password" id="confPass" name="confPass" value="" required>
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