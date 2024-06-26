<?php
include('layout/header.php');
include('layout/sidebar.php');
include('layout/navbar.php');
include('../../controllers/controllerGet.php');
?>
<div class="right_col" role="main">
    <div class="page-title">
        <div class="title_left">
            <h3>Turmas</h3>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12 col-sm-12 ">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Turmas cadastradas</h2>
                    <ul class="nav navbar-right panel_toolbox">
                    <li><a class="btn btn-success" href="cadturmas.php" title="Adicionar item a lista"><i class="fa fa-plus"></i></a>
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
                                            <td>Codigo</td>
                                            <td>Classe</td>
                                            <td>Turma</td>
                                            <td>Periodo</td>
                                            <td>Sala</td>
                                            <td>Ano lectivo</td>
                                            <td>Ações</td>
                                        </tr>
                                    </thead>
                                    <?php
                                    include('../../controllers/controllerListTurmas.php');
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


<!-- Model Matricular -->
<div class="modal fade " id="matriculaModal" data-bs-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="matriculaModal">
    <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Matricular aluno</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <div class="row">
                        <div class="row text-dark">
                            <div class="col-md-4 col-sm-6 ">
                                <h4>Num.registro: <span id="idaluno"></span></h4>
                            </div>
                            <div class="col-md-8 col-sm-6 ">
                                <h4>Nome do Aluno: <span id="nomeAluno"></span></h4>
                            </div>
                            <div class="col-md-6 col-sm-6 ">
                                <h4>Data de nascimento: <span id="nascimento"></span></h4>
                            </div>
                            <div class="col-md-6 col-sm-96 ">
                                <h4>Num do Documento: <span id="docNum"></span></h4>
                            </div>
                            <div class="col-md-6 col-sm-6 ">
                                <h4>Genero: <span id="genero"></span></h4>
                            </div>
                            <div class="col-md-6 col-sm-6 ">
                                <h4>idade: <span id="idade"></span></h4>
                            </div>
                        </div>
                        <div class="x_content">
                            <hr>
                            <br />
                                                 
                            <div class="col-md-6 col-sm-6 left-margin">
                                <form class="form-horizontal form-label-left" id="formMatricula" method="post" enctype="multipart/form-data">
                                
                            </form>
                           </div>
                        </div>
                    </div>
                </div>
            </div>
           
        </div>
    </div>
</div>
<!-- Fim Modal Matricular-->

<?php
include('layout/footer.php');
?>