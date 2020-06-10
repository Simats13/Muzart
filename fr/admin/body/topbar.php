<nav class="light-green">
    <div class="container">
        <div class="nav-wrapper">
            <a href="?page=principal" class="brand-logo">Panneau d'administration</a>
            <?php
            if($page != 'login' && $page != 'new' && $page != 'password'){
                ?>
                    <a href="#" data-activates="mobile-menu" class="button-collapse"><i class="material-icons">menu</i></a>

                    <ul class="right hide-on-med-and-down">
                        <li class="<?php echo ($page=="principal")?"active" : ""; ?>"><a href="index.php?page=principal"><i class="material-icons">dashboard</i></a></li>
                        <?php 
                            if( admin()==1){
                                ?>
                                    <li class="<?php echo ($page=="settings")?"active" : ""; ?>"><a href="index.php?page=settings"><i class="material-icons">settings</i></a></li>
                                <?php
                            }
                        ?>                       
                        <li><a href="../index.php?page=home">Quitter</a></li>
                        <li><a href="index.php?page=logout">Déconnexion</a></li>

                    </ul>

                    <ul class="side-nav" id="mobile-menu">
                        <li class="<?php echo ($page=="dashboard")?"active" : ""; ?>"><a href="index.php?page=principal">Tableau de bord</a></li>
                        <?php 
                            if( admin()==1){
                            ?>
                                <li class="<?php echo ($page=="settings")?"active" : ""; ?>"><a href="index.php?page=settings">Paramètres</a></li>
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
