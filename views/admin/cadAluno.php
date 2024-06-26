<?php
include('layout/header.php');
include('layout/sidebar.php');
include('layout/navbar.php');
include('../../controllers/controllerCadAluno.php');
include('../../controllers/controllerGet.php');
?>
<div class="right_col" role="main">
    <div class="page-title">
        <div class="title_left">
            <h3>Inscrição</h3>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-6 col-lg-6 col-xl-12 col-sm-12 ">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Dados Pessoais</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <br />
                    <form class="form-label-left input_mask" method="post" enctype="multipart/form-data">

                        <div class="col-md-6 col-sm-6  form-group has-feedback">
                            <input type="text" class="form-control has-feedback-left" name="NomeAluno" id="inputSuccess2" placeholder="Nome completo" required>
                            <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                        </div>
                        <div class="col-md-3 col-sm-6  form-group has-feedback">
                            <input type="date" class="form-control" name="DataNasc" id="inputSuccess3" title="Data de nascimento" placeholder="Data nascimento" required>
                        </div>
                        <div class="col-md-3 col-sm-6  form-group has-feedback">
                            <select id="heard" name="Genero" class="form-control" title="Genero" required>
                                <optgroup label="Seleciona o genero">
                                    <option value="M">Masculino</option>
                                    <option value="F">Femenino</option>
                                </optgroup>
                            </select>
                        </div>
                        <div class="col-md-4 col-sm-6  form-group has-feedback">
                            <select id="heard" name="ProNasc" class="form-control Provincia" title="Província de nascimento" required>
                                <optgroup label="Seleciona a província">
                                    <?php
                                    while ($resultRow = $provincia->fetch(PDO::FETCH_ASSOC)) {
                                    ?>
                                        <option value="<?php echo $resultRow['idprovincia'] ?>"><?php echo $resultRow['proabreviacao'] . "- " . $resultRow['pronome'] ?></option>
                                    <?php
                                    }
                                    ?>
                                </optgroup>
                            </select>
                        </div>
                        <div class="col-md-4 col-sm-6  form-group has-feedback">
                            <select id="heard" name="MuniNasc" class="form-control Municipio" title="Selecione o município" required>

                            </select>
                        </div>
                        <div class="col-md-4 col-sm-6  form-group has-feedback">
                            <select id="heard" name="TipoDoc" class="form-control Documento" required>
                                <option value="cp">Cédula pessol</option>
                                <option value="ps">Passaporte</option>
                                <option value="bi">Bilhete de identidade</option>
                                <option value="an">Assento de nascimento</option>
                            </select>
                        </div>
                        <div class="col-md-3 col-sm-6  form-group has-feedback">
                            <input type="text" name="DocNum" class="form-control has-feedback-left NumDoc" id="inputSuccess4" placeholder="Número do documento" required>
                            <span class="fa fa-barcode form-control-feedback left" aria-hidden="true"></span>
                        </div>
                        <div class="col-md-3 col-sm-6  form-group has-feedback">
                            <input type="date" name="DataEmissao" class="form-control has-feedback-left datavaliade" id="inputSuccess5" title="Data de Emissão" placeholder="Data de Emissão" required>

                        </div>
                        <div class="col-md-6 col-sm-6  form-group has-feedback">
                            <input type="text" name="NomePai" class="form-control has-feedback-left" id="inputSuccess6" placeholder="Nome do pai" required>
                            <span class="fa fa-male form-control-feedback left" aria-hidden="true"></span>
                        </div>
                        <div class="col-md-6 col-sm-6  form-group has-feedback">
                            <input type="text" name="NomeMae" class="form-control has-feedback-left" id="inputSuccess7" placeholder="Nome da mãe" required>
                            <span class="fa fa-female form-control-feedback left" aria-hidden="true"></span>
                        </div>
                        <div class="col-md-3 col-sm-6  form-group has-feedback">
                            <select id="heard" name="Cidade" class="form-control" title="Cidade" required>
                                <?php
                                while ($linha = $cidade->fetch(PDO::FETCH_ASSOC)) {
                                ?>
                                    <option value="<?php echo $linha['muninome']; ?>"><?php echo $linha['muninome']; ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="col-md-3 col-sm-6  form-group has-feedback">
                            <input type="text" name="Bairro" class="form-control has-feedback-left" id="inputSuccess7" placeholder="Bairro" required>
                            <span class="fa fa-dot-circle-o form-control-feedback left" aria-hidden="true"></span>
                        </div>
                        <div class="col-md-4 col-sm-6  form-group has-feedback">
                            <input type="text" name="Rua" class="form-control has-feedback-left" id="inputSuccess7" placeholder="Rua" required>
                            <span class="fa fa-crosshairs form-control-feedback left" aria-hidden="true"></span>
                        </div>
                        <div class="col-md-4 col-sm-6  form-group has-feedback">
                            <input type="tel" class="form-control Telefone" id="inputSuccess6" name="Telf" placeholder="Telefone" data-mask="999 999 999" required>
                            <span class="fa fa-phone form-control-feedback right" aria-hidden="true"></span>
                        </div>
                        <div class="col-md-4 col-sm-6  form-group has-feedback">
                            <input type="file" accept="image/png,image/jpeg" class="form-control" id="inputSuccess6" name="image" placeholder="Carregar Foto" title="Carregar foto" required>
                        </div>
                        <div class="clearfix"></div>
                        <div class="x_title">
                            <h2>Dados Escolar</h2>
                            <div class="clearfix"></div>
                        </div>
                        <div class="col-md-4 col-sm-6  form-group has-feedback">
                            <input type="text" name="Proviencia" class="form-control has-feedback-left" id="inputSuccess7" placeholder="Escoola de Proveniencia" required>
                            <span class="fa fa-house-user form-control-feedback left" aria-hidden="true"></span>
                        </div>
                        <div class="col-md-2 col-sm-6 mb-3">
                            <select class="form-control" name="Periodo" title="Periodo" required>
                                <option value="Manhã">Manhã</option>
                                <option value="Tarde">Tarde</option>
                                <option value="Noite">Noite</option>
                            </select>
                        </div>
                        <div class="col-md-2 col-sm-6 mb-3">
                            <select class="form-control" name="Classe" title="Classe" required>
                                <option value="">Classe</option>
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
                            <select class="form-control" name="Lestrang" id="lestrang" title="Língua Estrangeira" required>
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
                            <input type="text" name="NomeEnc" id="nomeenc" class="form-control has-feedback-left" required placeholder="Nome do encarregado">
                            <span class="fa fa-user-nurse form-control-feedback left" aria-hidden="true"></span>
                        </div>
                        <div class="col-md-4 col-sm-6 mb-3">
                            <input type="text" name="EncTrabalho" id="nomeenc" class="form-control has-feedback-left" required placeholder="Local de Trabalho">
                            <span class="fa fa-house-user form-control-feedback left" aria-hidden="true"></span>
                        </div>
                        <div class="col-md-4 col-sm-6 mb-3">
                            <input type="tel" name="TelfEnc" id="telf" class="form-control has-feedback-left Telefone" placeholder="Telefone">
                            <span class="fa fa-phone form-control-feedback left" aria-hidden="true"></span>
                        </div>
                        <div class="col-md-12 col-sm-6  form-group has-feedback">
                            <textarea class="form-control" rows="3" name="Obs" placeholder="Observação" title="Observação"> </textarea>
                        </div>
                        <div class="clearfix"></div>
                        <div class="ln_solid"></div>
                        <div class="form-group row">
                            <div class="col-md-9 col-sm-9  offset-md-3">
                                <button type="submit" name="CadAluno" value="Cadastrou" class="btn btn-primary"><i class="fas fa-check-circle"></i>Cadastrar</button>
                                <button type="button" class="btn btn-success" onclick="history.back()"><i class="fas fa-arrow-left"></i>Voltar</button>
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