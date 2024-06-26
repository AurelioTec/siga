<!-- footer content -->
<footer>
    <div class="pull-right">
        Desenvolvido por - Afonso Aurelio
    </div>
    <div class="clearfix"></div>
</footer>
<!-- /footer content -->
</div>
</div>

<script src="../assets/vendors/jquery-tabledit/jquery.tabledit.min.js"></script>
<!-- Bootstrap -->
<script src="../assets/vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<!-- FastClick -->
<script src="../assets/vendors/fastclick/lib/fastclick.js"></script>
<!-- NProgress -->
<script src="../assets/vendors/nprogress/nprogress.js"></script>
<!-- Chart.js -->
<script src="../assets/vendors/Chart.js/dist/Chart.min.js"></script>
<!-- gauge.js -->
<script src="../assets/vendors/gauge.js/dist/gauge.min.js"></script>
<!-- bootstrap-progressbar -->
<script src="../assets/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
<!-- iCheck -->
<script src="../assets/vendors/iCheck/icheck.min.js"></script>
<!-- Skycons -->
<script src="../assets/vendors/skycons/skycons.js"></script>
<!-- Flot -->
<script src="../assets/vendors/Flot/jquery.flot.js"></script>
<script src="../assets/vendors/Flot/jquery.flot.pie.js"></script>
<script src="../assets/vendors/Flot/jquery.flot.time.js"></script>
<script src="../assets/vendors/Flot/jquery.flot.stack.js"></script>
<script src="../assets/vendors/Flot/jquery.flot.resize.js"></script>
<!-- Flot plugins -->
<script src="../assets/vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
<script src="../assets/vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
<script src="../assets/vendors/flot.curvedlines/curvedLines.js"></script>
<!-- DateJS -->
<script src="../assets/vendors/DateJS/build/date.js"></script>
<!-- JQVMap -->
<script src="../assets/vendors/jqvmap/dist/jquery.vmap.js"></script>
<script src="../assets/vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
<script src="../assets/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
<!-- bootstrap-daterangepicker -->
<script src="../assets/vendors/moment/min/moment.min.js"></script>
<script src="../assets/vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- parsleyjs -->
<script src="../assets/vendors/parsleyjs/dist/parsley.min.js"></script>
<!-- sweetalert2 -->
<script src="../assets/vendors/sweetalert2/sweetalert2.min.js"></script>
<!-- Datatables -->
<script src="../assets/vendors/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="../assets/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script src="../assets/vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
<script src="../assets/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
<script src="../assets/vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
<script src="../assets/vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
<script src="../assets/vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
<script src="../assets/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
<script src="../assets/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
<script src="../assets/vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="../assets/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
<script src="../assets/vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
<!-- validator -->
<script src="../assets/vendors/validator/validator.js"></script>
<script src="../assets/vendors/validator/multifield.js"></script>
<!-- PNotify -->
<script src="../assets/vendors/pnotify/dist/pnotify.js"></script>
<script src="../assets/vendors/pnotify/dist/pnotify.buttons.js"></script>
<script src="../assets/vendors/pnotify/dist/pnotify.nonblock.js"></script>


<!-- Custom Theme Scripts -->
<script src="../assets/build/js/custom.min.js"></script>
<?php
if (isset($_SESSION['msgTitulo'])) {
?>
    <script type="text/javascript">
        Swal.fire({
            title: "<?php echo $_SESSION['msgTitulo']; ?>",
            text: "<?php echo $_SESSION['msgcab']; ?>",
            icon: "<?php echo $_SESSION['msgCod']; ?>"
        }).then((result) => {
            if (result.isConfirmed) {
                <?php
                if (isset($_SESSION['urlRel'])) {
                ?>
                    var urlRel = <?php echo $_SESSION['urlRel']; ?>
                    var idRel = <?php echo $_SESSION['idRel']; ?>
                    imprimirRel(urlRel, idRel);
                <?php
                    unset($_SESSION["urlRel"], $_SESSION["idRel"]);
                } else {
                ?>
                    var url = "<?php echo $_SESSION['url']; ?>";
                    window.location.href = url;
                <?php
                }
                ?>
            }
        });
    </script>
<?php
    unset($_SESSION['msgTitulo'], $_SESSION['msgcab'], $_SESSION['msgCod'], $_SESSION["url"], $_SESSION["url"]);
}
?>



<script type="text/javascript">
    /*
     * função para confirmar e deletar com o sweet alert 2
     */
    function imprimirRel(urlR, id) {
        Swal.fire({
            title: "Imprimir!",
            text: 'Deseja Imprimir a ficha de Inscrição?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Sim, imprimir!',
            cancelButtonText: 'Não'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = urlR + id;
            }
        });
    }

    function excluirItem(iduser, item) {
        Swal.fire({
            title: 'Atenção!',
            text: 'Você deseja remover o ' + item + ' ?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Sim, remover!',
            cancelButtonText: 'não, cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: "POST",
                    url: "../../controllers/controllerDelUser.php",
                    data: {
                        id: btoa(iduser)
                    },
                    success: function(response) {
                        // Exibir mensagem de sucesso
                        var data = JSON.parse(response);
                        // Verificar se a remoção foi bem-sucedida
                        if (data.info === 'sucesso') {
                            // Exibir mensagem de sucesso
                            Swal.fire(
                                'Removido!',
                                'O ' + item + 'foi removido com sucesso.',
                                'success'
                            );
                        } else {
                            // Exibir mensagem de erro
                            Swal.fire(
                                'Erro!',
                                'Ocorreu um erro ao tentar remover o ' + item,
                                'error'
                            );
                        }
                    }
                });
            }

        });
    };

    /* var host=window.location.hostname;
     window.location.href ='../../controllers/controllerRemovUser.php?id=' + btoa(iduser);*/
    // Se o usuário confirmar, enviar uma solicitação AJAX para excluir o arquivo
    //removerItem(iduser, item);
    /*let caminho='../../controllers/controllerRemovUser.php';
     const dados = {'id': btoa(iduser)};
     $.get(caminho, dados, function (result){
     alert(result);
     });*/
    /* function removerItem(iduser, item) {
     // Enviar solicitação AJAX para excluir o arquivo
     
     
     }*/
    $(document).ready(function() {
        $('#tableUser').DataTable({
            "language": {
                "url": "../assets/vendors/datatables.net/js/pt.json"
            }
        });
    });
    $(document).ready(function() {

        $("inputSuccess5").mask("999 999 999", {
            translation: {
                9: {
                    pattern: /[0-9]/
                }
            },
            placeholder: "exemplo: 923 999 999"
        });
    });
    $(document).ready(function() {
        $('[title]').tooltip();
    });
    $('#exampleModal').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        //var recipient = button.data('whatever') // Extract info from data-* attributes
        // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
        // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
        var modal = $(this);
        $("#btnSalvar").click(function(e) {
            e.preventDefault;
            var Tsala = $("#TotalSala").val();
            var Alect = $("#AnoLectivo").val();
            //alert(Tsala+" - "+Alect);

        });
        //modal.find('.modal-title').text('New message to ' + recipient)
        // var result = modal.find('.modal-body input').val(recipient)
    })

    function verSenha() {
        var temp = document.getElementById("typepass");
        if (temp.type === "password") {
            temp.type = "text";
        } else {
            temp.type = "password";
        }
    }

    function imprimir(url, texto) {
        Swal.fire({
            title: "Imprimir!",
            text: texto,
            icon: 'info',
            showCancelButton: true,
            confirmButtonText: 'Sim, imprimir!',
            cancelButtonText: 'Não'
        }).then((result) => {
            if (result.isConfirmed) {
                // Define o tamanho da janela como uma folha A4
                var largura = 210; // largura em milímetros
                var altura = 297; // altura em milímetros

                // Calcula as dimensões da janela considerando pixels
                var larguraPixel = largura * (4 / 3); // 1mm = 4/3px
                var alturaPixel = altura * (4 / 3); // 1mm = 4/3px

                // Abre uma nova janela
                var novaJanela = window.open(url, '_blank', 'toolbar=yes,scrollbars=yes,resizable=yes,top=100,left=100,width=780 ,height=800');

                // Minimiza a nova janela
                novaJanela.blur();

                // Foca na janela atual
                window.focus();
            }
        });
    }

    /* $.ajax({
     url: '../../controllers/controllerRemovUser.php',
     type: 'GET',
     data: {id: iduser},
     success: function (response) {
     
     if (response == 200){
     // Se a exclusão for bem-sucedida, exibir uma mensagem de sucesso
     Swal.fire(
     'Sucesso!',
     'O  foi removido com sucesso.',
     'success'
     );
     }
     }, error: function () {
     // Se ocorrer um erro, exibir uma mensagem de erro
     Swal.fire(
     'Erro!',
     'Ocorreu um erro ao tentar remover o.',
     'error'
     );
     }
     }); */
    // initialize a validator instance from the "FormValidator" constructor.
    // A "<form>" element is optionally passed as an argument, but is not a must
    var validator = new FormValidator({
        "events": ['blur', 'input', 'change']
    }, document.forms[0]);
    // on form "submit" event
    document.forms[0].onsubmit = function(e) {
        var submit = true,
            validatorResult = validator.checkAll(this);
        console.log(validatorResult);
        return !!validatorResult.valid;
    };
    // on form "reset" event
    document.forms[0].onreset = function(e) {
        validator.reset();
    };
    // stuff related ONLY for this demo page:
    $('.toggleValidationTooltips').change(function() {
        validator.settings.alerts = !this.checked;
        if (this.checked)
            $('form .alert').remove();
    }).prop('checked', false);
</script>
</body>

</html>