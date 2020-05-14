
<?php
if(hasnt_password()== 1){
    header("Location:index.php?page=password");
}
$post = get_post();

?>
<h5>Bonjour <?= $_SESSION['admin']  ?></h5>
<h2>Tableau de bord | Portfolio</h2>
<div class="row">

    <?php 
    //AFFICHE LES TABLES, affiche en forme des rectangles le nombre de publication depuis la table Portfolio, commentaire et admin
        $tables = [
            "Publications" => "portfolio",
            "Commentaires" => "comments",
            "Administrateurs" => "admin"   

        ];
    //Change la couleur des rectangles, si le nom d'une table ne correspond pas il affiche automatiquement la couleur orange
        $colors = [
            "portfolio" => "blue-grey",
            "comments" => "red",
            "admin" => "blue"
        ];
    
    ?>

    <?php 
    //Affiche le nombre de rectangle en fonction du nombre de table, ici il y en 3. 
        foreach($tables as $table_name => $table){
            ?>
                <div class="col 14 m6 s12">
                    <div class="card">
                        <div class="card-content <?=getColor($table,$colors)?> white-text">
                            <span class="card-title"><?= $table_name  ?></span>
                            <?php $nbrInTable = inTable($table); ?>
                            <h4><?= $nbrInTable[0]?></h4>
                        
                        </div>
                    </div>
                </div>
            <?php
        }
    
    ?>


</div>


<h4>Commentaires non lus</h4>
<?php 
//Prend les commentaires et le mets dans la variable comments, il s'agit d'une fonction dans le fichier dashboard_portfolio.func.php 
    $comments = get_comments()

?>

<table>
    <thead>
        <tr>
            <th>Article</th>
            <th>Commentaire</th>
            <th>Actions</th>        
        </tr>   
    </thead>
    <tbody>
        <?php 
        //Si la variable comments n'est pas vide alors l'instruction ci-dessous est exécuté
        if(!empty($comments)){
            //Pour chaque commentaire il va les afficher d'une manière prédéfinis en HTML
            foreach($comments as $comment){
                ?>
                <!-- Il s'agit de l'id du commentaire, dans quel article est-il situé-->
                    <tr id="commentaire_<?= $comment->id ?>">
                    <!-- Il s'agit du titre du commentaire-->
                        <td><?= $comment->title ?></td>
                        <!-- Il s'agit du contenu du commentaire et est limité à 100 caractères-->
                        <td><?= substr($comment->comments,0,100); ?>...</td>
                        <td>
                        <!--Logo permettant de confirmer un commentaire-->
                            <a href="#" id="<?= $comment->id ?>" class="btn-floating btn-small waves-effect waves-light green see_comment"><i class="material-icons">done</i></a>
                            <!--Logo permettant de supprimer un commentaire-->
                            <a href="#" id="<?= $comment->id ?>" class="btn-floating btn-small waves-effect waves-light red delete_comment"><i class="material-icons">delete</i></a>
                            <!--Logo permettant de voir en détail un commentaire-->
                            <a href="#comment_<?= $comment->id?>" class="btn-floating btn-small waves-effect waves-light blue modal-trigger"><i class="material-icons">more_vert</i></a>
                            <div class="modal" id="comment_<?= $comment->id?>">
                            

                            <!--AFFICHE LE COMMENTAIRE EN ENITER-->
                                <div class="modal-content">
                                <!-- Il s'agit du titre du commentaire-->
                                    <h4><?= $comment->title?></h4>
                                    <!-- Il s'agit du nom , de la date et de l'email de la personne qui a écrit le commentaire -->
                                    <p>Commentaire posté par <strong><?= $comment->name." (".$comment->email.")</strong><br/>Le ".date("d/m/Y à H:i", strtotime($comment->date))?></p>
                                    <hr/>
                                    <!-- Il s'agit du contenu du commentaire-->
                                    <p><?= nl2br($comment->comments) ?></p>
                                </div>

                            <!-- Bouton permmettant de valider les commentaires ou non-->
                                <div class="modal-footer">
                                    <a href="#" id="<?= $comment->id?>" class="modal-action modal-close waves-effect waves-red btn-flat delete_comment"><i class="material-icons">delete</i></a>
                                    <a href="#" id="<?= $comment->id?>" class="modal-action modal-close waves-effect waves-green btn-flat see_comment"><i class="material-icons">done</i></a>
                                
                                
                                </div>
                            
                            
                            
                            </div>
                        
                        </td>
                    
                    </tr>




                <?php
            }
        }else{
            ?>
                <tr>
                    <td></td>
                    <td><center>Aucun commentaire à valider</center></td>
                </tr>
            <?php
        }
        
        ?>
    </tbody>
</table>

