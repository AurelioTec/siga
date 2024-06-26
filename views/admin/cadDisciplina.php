<?php
include('layout/header.php');
include('layout/sidebar.php');
include('layout/navbar.php');
include('../../controllers/controllerMatriAluno.php');
include('../../controllers/controllerGet.php');
?>
<div class="right_col" role="main">
    <div class="page-title">
        <div class="title_left">
            <h3>Discipinas <?php ?></h3>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12 col-sm-12 ">
            <div class="x_panel">
                <div class="x_title">
                    <h2 id="">Cadastrar <small>disciplina</small></h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <br />
                    <form id="demo-form" data-parsley-validate  method="post">
                        <div class="form-row">
                            <!-- <div class="col-md-12 col-sm-6 mb-3">
                                
                            </div> --> 
                            <div class="animated flipInY col-lg-12 col-md-12 col-sm-6">
                                <div class="tile-stats">
                                    <div class="col-md-3 col-sm-6 mb-3 mt-2">
                                        <label for="Codigo">*Código</label>
                                        <input type="text" name="Codigo" class="form-control" id="inputSuccess4" placeholder="Código" required>
                                    </div>    
                                    <div class="col-md-3 col-sm-6 mb-3 mt-2">
                                        <label for="Periodo">*Disciplina</label>
                                        <input type="text" name="Disciplina" class="form-control" id="inputSuccess4" placeholder="Disciplina" required>
                                    </div> 
                                    <div class="col-md-3 col-sm-6 mb-3 mt-2">
                                        <label for="Peso">*Peso</label>
                                        <input type="text" name="Peso" class="form-control" id="inputSuccess4" placeholder="peso" required>
                                    </div> 
                                    <div class="col-md-3 col-sm-6 mb-3 mt-4">
                                        <label for="CadDisciplina">&nbsp&nbsp&nbsp</label>
                                        <button type="submit" name="CadDisciplina" value="Cadastrou" class="btn btn-primary mt-2"><i class="fas fa-check-circle"></i>Cadastrar</button>                                    
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