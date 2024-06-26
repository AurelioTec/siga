<?php
include('layout/header.php');
include('layout/sidebar.php');
include('layout/navbar.php');
include('../../controllers/controllerCadTurmas.php');
include('../../controllers/controllerGet.php');
?>
<div class="right_col" role="main">
    <div class="page-title">
        <div class="title_left">
            <h3>Turmas </h3>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12 col-sm-12 ">
            <div class="x_panel">
                <div class="x_title">
                    <h2 id="listaAluno">Cadastrar<small>turmas</small></h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <br />
                    <form id="demo-form" data-parsley-validate  method="post" enctype="multipart/form-data">
                        <div class="form-row">
                            <!-- <div class="col-md-12 col-sm-6 mb-3">
                                 
                            </div> --> 
                            <div class="animated flipInY col-lg-12 col-md-12 col-sm-6">
                                <div class="tile-stats">
                                    <div class="col-md-2 col-sm-6 mb-3">
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
                                    <div class="col-md-2 col-sm-6 mb-3">
                                        <label for="Codigo">Codigo da turma</label>
                                        <input type="text" name="Codigo" class="form-control has-feedback-left" id="inputSuccess6" placeholder="7AM" required>
                                    </div> 
                                    <div class="col-md-2 col-sm-6 mb-3">
                                        <label for="Desc">Descrição</label>
                                        <input type="text" name="Desc" class="form-control has-feedback-left" id="inputSuccess6" placeholder="A-Z" required>
                                    </div> 
                                    <div class="col-md-2 col-sm-6 mb-3">
                                        <label for="Periodo">*Período</label>
                                        <select class="form-control" id="periodo" name="Periodo" required>
                                            <option value="Manhã">Manhã</option>
                                            <option value="Tarde">Tarde</option>
                                            <option value="Noite">Noite</option>
                                        </select>
                                    </div> 
                                    <div class="col-md-2 col-sm-6 mb-3">
                                        <label for="Sala">*Sala</label>
                                        <select class="form-control " id="Sala" name="Sala" required>

                                        </select>
                                    </div>
                                    <div class="col-md-2 col-sm-6 mb-3">
                                       <label for="Ano Lectivo">*Ano lectivo</label>
                                        <select class="form-control " id="AnoLect" name="AnoLect" required>

                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="clearfix"></div> 
                            <div class="animated flipInY col-lg-12 col-md-12 col-sm-6">
                                <div class="tile-stats">
                                    <div class="col-md-3 col-sm-6 mt-2">
                                        <label for="Cadastrar"></label>
                                        <input type="submit" class="form-control btn btn-outline-success" name="Cadastrar" value="CadastrarTurma">
                                    </div>
                                    <!-- Modal configurar Nº de salas
                                    <div class="col-md-3 col-sm-6 mt-2">
                                        <label for="ConfigSala"></label>
                                        <button type="button" class="form-control btn btn-warning" name="ConfigSala" data-toggle="modal" data-target="#exampleModal" > Config Total de Salas</button>
                                    </div>
                                    -->
                                </div>
                            </div>
                        </div> 
                    </form>
                </div>
            </div>
        </div>           
    </div>
</div>

<!-- Modal configurar Nº de salas-->

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Configurar o Nº Total de Salas</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="TotalSala" class="col-form-label">Nº total de salas</label>
                        <input type="text" class="form-control" id="TotalSala">
                    </div>
                    <div class="form-group">
                        <label for="AnoLectivo" class="col-form-label">Ano lectivo</label>
                        <input type="text" class="form-control" id="AnoLectivo">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-warning" data-dismiss="modal">Cancelar</button>
                <button type="button" id="btnSalvar" class="btn btn-success">Salvar</button>
            </div>
        </div>
    </div>
</div>




<?php
include('layout/footer.php');
?>