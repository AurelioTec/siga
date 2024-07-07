<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
ob_start();
session_start();
date_default_timezone_set('Africa/Luanda');
setlocale(LC_TIME, 'pt_br.utf-8');

include '../../session/seguranca.php';
include $_SERVER['DOCUMENT_ROOT'] . "/siga/config/Funcoes.php";

$id = $_SESSION["id"];
$nome = $_SESSION["nome"];
$usuario = $_SESSION["usuario"];
$email = $_SESSION["email"];
$categoria = $_SESSION["categoria"];
$mensg = $_SESSION["mensg"];
$image = $_SESSION["foto"];
?>

<!DOCTYPE html>
<html lang="pt">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="icon" href="../assets/build/images/favicon.ico" type="image/ico" />

    <title>SIGA | Admin</title>

    <!-- jQuery -->
    <script src="../assets/vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <link href="../assets/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" />
    <!-- Font Awesome -->
    <link href="../assets/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
    <link href="../assets/vendors/fontawesome-free/css/all.min.css" rel="stylesheet" />
    <!-- NProgress -->
    <link href="../assets/vendors/nprogress/nprogress.css" rel="stylesheet" />
    <!-- iCheck -->
    <link href="../assets/vendors/iCheck/skins/flat/green.css" rel="stylesheet" />
    <!-- bootstrap-progressbar -->
    <link href="../assets/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" />
    <!-- JQVMap -->
    <link href="../assets/vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet" />
    <!-- bootstrap-daterangepicker -->
    <link href="../assets/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet" />
    <!-- Custom Theme Style -->
    <link href="../assets/build/css/custom.min.css" rel="stylesheet" />
    <!-- sweetalert2 -->
    <link href="../assets/vendors/sweetalert2/sweetalert2.min.css" rel="stylesheet">
    <!-- Datatables -->
    <link href="../assets/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="../assets/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="../assets/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="../assets/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="../assets/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">
    <link href="../assets/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="../assets/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="../assets/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="../assets/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="../assets/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">
    <!-- PNotify -->
    <link href="../assets/vendors/pnotify/dist/pnotify.css" rel="stylesheet">
    <link href="../assets/vendors/pnotify/dist/pnotify.buttons.css" rel="stylesheet">
    <link href="../assets/vendors/pnotify/dist/pnotify.nonblock.css" rel="stylesheet">
    <!-- imputmask -->
    <script src="../assets/vendors/imputmask/jquery.mask.min.js"></script>
    <script src="../assets/vendors/imputmask/jquery.inputmask.min.js"></script>
    <script type="text/javascript">
        function excluirItem(iduser, item) {
            Swal.fire({
                title: 'Atenção!',
                text: 'Você deseja remover o ' + item + '?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Sim, remover!',
                cancelButtonText: 'não, cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    var host = window.location.hostname;
                    window.location.href = '/siga/controllers/controllerRemovUser.php?id=' + btoa(iduser);
                    // Se o usuário confirmar, enviar uma solicitação AJAX para excluir o arquivo
                    //removerItem(iduser, item);
                    /* let caminho="";
                     const dados = {'valor': iduser};
                     $.post(caminho, dados, function (result){
                     alert(dados);
                     });*/
                }

            });
        };
        let turma;
        let disciplina;
        let linha = $('<tr>').appendTo('#tableNotas tbody');
        // Carregar Máscaras nos Inputs
        $(document).ready(function() {
            var TipoDoc = $(".Documento").val();
            if (TipoDoc == "cp") {
                $('.datavaliade').prop('disabled', true);
                $('.NumDoc').mask("999999/9999", {
                    translation: {
                        0: {
                            pattern: /[0-9]/
                        }
                    },
                    placeholder: "ex: 123421/2000"
                });
            }
            $(".Documento").on('change', function(e) {
                e.preventDefault();
                var TipoDoc = $(".Documento").val();
                if (TipoDoc === 'cp') {
                    $('.datavaliade').prop('disabled', true);
                    $('.NumDoc').mask("999999/9999", {
                        translation: {
                            0: {
                                pattern: /[0-9]/
                            }
                        },
                        placeholder: "ex: 123421/2000"
                    });
                } else if (TipoDoc === 'bi') {
                    $('.datavaliade').prop('disabled', false);
                    $('.NumDoc').mask("009999999AA099", {
                        translation: {
                            0: {
                                pattern: /[0]/
                            },
                            9: {
                                pattern: /[0-9]/
                            },
                            'A': {
                                pattern: /[A-Z]/
                            }
                        },
                        placeholder: "ex: 009999999AA099"
                    });
                } else if (TipoDoc === 'ps') {
                    $('.datavaliade').prop('disabled', false);
                    $('.NumDoc').mask("A9999999", {
                        translation: {
                            9: {
                                pattern: /[0-9]/
                            },
                            'A': {
                                pattern: /[A-Z]/
                            }
                        },
                        placeholder: "ex: A9999999"
                    });
                } else if (TipoDoc === 'an') {
                    $('.datavaliade').prop('disabled', true);
                    $('.NumDoc').mask("9999", {
                        translation: {
                            9: {
                                pattern: /[0-9]/
                            }
                        },
                        placeholder: "ex: 1234"
                    });
                }
            });

            $(".Telefone").mask("999 999 999", {
                translation: {
                    9: {
                        pattern: /[0-9]/
                    }
                },
                placeholder: "ex: 923 999 999"
            });
        });

        $(document).ready(function() {
            carregarSala();
            carregarTurma();
            carregarAluno();
            carregarMunicipio();


            $(".Provincia").change((e) => {
                e.preventDefault();
                carregarMunicipio();
            });
            $('#classe').change(function() {
                carregarTurma();
            });
            $('#periodo').change(function() {
                carregarTurma();
            });
        });

        function carregarMunicipio() {
            $(".Municipio").html('<option seleted> Seleciona o Municipio </option>').show();
            let pronome = {
                'idProv': $(".Provincia").val()
            };
            var caminho = "../../controllers/controllerGet.php";
            $.post(caminho, pronome, function(result) {
                var res = $.parseJSON(result);
                for (var i = 0; i < res.length; i++) {

                    var option;
                    option += ' <option value=" ' + res[i].id + '">' + res[i].nome + ' </option>';
                }
                $(".Municipio").html(option).show();
            });
        }

        function carregarTurma() {
            let idClasse = $("#classe").val();
            let periodo = $("#periodo").val();
            let dados = {
                idClasse: idClasse,
                periodo: periodo
            };
            var caminho = "../../controllers/controllerGetTurma.php";
            $.post(caminho, dados, function(result) {
                var res = $.parseJSON(result);
                for (var i = 0; i < res.length; i++) {
                    var option;
                    option += "<option value='" + res[i].idturma + "'>" + res[i].turma + "</option>";
                }
                $("#turma").html(option).show();
                carregarAluno();
            });
        }

        function carregarSala() {
            let numero = 1;
            let cont = {
                'valor': numero
            };
            var url = "../../controllers/controllerGetConfig.php";
            $.post(url, cont, function(result) {
                var res = $.parseJSON(result);
                for (var i = 0; i < res.length; i++) {

                    var optionSala;
                    var optionAnoLect;
                    optionAnoLect += "<option value='" + res[i].anolect + "'>" + res[i].anolect + "</option>";
                    var totalsala = res[i].tsala;
                    for (var j = 1; j <= totalsala; j++) {
                        optionSala += "<option value='" + j + "'>" + j + "</option>";
                    }

                }
                $("#Sala").html(optionSala).show();
                $("#AnoLect").html(optionAnoLect).show();
            });
            $('#classe').change(function() {
                carregarTurma();
                carregarAluno();
            });
            $('#periodo').change(function() {
                carregarTurma();
                carregarAluno();
            });
            $('#turma').change(function() {
                turma = $('#turma').val();
                carregarAluno();
            });
            $('#NomeAl').change(function() {
                alert($('#NomeAl').val());
            });
            $('#Professor').change(function() {
                carregarDisciplina();
            });
            $('#Listar').click(function() {
                turma = $('#turma').val();
                carregarLista();
            });
            $('#ListarNotas').click(function() {
                var tabela = $('#tableNotas');
                tabela.find('tbody tr:not(:last-child)').remove();
                turma = $('#turma').val();
                carregarNotas();
                carregarNomes();
            });
            $('#disciplina').change(function() {
                disciplina = $('#disciplina').val();
                carregarNotas();
            });
        }

        /*  function matricular() {
         
         let urlParam = new URLSearchParams(window.location.search);
         let id = urlParam.get('id');
         // $('#matriculaModal').modal('show');
         let dados = {id: id};
         var url = "../../controllers/controllerGetAluno.php";
         $.post(url, dados, function (response) {
         var dados = JSON.parse(response);
         console.log(response);
         for (var i in dados) {
         document.getElementById("idaluno").value = dados[i].id;
         document.getElementById("IdAluno").innerHTML = dados[i].id;
         document.getElementById("nomeAluno").value = dados[i].nome;
         document.getElementById("nascimento").value = dados[i].nasc;
         document.getElementById("docNum").value = dados[i].docnum;
         document.getElementById("genero").value = dados[i].genero;
         let dataNasc = new Date(dados[i].nasc);
         let dataDifer = Date.now() - dataNasc.getTime();
         let idade = new Date(dataDifer).getFullYear() - 1970;
         document.getElementById("idade").value = idade;
         }
         });
         }
         $('#Matricular').click(function () {
         matricular();
         });*/
        function carregarLista() {
            var tabela = $('#tableAlunoTurma');
            tabela.find('tr:not(:first-child)').remove();
            let classe = $('#classe').val();
            turma = $('#turma').val();
            let anoletivo = $('#anoletivo').val();
            let dados = {
                classe: classe,
                turma: turma,
                anoletivo: anoletivo
            };
            var caminho = "../../controllers/controllerGetAlunoTurma.php";
            $.post(caminho, dados, function(result) {
                var dados = JSON.parse(result);
                for (var i in dados) {
                    if (dados[i].Erro) {
                        Swal.fire(
                            'Atenção!',
                            'Nenhm Registro encontrado!',
                            'warning'
                        );
                    } else {
                        var tr = $('<tr>').appendTo('#tableAlunoTurma tbody');
                        $('<td>').text(dados[i].idmatricula).appendTo(tr);
                        $('<td>').text(dados[i].numatricula).appendTo(tr);
                        $('<td>').text(dados[i].nomealuno).appendTo(tr);
                        $('<td>').text(dados[i].genero).appendTo(tr);
                        $('<td>').text(dados[i].tipomatricula).appendTo(tr);
                    }
                }
            });
        }

        function carregarNomes() {
            var tabela = $('#tableNotas');
            tabela.find('tbody tr:not(:last-child)').remove();
            let classe = $('#classe').val();
            let trim = $('#trimestre').val();
            disciplina = $('#disciplina').val();
            turma = $('#turma').val();
            let anoletivo = $('#anoletivo').val();
            let dados = {
                classe: classe,
                turma: turma,
                trimestre: trim,
                anoletivo: anoletivo,
                diciplina: disciplina
            };
            var caminho = "../../controllers/controllerGetAlunoTurma.php";
            $.post(caminho, dados, function(result) {
                let lista = JSON.parse(result);
                for (var i = 0; i < lista.length; i++) {
                    if (lista[i].Erro) {
                        Swal.fire(
                            'Atenção!',
                            'Nenhm Registro encontrado!',
                            'warning'
                        );
                    } else {
                        $('<td>').text(i + 1).appendTo(linha);
                        $('<td>').text(lista[i].numatricula).appendTo(linha);
                        $('<td>').text(lista[i].nomealuno).appendTo(linha);
                    }
                }
            });
        }

        function carregarNotas() {
            let classe = $('#classe').val();
            let trim = $('#trimestre').val();
            turma = $('#turma').val();
            disciplina = $('#disciplina').val();
            let anoletivo = $('#anoletivo').val();
            let dados = {
                classe: classe,
                turma: turma,
                trimestre: trim,
                anoletivo: anoletivo,
                disciplina: disciplina
            };
            var caminho = "../../controllers/controllerGetNotas.php";
            $.post(caminho, dados, function(result) {
                let lista = JSON.parse(result);
                for (var i = 0; i < lista.length; i++) {
                    if (lista[i].Erro) {
                        Swal.fire(
                            'Atenção!',
                            'Nenhm Registro encontrado!',
                            'warning'
                        );
                    } else {
                        $('<td>').text(lista[i].numatricula).appendTo(linha);
                        $('<td>').text(lista[i].nomealuno).appendTo(linha);
                    }
                }
            });
        }


        function carregarAluno() {
            let classe = $('#classe').val();
            turma = $('#turma').val();
            let anoletivo = $('#anoletivo').val();
            let dados = {
                classe: classe,
                turma: turma,
                anoletivo: anoletivo
            };
            var caminho = "../../controllers/controllerGetAlunoTurma.php";
            $.post(caminho, dados, function(result) {
                var list = $.parseJSON(result);
                for (var i = 0; i < list.length; i++) {
                    var option;
                    option += "<option value='" + list[i].idmatricula + "'>" + list[i].nomealuno + "</option>";
                }
                $("#NomeAl").html(option).show();
            });
        }

        function carregarDisciplina() {
            let idProf = $("#Professor").val();
            let valor = {
                idProf: idProf
            };
            var url = "../../controllers/controllerGetDisciplina.php";
            $.post(url, valor, function(result) {
                var res = $.parseJSON(result);
                for (var i = 0; i < res.length; i++) {
                    var option;
                    option += "<option value='" + res[i].iddisc + "'>" + res[i].codigo + " - " + res[i].disciplina + "</option>";
                }
                $("#Disiplina").html(option).show();
            });
        }


        $(document).ready(function() {
            let valor = 1;
            let cont = {
                'valor': valor
            };
            var endereco = "../../controllers/controllerGetConfig.php";
            $.post(endereco, cont, function(result) {
                var res = $.parseJSON(result);
                for (var i in res) {
                    if (res[i].info) {
                        $("#msm").text("Sistema não configurado");
                        $("#msm").css("background-color", "red");
                        $('#exampleModal').modal('show');
                    } else {
                        $("#msm").text("<?php echo $_SESSION['mensage']; ?>");
                    }
                }
            });
            $("#btnSalvar").click(function(e) {
                e.preventDefault();
                let dados = {
                    'NomeDir': $("#NDirector").val(),
                    'NPedago': $("#NSubPedago").val(),
                    'NAmdin': $("#NSubAdmin").val(),
                    'Tsala': $("#TotalSala").val(),
                    'AnoLect': $("#AnoLectivo").val()
                };
                let rota = "../../controllers/controllerConfigIni.php";
                $.post(rota, dados, function(result) {
                    var res = $.parseJSON(result);
                    for (var i in res) {
                        if (res[i].sucesso) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Informação',
                                text: 'Configuração inicial efetuda',
                                showConfirmButton: false,
                                timer: 1500
                            });
                            $("#msm").text("<?php echo $_SESSION['mensage']; ?>");
                            $('#exampleModal').modal('hide');
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Atenção',
                                text: 'Configuração inicial não efetuda',
                                showConfirmButton: false,
                                timer: 1500
                            });
                            $("#msm").text("Sistema não configurado");
                            $("#msm").css("color", "red");
                        }
                    }
                });
            });
        });
        /*var idalunonota=$('idalunoNota').val();            
         var datatable= $('#tabelNotas').DataTable({
         "processing":true,
         "serverSide":true,
         "order"[],
         "ajax":{
         url:"../../controllers/controllerGetTabelaNotas.php?id=".idalunonota,
         type:"POST"
         }
         });
         
         
         function carregarTbNotas(triemestre) {
         let urlParam = new URLSearchParams(window.location.search);
         let id = urlParam.get('id'); 
         var url="../../controllers/controllerGetNotas.php";
         var data = {'id': id, 'trim': triemestre};
         /*  $.post(url, data, function(result){
         var retorno = $.parseJSON(result);
         //console.log(retorno);
         alert(result);
         
         });
         
         
         }*/
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

            $('#btnFind').click(function() {
                let funcionario = $('#Txtfunc').val();
                if (funcionario === '') {
                    $('.bs-example-modal-lg').modal('show');
                    $('.bs-example-modal-lg').on('shown.bs.modal', function() {
                        var tabelaF = $('#TableFunc').DataTable();
                        var url = "../../controllers/controllerGetFuncAll.php";
                        var data = {
                            'funcionario': funcionario
                        };
                        input = '<input type="checkbox" name="Check" id="Check">';
                        $.post(url, data, function(result) {
                            var res = $.parseJSON(result);
                            tabelaF.clear();
                            for (var i = 0; i < res.length; i++) {
                                tabelaF.row.add([
                                    i + 1,
                                    res[i].nagente,
                                    res[i].nome,
                                    res[i].genero,
                                    res[i].telf,
                                    res[i].email,
                                    input
                                ]).draw();
                            }
                            $('input[type="checkbox"]').on('change', function() {
                                if ($(this).is(':checked')) {
                                    $('input[type="checkbox"]').not(this).prop('checked', false);
                                }
                            });

                        });

                        $('#btnSelecionar').on('click', function() {
                            var selectedRowsData = [];
                            $('input[type="checkbox"]:checked').each(function() {
                                var rowData = tabelaF.row($(this).closest('tr')).data(); // Obtém os dados da linha
                                selectedRowsData.push({
                                    index: rowData[0], // Índice da linha (i + 1)
                                    nagente: rowData[1], // Valor de nagente
                                    nome: rowData[2], // Valor de nome
                                    genero: rowData[3], // Valor de genero
                                    telf: rowData[4], // Valor de telf
                                    email: rowData[5] // Valor de email
                                });
                                $('.bs-example-modal-lg').modal('hide');
                                $('#Txtfunc').val(rowData[1]);
                                $('.NomeFunc').val(rowData[2]);
                                $('.Emailfunc').val(rowData[5]);
                                $('.Telefone').val(rowData[4]);
                                $('.GeneroFunc').val(rowData[3]);

                            });
                        });

                    });
                } else {
                    var url = "../../controllers/controllerGetFunc.php";
                    var data = {
                        'funcionario': funcionario
                    };
                    $.post(url, data, function(result) {
                        var res = $.parseJSON(result);
                        for (var i in res) {
                            if (res[i].Erro) {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Atenção',
                                    text: res[i].Erro,
                                    showConfirmButton: false,
                                    timer: 3000
                                });
                            } else {
                                $('.NomeFunc').val(res[i].nome);
                                $('.Emailfunc').val(res[i].email);
                                $('.Telefone').val(res[i].telf);
                                $('.GeneroFunc').val(res[i].genero);
                            }
                        }

                    });

                }


            });

            // Adicione um manipulador de evento para o envio do formulário
            $('#modalForm').submit(function(e) {
                // Evite o comportamento padrão de envio do formulário
                e.preventDefault();
                // Recupere os valores dos campos do formulário
                var Senha1 = $('#password1').val();
                var Senha2 = $('#Senha2').val();
                var idUsuario = $('#idUser').val();
                if (Senha1 === Senha2) {
                    let valores = {
                        Senha: Senha1,
                        user: idUsuario
                    };
                    var url = "../../controllers/controllerPass.php";
                    $.post(url, valores, function(result) {
                        let lista = JSON.parse(result);
                        for (var i = 0; i < lista.length; i++) {
                            if (lista[i].Erro) {
                                new PNotify({
                                    title: 'Atenção !',
                                    text: lista[i].Erro,
                                    type: 'error',
                                    styling: 'bootstrap3'
                                });
                            } else {
                                new PNotify({
                                    title: 'Regular Success',
                                    text: lista[i].sucesso,
                                    type: 'success',
                                    styling: 'bootstrap3'
                                });
                            }
                        }
                    });

                    setTimeout(function() {
                        window.location.reload();
                    }, 3000);
                    $('#password1').val("");
                    $('#Senha2').val("");
                    $('.bs-example-modal-sm').hide();
                } else {
                    new PNotify({
                        title: 'Atenção !',
                        text: 'As Senhas são diferentes,tente outra vez! ',
                        type: 'error',
                        styling: 'bootstrap3'
                    });
                }

            });
        });


        /*Script jQuery para o medidor de força da senha-- >*/

        $(document).ready(function() {
            $('.Pass').on('input', function() {
                var password = $(this).val();
                var strength = getPasswordStrength(password);

                var strengthBar = $('#strengthBar');
                var strengthMessage = $('#strengthMessage');
                strengthBar.removeClass('weak medium strong very-strong');

                switch (strength) {
                    case 1:
                        strengthBar.addClass('weak');
                        strengthMessage.text('Fraca');
                        break;
                    case 2:
                        strengthBar.addClass('medium');
                        strengthMessage.text('Média');
                        break;
                    case 3:
                        strengthBar.addClass('strong');
                        strengthMessage.text('Forte');
                        break;
                    case 4:
                        strengthBar.addClass('very-strong');
                        strengthMessage.text('Muito Forte');
                        break;
                    default:
                        strengthMessage.text('');
                        break;
                }
            });

            function getPasswordStrength(password) {
                var strength = 0;

                // Critérios para avaliar a força da senha
                if (password.length >= 8) strength++;
                if (password.match(/[a-z]/)) strength++;
                if (password.match(/[A-Z]/)) strength++;
                if (password.match(/[0-9]/)) strength++;
                if (password.match(/[^a-zA-Z0-9]/)) strength++;

                return strength;
            }
        });
    </script>
</head>