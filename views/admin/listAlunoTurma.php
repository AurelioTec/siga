<?php
include('layout/header.php');
include('layout/sidebar.php');
include('layout/navbar.php');
include('../../controllers/controllerMatriAluno.php');
//include('../../controllers/controllerRelAlunoTurma.php');
include('../../controllers/controllerGet.php');
?>
<div class="right_col" role="main">
    <div class="page-title">
        <div class="title_left">
            <h3>RELATÓRIO<?php ?></h3>

        </div>
    </div>
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12 col-sm-12 ">
            <div class="x_panel">
                <div class="x_title">
                    <h2 id="listaAluno"> Lista de aluno </h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <br />
                    <form id="demo-form" data-parsley-validate method="POST" target="_blank" action="../../controllers/controllerRelAlunoTurma.php" enctype="multipart/form-data">
                        <div class="form-row">
                            <!-- <div class="col-md-12 col-sm-6 mb-3">
                                
                            </div> --> 
                            <div class="col-md-3 col-sm-6 mb-3">
                                <label for="Classe">*Classe</label>
                                <select class="form-control" id="classe" name="Classe" required>
                                    <?php
                                    while ($res = $classe->fetch(PDO::FETCH_ASSOC)) {
                                        ?>
                                        <option value="<?php echo $res['idclasses'] ?>"><?php echo $res['classe']; ?></option>
                                        <?php
                                    }
                                    ?>
                                </select>
                            </div>    
                            <div class="col-md-3 col-sm-6 mb-3">
                                <label for="Periodo">*Período</label>
                                <select class="form-control" id="periodo" name="Periodo" required>
                                    <option value="Manhã">Manhã</option>
                                    <option value="Tarde">Tarde</option>
                                    <option value="Noite">Noite</option>
                                </select>
                            </div> 
                            <div class="col-md-2 col-sm-6 mb-3">
                                <label for="Turma">*Turma</label>
                                <select class="form-control" id="turma" name="Turma" required>

                                </select>
                            </div>
                            <div class="col-md-2 col-sm-6 mb-3">
                                <label for="Ano lectivo">*Ano lectivo</label>
                                <select class="form-control" id="anoletivo" name="AnoLectiv" required>
                                    <?php
                                    while ($anoLet = $anolectivo->fetch(PDO::FETCH_ASSOC)) {
                                        ?>
                                        <option value="<?php echo $anoLet['anoletivo'] ?>"><?php echo $anoLet['anoletivo']; ?></option>
                                        <?php
                                    }
                                    ?>

                                </select>
                            </div>
                            <div class="col-md-2 col-sm-6 mb-3">
                                <label for="SendListar">&nbsp&nbsp&nbsp</label>
                                <button type="button" class="btn btn-outline-primary form-control" id="Listar" name="SendListar" value="Listar">
                                    <i class="fa fa-search"></i> Listar
                                </button>
                            </div>
                        </div> 
                        <div class="x_content">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="card-box table-responsive">
                                        <table id="tableAlunoTurma" class="table table-striped table-bordered" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <td>Nº Ord</td>
                                                    <td>Nº Matricula</td>
                                                    <td>Nme completo</td>
                                                    <td>Genero</td>
                                                    <td>Obs</td>
                                                </tr>
                                            </thead>
                                            <tbody>

                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-success">Geral relatório</button>
                                        <button type="button" onclick="history.back()" class="btn btn-secondary">Voltar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>           
    </div>
    </div> 

    <?php
    include('layout/footer.php');
    ?>