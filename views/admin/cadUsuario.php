<?php
include('layout/header.php');
include('layout/sidebar.php');
include('layout/navbar.php');
include('../../controllers/controllerCadUsuario.php');
include('../../controllers/controllerGet.php');
?>
<div class="right_col" role="main">
    <div class="page-title">
        <div class="title_left">
            <h3>Utilizadores</h3>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12 col-sm-12 ">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Cadastrar utilizadores</h2>
                    <ul class="nav navbar-right panel_toolbox">
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <br />
                    <form class="form-horizontal form-label-left input_mask" method="post">
                        <div class="form-group row">
                            <div class="col-md-4 col-sm-6">
                                <div class="input-group has-feedback">
                                    <input type="text" id="Txtfunc"  class="form-control" data-toggle="tooltip" data-placement="top" title="Procurar funcionario" placeholder="Nº de agente ou nome do func.">
                                    <span class="input-group-btn">
                                        <button type="button" id="btnFind" data-placement="top" title="Procurar funcionario" class="btn btn-primary"><span class="fa fa-search" aria-hidden="true"></span></button>
                                    </span>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-6">
                                <div class="input-group has-feedback">
                                    <input type="text" class="form-control has-feedback-left" name="PriNome" id="inputSuccess2" placeholder="Primeiro nome" required>
                                    <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-6">
                                <div class="input-group has-feedback">
                                    <input type="text" class="form-control" name="UltiNome" id="inputSuccess3" placeholder="Ultimo nome" required>
                                    <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-6">
                                <div class=" input-group has-feedback">
                                    <input type="email" name="Email" class="form-control has-feedback-left" id="inputSuccess4" placeholder="Email" required>
                                    <span class="fa fa-envelope form-control-feedback left" aria-hidden="true"></span>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-6">
                                <div class=" input-group has-feedback">
                                    <input type="tel" class="form-control Telefone" id="inputSuccess5" name="Telf" placeholder="Telefone" data-mask="999 999 999" required>
                                    <span class="fa fa-phone form-control-feedback right" aria-hidden="true"></span>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-6">
                                <div class="input-group has-feedback">
                                    <select id="heard" name="Categoria" class="form-control" data-toggle="tooltip" data-placement="top" title="Nível de acesso" required>
                                        <optgroup label="Seleciona a Categoria">
                                            <?php

                                            while ($resultRow = $dados->fetch(PDO::FETCH_ASSOC)) {
                                            ?>
                                                <option value="<?php echo $resultRow['idniveacesso'] ?>"><?php echo $resultRow['tipo'] ?></option>
                                            <?php
                                            }
                                            ?>
                                        </optgroup>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-6">
                                <div class=" input-group has-feedback">
                                    <select id="heard" name="Genero" class="form-control" required>
                                        <option value="">Genero</option>
                                        <option value="M">Masculino</option>
                                        <option value="F">Femenino</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="ln_solid"></div>
                        <div class="form-group row">
                            <div class="col-md-9 col-sm-9 ">
                                <div class=" offset-md-3">
                                    <button type="submit" name="SendcadUsuario" value="Cadastrou" class="btn btn-primary"><i class="fas fa-check-circle"></i>Cadastrar</button>
                                    <button type="button" class="btn btn-success" onclick="history.back()"><i class="fas fa-arrow-left"></i>Voltar</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Large modal -->

<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Selecionar funcionario</h4>
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>

        </div>
    </div>
</div>

<?php
include('layout/footer.php');
?>