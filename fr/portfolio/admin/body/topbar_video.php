<nav class="grey darken">
    <div class="container">
        <div class="nav-wrapper">
            <a href="../../admin/index.php?page=principal" class="brand-logo">Panneau d'administration</a>
            <?php
            if($page != 'login' && $page != 'new' && $page != 'password'){
                ?>
                    <a href="#" data-activates="mobile-menu" class="button-collapse"><i class="material-icons">menu</i></a>

                    <ul class="right hide-on-med-and-down">
                        <li class="<?php echo ($page=="principal")?"active" : ""; ?>"><a href="index_video.php?page=dashboard_video"><i class="material-icons">dashboard</i></a></li>
                        <li class="<?php echo ($page=="list_video")?"active" : ""; ?>"><a href="index_video.php?page=list_video"><i class="material-icons">view_list</i></a></li>
                        <li class="<?php echo ($page=="write_video")?"active" : ""; ?>"><a href="index_video.php?page=write_video"><i class="material-icons">edit</i></a></li>
                        <?php 
                            if( admin()==1){
                                ?>
                                    <li class="<?php echo ($page=="settings")?"active" : ""; ?>"><a href="index_video.php?page=settings"><i class="material-icons">settings</i></a></li>
                                <?php
                            }
                        ?>                       
                        <li><a href="../index.php?page=home">Quitter</a></li>
                        <li><a href="index_video.php?page=logout">Déconnexion</a></li>

                    </ul>

                    <ul class="side-nav" id="mobile-menu">
                        <li class="<?php echo ($page=="principal")?"active" : ""; ?>"><a href="index_video.php?page=dashboard">Tableau de bord</a></li>
                        <li class="<?php echo ($page=="list_video")?"active" : ""; ?>"><a href="index_video.php?page=list">Listing des articles</a></li>
                        <li class="<?php echo ($page=="write_video")?"active" : ""; ?>"><a href="index_video.php?page=write">Publier un article</a></li>
                        <?php 
                            if( admin()==1){
                            ?>
                                <li class="<?php echo ($page=="settings")?"active" : ""; ?>"><a href="index_video.php?page=settings">Paramètres</a></li>
                            <?php
                            }
                        ?>
                        <li><a href="../index.php?page=home">Quitter</a></li>
                        <li><a href="index.php?page=logout">Déconnexion</a></li>

                    </ul>
                <?php
            }
            ?>
        </div>
    </div>
</nav>
