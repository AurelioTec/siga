<?php
require $_SERVER['DOCUMENT_ROOT'] . "/siga/session/conexao.php";
include('layout/header.php');
include('layout/sidebar.php');
include('layout/navbar.php');

$getid = filter_input(INPUT_GET, 'a2shs', FILTER_DEFAULT);
if (!empty($getid)) {
    $iddecod = desmascararID($getid);
    $sqlReturnUser = "SELECT * FROM vwlogin WHERE idusuario=:idusuario LIMIT 1";
    $stmtUser = $conectar->prepare($sqlReturnUser);
    $stmtUser->bindParam(":idusuario", $iddecod);
    $stmtUser->execute();
    if (($stmtUser) AND ($stmtUser->rowCount() > 0)) {
        $retorno = $stmtUser->fetch(PDO::FETCH_ASSOC);
        extract($retorno);
    }
    $sqlHistorico = "SELECT * FROM vwhistorico WHERE idusuario=:idusuario";
    $stmtHistorico = $conectar->prepare($sqlHistorico);
    $stmtHistorico->bindParam(":idusuario", $iddecod);
    $stmtHistorico->execute();
} else {
    header("Location: ../../session/sair.php");
}
?>

<div class="right_col" role="main">
    <div class="page-title">
        <div class="title_left">
            <h3>Perfil</h3>

        </div>
    </div>
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12 col-sm-12 ">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Perfil do aluno </h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li>
                            <a class="btn btn-success " title='Alterar senha' data-toggle="modal" data-target=".bs-example-modal-sm"><i class='fa fa-key'></i></a>
                        </li>
                        <li><a class="btn btn-info" href="editUsuario.php?id=<?php
                            $num = mascararID($idusuario);
                            echo $num;
                            ?>" title="Editar dados do utilizador"><i class="fa fa-pencil-alt"></i></a>
                        </li>
                        <li><a class='btn btn-warning' title='Imprimir ficha do utilizador' id='Imprimir'><i class='fa fa-print'></i></a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="col-md-3 col-sm-3  profile_left">
                        <div class="profile_img">
                            <div id="crop-avatar">
                                <!-- Current avatar -->
                                <img src="<?php
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
                                ?>" 
                                     alt="foto" class="img-circle avatar-view" height="124" width="120"/>
                            </div>
                        </div>
                        <h3><?php echo $nome; ?></h3>

                        <ul class="list-unstyled user_data">
                            <li>
                                <i class="fa fa-user-secret user-profile-icon"></i><?php echo " " . $usuario ?>
                            </li>
                            <li><i class="fa fa-user-graduate user-profile-icon"></i><?php echo " " . $categoria ?> 
                            </li>

                            <li>
                                <i class="fa fa-phone user-profile-icon"></i><?php echo " " . $telf ?>
                            </li>
                            <li>
                                <i class="fa fa-envelope user-profile-icon"></i><?php echo " " . $email ?>
                            </li>
                        </ul>

                        <!-- start skills -->
                        <h4>Função</h4>
                        <ul class="list-unstyled user_data">
                            <li>
                                <p>Coordenar</p>
                                <div class="progress progress_sm">
                                    <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="50"></div>
                                </div>
                            </li>
                            <li>
                                <p>Orientar</p>
                                <div class="progress progress_sm">
                                    <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="70"></div>
                                </div>
                            </li>
                            <li>
                                <p>Atendimento ao publico</p>
                                <div class="progress progress_sm">
                                    <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="30"></div>
                                </div>
                            </li>
                            <li>
                                <p>Acesso ao Sistema</p>
                                <div class="progress progress_sm">
                                    <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="50"></div>
                                </div>
                            </li>
                        </ul>
                        <!-- end of skills -->

                    </div>
                    <div class="col-md-9 col-sm-9 ">

                        <div class="" role="tabpanel" data-example-id="togglable-tabs">
                            <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                                <li role="presentation" class="Active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Histórico </a>
                                </li>

                                </li> 
                            </ul>
                            <div id="myTabContent" class="tab-content">
                                <div role="tabpanel" class="tab-pane active " id="tab_content1" aria-labelledby="home-tab">
                                    <!-- start recent activity -->
                                    <ul class="messages">
                                        <?php
                                        if (($stmtHistorico) AND ($stmtHistorico->rowCount() > 0)) {
                                            while ($historico = $stmtHistorico->fetch(PDO::FETCH_ASSOC)) {
                                                extract($historico);
                                                ?>
                                                <li>
                                                    <img src="<?php
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
                                                    ?>" class="avatar" alt="Avatar">

                                                    <div class="message_date">
                                                        <h3 class="date text-info"><?php echo $data; ?></h3>
                                                    </div>
                                                    <div class="message_wrapper">
                                                        <h4 class="heading"><?php echo $titulo; ?></h4>
                                                        <blockquote class="message"><?php echo $descricao; ?></blockquote>
                                                        <br />
                                                     <!--    <p class="url">
                                                            <span class="fs1 text-info" aria-hidden="true" data-icon=""></span>
                                                            <a href="#"><i class="fa fa-paperclip"></i> User Acceptance Test.doc </a>
                                                        </p>-->
                                                    </div>
                                                </li> <?php
                                            }
                                        }
                                        ?>
                                    </ul>
                                    <!-- end recent activity -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<!-- Small modal -->
<div class="modal bs-example-modal-sm "   tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">

            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel2">Alterar Senha</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="" action="" method="post" id="modalForm" novalidate>
                    <input type="hidden" id="idUser" value="<?php
                            $num = mascararID($idusuario);
                            echo $num;
                            ?>">
                    <div class="field item form-group">
                        <label class="col-form-label col-md-3 col-sm-6  label-align">Nova senha<span class="required">*</span></label>
                        <div class="col-md-9 col-sm-6">
                            <input class="form-control" type="password" id="password1"  pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%^&*]).{8,}" title="Inserir uma senha com 8 caracteres mínimos incluindo uma letra maiúscula e uma minúscula, um número e um caractere único." required />
                            <span style="position: absolute;right:15px;top:7px;" onclick="hideshow()" >
                                <i id="slash" class="fa fa-eye-slash"></i>
                                <i id="eye" class="fa fa-eye"></i>
                            </span>
                        </div>
                    </div>
                    <div class="field item form-group">
                        <label class="col-form-label col-md-3 col-sm-6  label-align">Repetir senha<span class="required">*</span></label>
                        <div class="col-md-9 col-sm-6">
                            <input class="form-control" type="password" id="Senha2" data-validate-linked='password' required='required' /></div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-primary">Guardar Senha</button>
            </div>
            </form>
        </div>
    </div>
</div>
<!-- /modals -->





<?php
include('layout/footer.php');
?>