<?php
include('layout/header.php');
include('layout/sidebar.php');
include('layout/navbar.php');
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
                    <h2>Lista de utilizadores</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="btn btn-success" href="cadUsuario.php" title="Adicionar item a lista"><i class="fa fa-plus"></i></a>
                        </li>
                        <li><a class='btn btn-warning' title='Imprimir a lista' id='Imprimir'><i class='fa fa-print'></i></a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card-box table-responsive">
                                <table id="tableUser" class="table table-striped table-bordered" style="width:100%">
                                    <thead>
                                        <tr>
                                            <td>#</td>
                                            <td>Nome completo</td>
                                            <td>Utilizador</td>
                                            <td>Email</td>
                                            <td>Categoria</td>
                                            <td>Telefone</td>
                                            <td>Foto</td>
                                            <td>Ações</td>
                                        </tr>
                                    </thead>
                                    <?php
                                    include('../../controllers/controllerListUsuario.php');
                                    ?>
                                    <tbody>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
include('layout/footer.php');
?>