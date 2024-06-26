<?php
include('layout/header.php');
include('layout/sidebar.php');
include('layout/navbar.php');
include('../../controllers/controllerEditUser.php');
include('../../controllers/controllerGet.php');

$getid = filter_input(INPUT_GET, 'gs3af', FILTER_DEFAULT);
if (!empty($getid)){
$iddecod = desmascararID($getid);
$sqlReturnUser = "SELECT * FROM vwlogin WHERE idusuario=:idusuario LIMIT 1";
$stmtUser = $conectar->prepare($sqlReturnUser);
$stmtUser->bindParam(":idusuario", $iddecod);
$stmtUser->execute();
if (($stmtUser) AND ($stmtUser->rowCount() > 0)) {
    $retorno = $stmtUser->fetch(PDO::FETCH_ASSOC);
    extract($retorno);
}
}else{
    header("Location: ../../session/sair.php");    
}
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
                    <h2>Editar utilizador</h2>
                    <ul class="nav navbar-right panel_toolbox">
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <br />
                    <form class="form-label-left input_mask" method="POST" enctype="multipart/form-data">

                        <div class="col-md-4 col-sm-6  form-group has-feedback">
                            <input title="Primeiro nome" type="text" value="<?php
                            $nomeSep = explode(' ', $nome, 2);
                            print_r($nomeSep[0]);
                            ?>" class="form-control has-feedback-left" name="PriNome" id="inputSuccess2" placeholder="Primeiro nome" required>
                            <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                        </div>
                        <input type="hidden"  name="idEdit" value="<?php echo $getid; ?>"> 
                        <input type="hidden"  name="fotoAntiga" value="<?php echo $imagem; ?>"> 
                        <div class="col-md-4 col-sm-6  form-group has-feedback ">
                            <input title="Ultimo nome" type="text" value="<?php print_r($nomeSep[1]); ?>" class="form-control" name="UltiNome" id="inputSuccess3" placeholder="Ultimo nome" required>
                            <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                        </div>

                        <div class="col-md-4 col-sm-6  form-group has-feedback">
                            <input title="Email" type="email" value="<?php echo $email; ?>" name="Email" class="form-control has-feedback-left" id="inputSuccess4" placeholder="Email" required>
                            <span class="fa fa-envelope form-control-feedback left" aria-hidden="true"></span>
                        </div>

                        <div class="col-md-4 col-sm-6  form-group has-feedback">
                            <input title="Telefone" type="tel" value="<?php echo $telf; ?>" class="form-control telf" id="inputSuccess5" name="Telf" placeholder="Telefone" data-mask="999 999 999" required>
                            <span class="fa fa-phone form-control-feedback right" aria-hidden="true"></span>
                        </div>
                        <div class="col-md-4 col-sm-6  form-group has-feedback">
                            <select title="Categoria" id="heard" name="Categoria" class="form-control" placeholder="Categoria" required>
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
                        <div class="col-md-4 col-sm-6  form-group has-feedback">
                            <select title="Genero" id="heard" name="Genero" class="form-control" required>
                                <option value="M">Masculino</option>
                                <option value="F">Femenino</option>
                            </select>
                        </div>
                        <div class="col-md-8 col-sm-6  form-group has-feedback d-flex justify-content-center align-items-center">
                            <input title="Clicar para lterar foto" type="file" accept=".jpeg,.jpg, .png" id="inputfotoedit" class="form-control" name="Foto">
                        </div>
                        <div class=" col-md-4 col-sm-6 d-flex justify-content-center align-items-center">
                            <img height="64" width="64" src="<?php
                            switch ($imagem) {
                                case 'male.png':
                                    echo "../assets/build/images/user/default/$imagem";
                                    break;
                                case 'famale.png':
                                    echo "../assets/build/images/user/default/$imagem";
                                    break;
                                default:
                                    echo "../assets/build/images/user/$idusuario/$imagem";
                                    break;
                            }
                            ?>" class="img-fluid" alt="Foto"  id="picturaFoto"/>
                        </div>
                        <div class="clearfix"></div>
                        <div class="ln_solid"></div>
                        <div class="form-group row">
                            <div class="col-md-9 col-sm-9  offset-md-3">
                                <button type="submit" name="editUsuario" value="Editar" class="btn btn-primary"><i class="fas fa-check-circle"></i>Guardar</button>
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