<body class="nav-md">
    <div class="container body">
        <div class="main_container">
            <div class="col-md-3 left_col">
                <div class="left_col scroll-view">
                    <div class="navbar nav_title" style="border: 0">
                        <a href="http://localhost/siga/views/admin/" class="site_title">
                            <img src="../assets/build/images/Logo.png" alt="SGELogo" class=" img-circle elevation-3" style="opacity: .8; margin-top: -.5 rem; margin-right: .2rem;
                                 height: 33px;">
                            <span>SIGA-1237</span>
                        </a>
                    </div>

                    <div class="clearfix"></div>

                    <!-- menu profile quick info -->
                    <div class="profile clearfix">
                        <div class="profile_pic">
                            <img src="<?php echo "../assets/build/images/user/" . $id . "/" . $image; ?>" alt="..." class="img-circle profile_img" />
                        </div>
                        <div class="profile_info">
                            <h2><?php echo $nome; ?></h2>
                            <span><?php echo $categoria; ?></span>
                        </div>
                    </div>
                    <!-- /menu profile quick info -->

                    <br />
                    <!-- sidebar menu -->
                    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                        <div class="menu_section">
                            <h3>Menu</h3>
                            <ul class="nav side-menu">
                                <li>
                                    <a><i class="fa fa-users"></i> Utilizador
                                        <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <li>
                                            <a href="listUsuario.php">Lista de utilizadores</a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a><i class="fa fa-graduation-cap"></i> Matrícula
                                        <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <li>
                                            <a href="listAluno.php">Alunos Inscritos</a>
                                        </li>
                                        <li>
                                            <a href="listAlunoMatri.php">Alunos Matriculados</a>
                                        </li>
                                    </ul>
                                </li>
                                <div class="clearfix"></div>
                                <li>
                                    <a><i class="fa fa-male"></i> Força de trabalho
                                        <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <li>
                                            <a href="listfuncio.php">Lista de funcionarios</a>
                                        </li>
                                    </ul>
                                </li>
                                <div class="clearfix"></div>
                                <li>
                                    <a><i class="fa fa-bookmark-o"></i> Disciplinas
                                        <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <li>
                                            <a href="cadDisciplina.php">Cadastrar Disciplinas</a>
                                        </li>
                                        <li>
                                            <a href="cadDiscProf.php">Disciplinas/Professores</a>
                                        </li>
                                    </ul>
                                </li>
                                <div class="clearfix"></div>
                                <li>
                                    <a><i class="fa fa-sort-numeric-asc"></i> Notas
                                        <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <li>
                                            <a href="cadNotas.php">Lançar Notas</a>
                                        </li>
                                        <li>
                                            <a href="listNotas.php">Notas/Turmas</a>
                                        </li>
                                    </ul>
                                </li>
                                <div class="clearfix"></div>
                                <li>
                                    <a><i class="fa fa-sort-numeric-asc"></i> Turmas
                                        <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <li>
                                            <a href="listTurmas.php">Lista de Turmas</a>
                                        </li>
                                    </ul>
                                </li>
                                <div class="clearfix"></div>
                                <li>
                                    <a><i class="fa fa-list-alt"></i> Relatório
                                        <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <li>
                                            <a href="listAlunoTurma.php">Aluno por turma</a>
                                        </li>
                                        <li>
                                            <a href="../../controllers/controllerRelMatriAluno.php">Ficha de matrícula</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- /sidebar menu -->
                    <!-- /menu footer buttons -->
                    <div class="sidebar-footer hidden-small">
                        <a href="javascript:;" class="user-profile dropdown-toggle" title="Settings" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                            <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="javascript:;">Fixed Sidebar</a>
                            <a class="dropdown-item" href="javascript:;">Fixed Footer</a>
                        </div>

                        <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                            <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
                        </a>
                        <a data-toggle="tooltip" data-placement="top" title="Lock">
                            <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
                        </a>
                        <a data-toggle="tooltip" data-placement="top" title="Logout" href="<?php echo '../../session/sair.php' ?>">
                            <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
                        </a>
                    </div>
                    <!-- /menu footer buttons -->
                </div>
            </div>