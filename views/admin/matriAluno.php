<?php
include('layout/header.php');
include('layout/sidebar.php');
include('layout/navbar.php');
include('../../controllers/controllerMatriAluno.php');
include('../../controllers/controllerGet.php');
include('../../controllers/controllerGetAlunoInsc.php');

?>

<div class="right_col" role="main">
    <div class="page-title">
        <div class="title_left">
            <h3>Matrículas <?php ?></h3>

        </div>
    </div>
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12 col-sm-12 ">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Matricular <small>aluno </small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <br />
                    <form id="demo-form" data-parsley-validate  method="post" enctype="multipart/form-data">
                        <div class="form-row">
                            <!-- <div class="col-md-12 col-sm-6 mb-3">
                                
                            </div> -->
                            <div class="col-md-4 col-sm-6 mb-3">
                                <label for="IdAluno" >Id aluno: <span id="IdAluno"></span> </label>                               
                                <input type="text" name="IdAluno" hidden id="idaluno" class="form-control" value="<?php $idinsc=$returnAluno['idinscricao'];echo $idinsc; ?>" required placeholder="Id do aluno">
                            </div>
                            <div class="col-md-4 col-sm-6 mb-3">
                                <label for="NomeEnc">Nome do aluno</label>
                                <input type="text" name="NomeAluno"  value="<?php $nome=$returnAluno['nome'];echo $nome; ?>" disabled id="nomeAluno" class="form-control"  placeholder="Nome do aluno">
                            </div>
                            <div class="col-md-4 col-sm-6 mb-3">
                                <label for="NomeEnc">Data de nascimento</label>

                                <input type="text" name="Nasc" value="<?php echo $returnAluno['datanasc']; ?>" disabled id="nascimento" class="form-control"  placeholder="Data de Nascimento">
                            </div>
                            <div class="col-md-4 col-sm-6 mb-3">
                                <label for="DocNum">Nº do documento</label>

                                <input type="text" name="DocNum" value="<?php echo $returnAluno['numero']; ?>" disabled id="docNum" class="form-control"  placeholder="Nº do documento">
                            </div>
                            <div class="col-md-4 col-sm-6 mb-3">
                                <label for="Genero">Genero</label>

                                <input type="text" name="Genero" value="<?php echo $returnAluno['genero']; ?>" disabled id="genero" class="form-control"  placeholder="Genero">
                            </div>
                            <div class="col-md-4 col-sm-6 mb-3">
                                <label for="Idade">Idade</label>
                                <input type="text" name="Idade" value="<?php 
                                $dataN = new DateTime($returnAluno['datanasc']);
                                $dataAtual = new DateTime();
                                $idade = $dataAtual->diff($dataN);echo $idade->y; 
                                ?> " disabled id="idade" class="form-control" required placeholder="Idade"> 
                            </div>
                            <div class="col-md-4 col-sm-6 mb-3">
                                <label for="Classe">Classe</label>
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
                            <div class="col-md-4 col-sm-6 mb-3">
                                <label for="Periodo">Período</label>
                                <select class="form-control" id="periodo" name="Periodo" required>
                                    <option value="Manhã">Manhã</option>
                                    <option value="Tarde">Tarde</option>
                                    <option value="Noite">Noite</option>
                                </select>
                            </div> 
                            <div class="col-md-4 col-sm-6 mb-3">
                                <label for="Turma">Turma</label>
                                <select class="form-control" id="turma" name="Turma" required>

                                </select>
                            </div>
                            <div class="col-md-4 col-sm-6 mb-3">
                                <label for="Lestrang">L. Estrangeira</label>
                                <select class="form-control" name="Lestrang" id="lestrang" required>
                                    <?php
                                    while ($les = $lestrangeira->fetch(PDO::FETCH_ASSOC)) {
                                        ?>
                                        <option value="<?php echo $les['idlestrangeira'] ?>"><?php echo $les['codigo'] . '-' . $les['lingua']; ?></option>
    <?php
}
?>

                                </select>
                            </div>
                            <div class="col-md-4 col-sm-6 mb-3">
                                <label for="NomeEnc">Encarregado</label>

                                <input type="text" name="NomeEnc" id="nomeenc" class="form-control" required placeholder="Nome do encarregado">
                            </div>
                            <div class="col-md-4 col-sm-6 mb-3">
                                <label for="Telf">Telefone</label>
                                <input type="tel" name="Telf" id="telf" class="form-control Telefone">
                            </div>
                            <div class="col-md-6 col-sm-6 mb-3">
                                <label for="Tipo">Tipo de matrícula</label>
                                <select class="form-control" id="tipo"  name="Tipo" required>
                                    <option value="Novo">Aluno novo</option>
                                    <option value="Confirmação">Confirmação</option>
                                    <option value="Repetente">Aluno repetente</option>
                                    <option value="Transferido">Aluno transferido</option>
                                </select>
                            </div> 
                            <div class="col-md-6 col-sm-6 mb-3">
                                <label class="Documento">Carregar documento</label>
                                <input type="file" id="documento" name="Documento" accept=".pdf" class="form-control" required>
                            </div>
                        </div> 
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success"  name="SendMatricula" value="Matricular">Matricular</button>
                            <button type="button" onclick="history.back()" class="btn btn-secondary">Voltar</button>
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