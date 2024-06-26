<?php
include('layout/header.php');
include('layout/sidebar.php');
include('layout/navbar.php');
include('../../controllers/controllerCadDiscProf.php');
include('../../controllers/controllerGet.php');
?>
<div class="right_col" role="main">
    <div class="page-title">
        <div class="title_left">
            <h3>Professores/Disciplina <?php ?></h3>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12 col-sm-12 ">
            <div class="x_panel">
                <div class="x_title">
                    <h2 id="">Cadastrar <small>Professores/Disciplina</small></h2>
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
                                        <label for="Professor">*Professor</label>
                                        <select class="form-control" id="Professor" name="Professor" required>
                                            <?php
                                            while ($prof = $professor->fetch(PDO::FETCH_ASSOC)) {
                                                ?>
                                                <option value="<?php echo $prof['idprofessor'] ?>"><?php echo $prof['nome']; ?></option>
                                                <?php
                                            }
                                            ?>

                                        </select>
                                    </div> 
                                    <div class="col-md-3 col-sm-6 mb-3 mt-2"> 
                                        <label for="Disciplina">*Disciplina</label>
                                        <select class="form-control" id="Discipina" name="Disciplina" required>
                                            <?php
                                            while ($disc = $disciplina->fetch(PDO::FETCH_ASSOC)) {
                                                ?>
                                                <option value="<?php echo $disc['iddisc'] ?>"><?php echo$disc['codigo'] . " - " . $disc['disciplina']; ?></option>
                                                <?php
                                            }
                                            ?>

                                        </select>
                                    </div> 
                                    <div class="col-md-3 col-sm-6 mb-3 mt-4">
                                        <label for="CadDisciplina">&nbsp&nbsp&nbsp</label>
                                        <button type="submit" name="CadDiscProf" value="Cadastrou" class="btn btn-primary mt-2"><i class="fas fa-check-circle"></i>Cadastrar</button>                                    
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