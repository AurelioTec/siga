<!DOCTYPE html>
<html lang="pt">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="views/assets/build/images/favicon.ico" type="image/ico" />

    <title>SIGA | Login</title>

    <!-- Bootstrap -->
    <link href="views/assets/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="views/assets/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="views/assets/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="views/assets/vendors/animate.css/animate.min.css" rel="stylesheet">

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
                    <form method="post">
                        <div>
                            <h1 class="mb-4">SIGA</h1>
                        </div>
                        <div>
                            <input type="text" class="form-control" name="TxtUsuario" placeholder="Nome de utilizador" required="" title="Insere o seu nome de utilizador" />
                        </div>
                        <div>
                            <input type="password" class="form-control" name="TxtSenha" placeholder="Senha" required="" title="insere a sua senha" />
                        </div>
                        <div>
                            <button type="submit" name="sendLogin" value="Entrar" class="btn btn-outline-secondary btn-block submit">Entrar</button>
                        </div>
                        <a class="reset_pass" href="#" onclick="showAlert()">Esqueceu a sua senha?</a>
                        <div class="clearfix"></div>

                        <div class="separator">
                            <div class="clearfix"></div>
                            <h1>Acesso Restrito</h1>
                            <br />
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
    <!-- Bootstrap 4 -->
    <script src="views/assets/vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="views/assets/vendors/sweetalert2/sweetalert2.min.js"></script>
    <?php
    if (isset($_SESSION["msgTitulo"]) == "Sucesso") {
        $URL = "http://localhost/siga/";
    ?>
        <script type="text/javascript">
            Swal.fire({
                title: "<?php echo $_SESSION["msgTitulo"]; ?>",
                text: "<?php echo $_SESSION["msg"]; ?>",
                icon: "<?php echo $_SESSION["msgCod"]; ?>"
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = "<?php echo 'views/admin/'; ?>";
                }

            })
        </script>
    <?php
        unset(
            $_SESSION["msgTitulo"],
            $_SESSION["msg"],
            $_SESSION["msgCod"]
        );
    } elseif (isset($_SESSION["msgTitulo"]) == "Atenção") {
    ?>
        <script type="text/javascript">
            Swal.fire({
                title: "<?php echo $_SESSION["msgTitulo"]; ?>",
                text: "<?php echo $_SESSION["msg"]; ?>",
                icon: "<?php echo $_SESSION["msgCod"]; ?>"
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = "<?php echo $URL; ?>";
                }
            })
        </script>
    <?php
        unset(
            $_SESSION["msgTitulo"],
            $_SESSION["msg"],
            $_SESSION["msgCod"]
        );
    }
    ?>

    <script type="text/javascript">
        function showAlert() {
            Swal.fire({
                title: "Info!",
                text: "Entre em contacto com a área técnica para repor a senha ",
                icon: "info"
            });
        }
    </script>
</body>

</html>