<!DOCTYPE html>
<html lang="pt">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="views/assets/build/images/favicon.ico" type="image/ico" />

    <title>SIGA | Recuperar senha</title>

    <!-- Bootstrap -->
    <link href="views/assets/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="views/assets/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="views/assets/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="views/assets/vendors/animate.css/animate.min.css" rel="stylesheet">
    <!-- PNotify -->
    <link href="views/assets/vendors/pnotify/dist/pnotify.css" rel="stylesheet">
    <link href="views/assets/vendors/pnotify/dist/pnotify.buttons.css" rel="stylesheet">
    <link href="views/assets/vendors/pnotify/dist/pnotify.nonblock.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="views/assets/vendors/google-code-prettify/bin/prettify.min.css" rel="stylesheet">
    <!-- Switchery -->
    <link href="views/assets/vendors/switchery/dist/switchery.min.css" rel="stylesheet">
    <!-- bootstrap-wysiwyg -->
    <link href="views/assets/vendors/starrr/dist/starrr.css" rel="stylesheet">
    <!-- starrr -->
    <link href="views/assets/vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    <!-- Custom Theme Style -->
    <link href="views/assets/build/css/custom.css" rel="stylesheet">
    <link href="views/assets/vendors/sweetalert2/sweetalert2.min.css" rel="stylesheet">

    <style>
        body.login {
            height: 100vh;
            margin: 0;
            display: inline;
            justify-content: center;
            align-items: center;
            overflow: hidden;
            background-color: #f7f7f7;
            position: relative;
        }

        .background {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: url("http://localhost/siga/views/assets/build/images/back1.jpg") no-repeat center center;
            background-size: cover;
            filter: blur(8px);
            z-index: -1;
        }

        .login_wrapper {
            position: relative;
            z-index: 1;
            display: block;
            justify-content: center;
            align-items: center;
            height: 100%;
            width: 100%;
        }

        .login_content {
            background: rgba(255, 255, 255, 0.9);
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .login_content h1 {
            margin-bottom: 20px;
        }

        .login_content .btn {
            margin-top: 20px;
        }

        .login_content .reset_pass {
            display: block;
            margin-top: 10px;
        }
    </style>
</head>

<body class="login">
    <div class="background"></div>
    <div>
        <a class="hiddenanchor" id="signup"></a>
        <a class="hiddenanchor" id="signin"></a>

        <div class="login_wrapper">
            <div class="animate form login_form">
                <section class="login_content">
                    <form method="post">
                        <div>
                            <h1 class="mb-4">SIGA</h1>
                        </div>
                        <div>
                            <input type="text" class="form-control" name="TxtUsuario" placeholder="Nome de utilizador" required="" title="Insere o seu nome de utilizador" aria-required="" />
                        </div>
                        <div>
                            <button type="submit" name="sendRecuva" value="Entrar" class="btn btn-outline-secondary btn-block submit">Recuperar Senha</button>
                        </div>
                        <a class="reset_pass" href="/siga/">Efetuar login...</a>
                        <div class="clearfix"></div>
                        <div class="separator">
                            <div class="clearfix"></div>
                        </div>
                        <div class="form-group row ">
                            <div class="col-sm-12 mb-1">
                                <div class="input-group mb-1 ">
                                    <input type="text" disabled id="Txtcopiar" class="form-control mb-1" value="<?php echo (isset($_POST['sendRecuva'])) ? $chave : '' ?>" placeholder="Chave de recuperação">
                                </div>
                                <span class="input-group-btn mt-1">
                                    <button type=" button" onclick='copyToClickBoard()' class="btn btn-primary-outline form-control mt-1"><i class=' fa fa-copy'></i> Copiar chave</button>
                                </span>
                            </div>
                        </div>
                        <?php echo (isset($_POST['sendRecuva'])) ? "<h6>Copia esta chave de recuperação: <span id='dado'>$chave</span><a href='#' onclick='copyToClickBoard()' title='Clicar para copiar a chvae'><i class='fa fa-copy btn-lg btn success'></i></a></h6>" : ""; ?>
                        <br />
                        <div class="separator">
                            <div class="clearfix"></div>
                            <div>
                                <p class="mt-2">©2023 Todos direitos reservados. | Termos e Privacidade </p>
                            </div>
                        </div>

                    </form>
                </section>
            </div>
        </div>
    </div>
    <!-- jQuery -->
    <script src="views/assets/vendors/jquery/dist/jquery.min.js"></script>
    <!-- PNotify -->
    <script src="views/assets/vendors/pnotify/dist/pnotify.js"></script>
    <script src="views/assets/vendors/pnotify/dist/pnotify.buttons.js"></script>
    <script src="views/assets/vendors/pnotify/dist/pnotify.nonblock.js"></script>
    <!-- validator -->
    <script src="views/assets/vendors/validator/validator.js"></script>
    <script src="views/assets/vendors/validator/multifield.js"></script>
    <!-- Bootstrap 4 -->
    <script src="views/assets/vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="views/assets/vendors/sweetalert2/sweetalert2.min.js"></script>
    <script>
        function copyToClickBoard() {
            var dado = $('#Txtcopiar').val();
            var content = document.getElementById('Txtcopiar').innerHTML;
            navigator.clipboard.writeText(dado);
            new PNotify({
                title: 'Info!',
                text: 'Chave copiada',
                type: 'success',
                styling: 'bootstrap3'
            });

            window.location.href = 'redifinePass.php';

        }
    </script>
</body>

</html>