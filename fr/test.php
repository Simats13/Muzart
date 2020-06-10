<?php 
                                    //RECUPERATION DU FORMULAIRE ET TRAITEMENT (COMMENTAIRE)
                                    if(isset($_POST['test'])){
                                        $name = htmlspecialchars(trim($_POST['name']));
                                        $email = htmlspecialchars(trim($_POST['email']));
                                        $comment = htmlspecialchars(trim($_POST['comment']));
                                        $errors = [];
                                        //SI UN DES TROIS CHAMPS NE SONT PAS REMPLIS PAS DE TRAITEMENT ET AFFICHAGE D'UN MESSAGE D'ERREUR
                                        if(empty($name) || empty($email) || empty($comment)){
                                            $errors['empty'] = "Tous les champs n'ont pas été remplis";
                                        }else{
                                            //SI L'EMAIL EST INVALIDE
                                            if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                                                $errors['email'] = "L'adresse email n'est pas valide";
                                            }
                                        }

                                        //SI LE TABLEAU ERREUR N'EST PAS VIDE ALORS IL AFFICHE LES ERREURS
                                        if(!empty($errors)){
                                            ?>
                                                <div class="alert alert-danger">
                                                    <div class="alert-heading">
                                                        <?php
                                                            foreach($errors as $error){
                                                                echo $error."<br/>";
                                                            }
                                                        ?>
                                                    </div>
                                                </div>
                                            <?php
                                        }else{
                                            //LE COMMENTAIRE S'AFFICHE EN TEMPS REEL UNE FOIS POSTE
                                            echo $name;
                                        }
                                    }


                                    ?>


                                    </div>
                                    <div id="comment_message"></div>
                                    <form method="post" id="commentform" class="comment-form" action="#">
                                        <input type="text" class="form-control col-md-4" name="name" id="name" placeholder="Votre Nom *" required data-validation-required-message="Veuillez entrer votre Nom !"/>
                                        <label for="name"></label>
                                        <input type="text" class="form-control col-md-4" name="email" id="email" placeholder="Votre Email *" required data-validation-required-message="Veuillez entrer votre adresse Email ! !" />
                                        <label for="email"></label>
                                        <textarea  class="form-control" id="comment" name="comment"placeholder="Votre Message *" required data-validation-required-message="Veuillez entrer votre Message !"></textarea>
                                        <label for="comment"></label>
                                        <button type="submit" name="test" id="test" class="btn btn-primary pull-right">Répondre</button>
                                    </form>
                                </div>

    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/plugins.js"></script>
    <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
    <script src="assets/js/init.js"></script>