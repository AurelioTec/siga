<?php
include('layout/header.php');
include('layout/sidebar.php');
include('layout/navbar.php');
include('../../controllers/controllerCadNotas.php');
include('../../controllers/controllerGet.php');   

?>
<div class="right_col" role="main">
    <div class="page-title">
        <div class="title_left">
            <h3>Notas <?php ?></h3>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12 col-sm-12 ">
            <div class="x_panel">
                <div class="x_title">
                    <h2 id="listaAluno">Lançar <small>notas</small></h2>
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
                                        <select class="form-control" id="anoletivo" name="AnoLectivo" required>
                                            <?php
                                            while ($anoLet = $anolectivo->fetch(PDO::FETCH_ASSOC)) {
                                                ?>
                                                <option value="<?php echo $anoLet['anoletivo'] ?>"><?php echo $anoLet['anoletivo']; ?></option>
                                                <?php
                                            }
                                            ?>

                                        </select>
                                    </div>
                                    <div class="col-md-4 col-sm-6 mb-3">
                                        <label for="trimestre">*trimestre</label>
                                        <select class="form-control" id="trimestre" name="Trimestre" required>
                                            <option value="1">1º-Trimestre</option>
                                            <option value="2">2º-Trimestre</option>
                                            <option value="3">3º-Trimestre</option>
                                        </select>
                                    </div>

                                </div>
                            </div>
                            <hr>
                            <div class="clearfix"></div> 
                            <div class="animated flipInY col-lg-12 col-md-12 col-sm-6">
                                <div class="tile-stats">
                                    <div class="col-md-4 col-sm-6 mb-3">
                                        <label for="Nome">*Nome do Auno</label>
                                        <select class="form-control" id="NomeAl" name="Nome" required>

                                        </select>
                                    </div>
                                     <div class="col-md-4 col-sm-6 mb-3">
                                        <label for="Professor">*Professor</label>
                                        <select class="form-control" id="Professor" name="Professor" required>
                                            <?php
                                            while ($prof =$professor->fetch(PDO::FETCH_ASSOC)) {
                                                ?>
                                                <option value="<?php echo $prof['idprofessor'] ?>"><?php echo $prof['nome']; ?></option>
                                                <?php
                                            }
                                            ?>

                                        </select>
                                    </div>
                                    <div class="col-md-4 col-sm-6 mb-3">
                                        <label for="Disciplina">*Disciplina</label>
                                        <select class="form-control" id="Disiplina" name="Disciplina" required>


                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="clearfix"></div> 
                            <div class="animated flipInY col-lg-12 col-md-12 col-sm-6">
                                <div class="tile-stats">
                                    <div class="col-md-5 col-sm-6 mb-3">
                                        <label for="TipoNota">*Tipo de Nota</label>
                                        <select class="form-control" id="TipoNota" name="TipoNota" required>
                                            <option value="MAC">Média das Avalições Contínuas</option>
                                            <option value="NPP">Nota da Prova do Professor</option>
                                            <option value="NPT">Nota da Prova Trimestral</option>
                                            <option value="NER">Nota do Exame de Recurso</option>
                                            <option value="NEC">Nota do Exame Combinado</option>
                                            <option value="NEF">Nota do Exame Final</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4 col-sm-6 mb-3">
                                        <label for="Nota">*Nota</label>
                                        <input type="text" id="Nota" name="Nota" class="form-control" required>
                                    </div>
                                    <div class="col-md-4 col-sm-6 mb-3">
                                        <input type="hidden" id="iduser" name="id" class="form-control" value="<?php echo $id; ?>"required>
                                    </div>
                                    <div class="col-md-3 col-sm-6 mt-2">
                                        <label for="LamcarNota"></label>
                                        <input type="submit" class="form-control btn btn-outline-success" name="LancarNota" value="Lançar">
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