
<?php
if(hasnt_password()== 1){
    header("Location:index.php?page=password");
}


?>
<h5>Bonjour <?= $_SESSION['admin'] ?></h5>
<h2>Tableau de bord | Formulaire</h2>
<div class="row">
    <?php 
        $tables = [
            "Formulaire" => "contacts",
            "Administrateurs" => "admin"   

        ];

        $colors = [
            "contacts" => "blue-grey",
            "admin" => "blue"
        ];
    
    ?>

    <?php 
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


<h4>Formulaire non lus</h4>
<?php 
    $contacts = get_contacts()

?>

<table>
    <thead>
        <tr>
            <th>Nom</th>
            <th>Formulaire</th>
            <th>Actions</th>        
        </tr>   
    </thead>
    <tbody>
        <?php 
        if(!empty($contacts)){
            foreach($contacts as $contact){
                ?>
                    <tr id="commentaire_<?= $contact->id ?>">
                        <td><?= $contact->name ?></td>
                        <td><?= substr($contact->message,0,100); ?>...</td>
                        <td>
                            <a href="mailto:<?= $contact->email ?>" id="<?= $contact->id ?>" class="btn-floating btn-small waves-effect waves-light green see_contact"><i class="material-icons">done</i></a>
                            <a href="?page=deleted&id=<?= $contact->id ?>" class="btn-floating btn-small waves-effect waves-light red delete_contact"><i class="material-icons">delete</i></a>
                            <a href="#contact_<?= $contact->id?>" class="btn-floating btn-small waves-effect waves-light blue modal-trigger"><i class="material-icons">more_vert</i></a>
                            <div class="modal" id="contact_<?= $contact->id?>">
                            
                                <div class="modal-content">
                                    <h4>FORMULAIRE</h4>
                                    <p>Formulaire posté par <strong><?= $contact->name." (".$contact->email.")</strong><br/>Le ".date("d/m/Y à H:i", strtotime($contact->date))?></p>
                                    <hr/>
                                    <p><?= nl2br($contact->message) ?></p>
                                </div>


                                <div class="modal-footer">
                                    <a href="?page=deleted&id=<?= $contact->id ?>" id="<?= $contact->id?>" class="modal-action modal-close waves-effect waves-red btn-flat delete_comment"><i class="material-icons">delete</i></a>
                                    <a href="mailto:<?= $contact->email ?>" id="<?= $contact->id?>" class="modal-action modal-close waves-effect waves-green btn-flat see_comment"><i class="material-icons">done</i></a>
                                
                                
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
                    <td><center>Aucun formulaire à valider</center></td>
                </tr>
            <?php
        }
        
        ?>
    </tbody>
</table>

