<?php
require $_SERVER['DOCUMENT_ROOT'] . "/siga/session/conexao.php";
include('layout/header.php');
include('layout/sidebar.php');
include('layout/navbar.php');

$getid = filter_input(INPUT_GET, 'id', FILTER_DEFAULT);
$sqlReturnAlunos = "SELECT * FROM vwmatriculas WHERE idaluno=:idaluno LIMIT 1";
$stmtAluno = $conectar->prepare($sqlReturnAlunos);
$stmtAluno->bindParam(":idaluno", $getid);
$stmtAluno->execute();
if (($stmtAluno) AND ($stmtAluno->rowCount() > 0)) {
    $retorno = $stmtAluno->fetch(PDO::FETCH_ASSOC);
    extract($retorno);
    print_r($retorno);
}

$query = "SELECT iddisciplina as iddisc,codigo,disciplina FROM tbdisciplinas";
$stmtdisc = $conectar->prepare($query);
$stmtdisc->execute();

/* $dataN = new DateTime();
  $dataAtual = new DateTime();
  $idade = $dataAtual->diff($dataN); */
?>

<div class="right_col" role="main">
    <div class="page-title">
        <div class="title_left">
            <h3>Detalhes</h3>

        </div>
    </div>
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12 col-sm-12 ">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Aluno Inscrito</h2>
                    <ul class="nav navbar-right panel_toolbox">
                    <li><a class="btn btn-info" href="" title="Editar dados do aluno"><i class="fa fa-pencil-alt"></i></a>
                        </li>
                        <li><a class='btn btn-warning' title='Imprimir ficha do aluno' id='Imprimir'><i class='fa fa-print'></i></a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="col-md-3 col-sm-3  profile_left">
                        <div class="profile_img">
                            <div id="crop-avatar">
                                <!-- Current avatar -->
                                <img src="<?php echo $_SERVER['DOCUMENT_ROOT'] . "/siga/views/assets/build/images/alunos/$idaluno/$fotoaluno" ?>" alt="foto" class="img-responsive avatar-view" height="220" width="168"/>
                            </div>
                        </div>
                        <h3 id="idalunoNota" hidden><?php echo $idaluno; ?></h3>
                        <h3><?php echo $nomealuno; ?></h3>

                        <ul class="list-unstyled user_data">
                            <li><i class="fa fa-map-marker user-profile-icon"></i> <?php echo $bairro . ',' . $cidade ?> 
                            </li>

                            <li>
                                <i class="fa fa-phone user-profile-icon"></i> <?php echo $telf ?>
                            </li>
                            <li>
                                <i class="fa fa-phone user-profile-icon"></i> <?php echo $telfenc ?>
                            </li>

                            <li class="m-top-xs">
                                <i class="fa fa-stamp user-profile-icon"></i> <?php echo $estado ?>
                            </li>
                        </ul>

                        <!-- start skills -->
                        <h4>Skills</h4>
                        <ul class="list-unstyled user_data">
                            <li>
                                <p>Web Applications</p>
                                <div class="progress progress_sm">
                                    <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="50"></div>
                                </div>
                            </li>
                            <li>
                                <p>Website Design</p>
                                <div class="progress progress_sm">
                                    <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="70"></div>
                                </div>
                            </li>
                            <li>
                                <p>Automation & Testing</p>
                                <div class="progress progress_sm">
                                    <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="30"></div>
                                </div>
                            </li>
                            <li>
                                <p>UI / UX</p>
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
                                <li role="presentation" class="Active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Histórico</a>
                                    </li>
                                <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">1º Trimestre</a>
                                    </li>
                                    <li role="presentation" class=""><a href="#tab_content3" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">2º Trimestre</a>
                                    </li> 
                                    <li role="presentation" class=""><a href="#tab_content4" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">2º Trimestre</a>
                                    </li> 
                            </ul>
                            <div id="myTabContent" class="tab-content">
                                <div role="tabpanel" class="tab-pane active " id="tab_content1" aria-labelledby="home-tab">
                                <!-- start recent activity -->
                                <ul class="messages">
                                    <li>
                                        <img src="images/img.jpg" class="avatar" alt="Avatar">
                                        <div class="message_date">
                                            <h3 class="date text-info">24</h3>
                                            <p class="month">May</p>
                                        </div>
                                        <div class="message_wrapper">
                                            <h4 class="heading">Desmond Davison</h4>
                                            <blockquote class="message">Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua butcher retro keffiyeh dreamcatcher synth.</blockquote>
                                            <br />
                                            <p class="url">
                                                <span class="fs1 text-info" aria-hidden="true" data-icon=""></span>
                                                <a href="#"><i class="fa fa-paperclip"></i> User Acceptance Test.doc </a>
                                            </p>
                                        </div>
                                    </li>
                                    <li>
                                        <img src="images/img.jpg" class="avatar" alt="Avatar">
                                        <div class="message_date">
                                            <h3 class="date text-error">21</h3>
                                            <p class="month">May</p>
                                        </div>
                                        <div class="message_wrapper">
                                            <h4 class="heading">Brian Michaels</h4>
                                            <blockquote class="message">Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua butcher retro keffiyeh dreamcatcher synth.</blockquote>
                                            <br />
                                            <p class="url">
                                                <span class="fs1" aria-hidden="true" data-icon=""></span>
                                                <a href="#" data-original-title="">Download</a>
                                            </p>
                                        </div>
                                    </li>
                                    <li>
                                        <img src="images/img.jpg" class="avatar" alt="Avatar">
                                        <div class="message_date">
                                            <h3 class="date text-info">24</h3>
                                            <p class="month">May</p>
                                        </div>
                                        <div class="message_wrapper">
                                            <h4 class="heading">Desmond Davison</h4>
                                            <blockquote class="message">Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua butcher retro keffiyeh dreamcatcher synth.</blockquote>
                                            <br />
                                            <p class="url">
                                                <span class="fs1 text-info" aria-hidden="true" data-icon=""></span>
                                                <a href="#"><i class="fa fa-paperclip"></i> User Acceptance Test.doc </a>
                                            </p>
                                        </div>
                                    </li>
                                    <li>
                                        <img src="images/img.jpg" class="avatar" alt="Avatar">
                                        <div class="message_date">
                                            <h3 class="date text-error">21</h3>
                                            <p class="month">May</p>
                                        </div>
                                        <div class="message_wrapper">
                                            <h4 class="heading">Brian Michaels</h4>
                                            <blockquote class="message">Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua butcher retro keffiyeh dreamcatcher synth.</blockquote>
                                            <br />
                                            <p class="url">
                                                <span class="fs1" aria-hidden="true" data-icon=""></span>
                                                <a href="#" data-original-title="">Download</a>
                                            </p>
                                        </div>
                                    </li>

                                </ul>
                                <!-- end recent activity -->

                                </div>
                                <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">

                                    <!-- start user projects -->
                                    <table class="data table table-striped no-margin" id="tableAlunoTurma">
                                        <thead>
                                            <tr>
                                                <th>Disciplina</th>
                                                <th>MAC</th>
                                                <th>PP</th>
                                                <th>PE</th>
                                                <th>MF</th>
                                                <th>Ações</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                        </tbody>
                                    </table>
                                    <!-- end user projects -->

                                </div>
                                <div role="tabpanel" class="tab-pane fade" id="tab_content3" aria-labelledby="profile-tab">
                                      <!-- start user projects -->
                                      <table class="data table table-striped no-margin">
                                        <thead>
                                            <tr>
                                                <th>Disciplina</th>
                                                <th>MAC</th>
                                                <th>PP</th>
                                                <th>PE</th>
                                                <th>MF</th>
                                                <th>Ações</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <!-- end user projects -->
                                </div>
                                <div role="tabpanel" class="tab-pane fade" id="tab_content4" aria-labelledby="profile-tab">
                                      <!-- start user projects -->
                                      <table class="data table table-striped no-margin">
                                        <thead>
                                            <tr>
                                                <th>Disciplina</th>
                                                <th>MAC</th>
                                                <th>PP</th>
                                                <th>PE</th>
                                                <th>MF</th>
                                                <th>Ações</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <!-- end user projects -->
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
<?php
include('layout/footer.php');
?>