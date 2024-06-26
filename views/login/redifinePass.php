<!DOCTYPE html>
<html lang="pt">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="views/assets/build/images/favicon.ico" type="image/ico" />

    <title>SIGA | Redifinir senha</title>

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
            background: url('http://localhost/siga/views/assets/build/images/back1.jpg') no-repeat center center;
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
                    <form id="formRecuva" method="post" novalidate>
                        <div>
                            <h1 class="mb-4">SIGA</h1>
                        </div>
                        <div class="field item form-group">
                            <input type="text" class="form-control" name="TxtUser" id="username" placeholder="Nome de utilizador" required="" title="Digite o nome de utilizador" />
                        </div>
                        <div class="field item form-group">
                            <input type="text" class="form-control" name="TxtChave" id="chave" placeholder="Colar a chave gerada" required="" title="Colar a chave gerada" />
                        </div>
                        <div class="field item form-group">
                            <input type="password" class="form-control" name="TxtSenha1" id="password1" placeholder="Inserir nova senha" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%^&*]).{8,}" required="" title="Inserir nova senha" />
                        </div>
                        <div class="field item form-group">
                            <input type="password" class="form-control" name="TxtSenha2" id="password2" placeholder="Repetir nova senha" id="Senha2" data-validate-linked='password' required="" title="Repetir nova senha" />
                        </div>
                        <div>
                            <button type="button" name="sendRedifinePass" value="Redifine" id="btn" class="btn btn-outline-secondary btn-block submit">Redifinir</button>
                        </div>
                        <div>
                            <a class="reset_pass" style=" text-align: left;" href="recuva.php">Gerar nova chave..</a>
                            <a class="reset_pass" style=" text-align: right;" href="/siga/">Efectuar login..</a>
                        </div>
                        <div class="clearfix"></div>

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
    <!-- validator -->
    <script src="views/assets/vendors/validator/validator.js"></script>
    <script src="views/assets/vendors/validator/multifield.js"></script>
    <!-- Bootstrap 4 -->
    <script src="views/assets/vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="views/assets/vendors/sweetalert2/sweetalert2.min.js"></script>
    <!-- PNotify -->
    <script src="views/assets/vendors/pnotify/dist/pnotify.js"></script>
    <script src="views/assets/vendors/pnotify/dist/pnotify.buttons.js"></script>
    <script src="views/assets/vendors/pnotify/dist/pnotify.nonblock.js"></script>
    <?php
    if (isset($_SESSION["titulo"])) {
    ?>
        <script type="text/javascript">
            new PNotify({
                title: '<?php $_SESSION["titulo"]; ?>',
                text: '<?php $_SESSION["texto"]; ?>',
                type: '<?php $_SESSION["tipo"]; ?>',
                styling: 'bootstrap3'
            });
        </script>
    <?php
    }
    unset(
        $_SESSION["titulo"],
        $_SESSION["texto"],
        $_SESSION["tipo"]
    );
    ?>
    <script type="text/javascript">
        function hideshow() {
            var password = document.getElementById("password1");
            var slash = document.getElementById("slash");
            var eye = document.getElementById("eye");

            if (password.type === 'password') {
                password.type = "text";
                slash.style.display = "block";
                eye.style.display = "none";
            } else {
                password.type = "password";
                slash.style.display = "none";
                eye.style.display = "block";
            }

        }

        $(document).ready(function() {
            $('#btn').click(function(e) {
                e.preventDefault();
                var usuario = $('#username').val();
                var recuvakey = $('#chave').val();
                var pass1 = $('#password1').val();
                var pass2 = $('#password2').val();
                if (pass2 != pass1) {
                    new PNotify({
                        title: 'Atenção!',
                        text: 'Senhas diferentes',
                        type: 'warning',
                        styling: 'bootstrap3'
                    });
                }
                if (usuario === '' || recuvakey === '' || pass1 === '' ||
                    pass2 === '') {
                    new PNotify({
                        title: 'Atenção!',
                        text: 'Preenche os campos vazios',
                        type: 'danger',
                        styling: 'bootstrap3'
                    });
                } else {
                    let dados = {
                        username: usuario,
                        key: recuvakey,
                    };
                    var caminho = 'controllers/controllerGetKey.php';
                    $.post(caminho, dados, function(result) {
                        var res = $.parseJSON(result);
                        for (var i in res) {
                            alert = res[i].chave;
                            if (res[i].chave === recuvakey) {
                                let redif = {
                                    username: usuario,
                                    senha: pass2
                                };
                                url = 'controllers/controllerRedifinePass.php';
                                $.post(url, redif, function(result) {
                                    var retun = $.parseJSON(result);
                                    for (var i in retun) {
                                        if (retun[i].Erro) {
                                            Swal.fire({
                                                title: "Erro!",
                                                text: "Não foi possivel redifinir a senha",
                                                icon: "error"
                                            });
                                        } else {
                                            Swal.fire({
                                                title: "Sucesso!",
                                                text: "Senha redifinida com sucesso",
                                                icon: "success"
                                            });

                                            window.location.href = '/siga/';
                                        }
                                    }

                                });

                            } else {
                                Swal.fire({
                                    title: "Erro!",
                                    text: "senha não redifinida, gerar nova chave de recuperação",
                                    icon: "error"
                                });
                            }
                        }

                    });

                }
            });
        });
    </script>




</body>

</html>