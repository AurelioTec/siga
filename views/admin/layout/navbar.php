<!-- top navigation -->
<div class="top_nav">
    <div class="nav_menu">
        <div class="nav toggle">
            <a id="menu_toggle"><i class="fa fa-bars"></i></a>
        </div>
        <nav class="nav navbar-nav">
            <ul class="navbar-right">
                <li class="nav-item dropdown open" style="padding-left: 15px"> 
                    <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                        <img src="<?php if (($image != "male.webp") || ($image != "famele.webp")) {
                                        echo "../assets/build/images/user/" . $id . "/" . $image;
                                    } else {
                                        echo "../assets/build/images/user/default/$image";
                                    } ?>" alt=""  /> <?php echo $nome; ?>
                    </a>
                    <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="javascript:;"><i class="fa fa-user-alt pull-right"></i>
                            Perfil</a>
                        <a class="dropdown-item" href="javascript:;">
                            <i class="fa fa-gears pull-right"></i> Definições
                        </a>
                        <a class="dropdown-item" href="<?php echo '../../session/sair.php' ?>"><i class="fa fa-sign-out-alt pull-right"></i>
                            Sair</a>
                    </div>
                </li>
                <li role="presentation" class="nav-item dropdown open">
                    <span id="msm"><?php $_SESSION['mensage']=$mensg; ?></span>
                </li>
        </nav>
    </div>
</div>
<!-- /top navigation -->