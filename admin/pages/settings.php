<?php
if( admin()!=1){
    header("Location:index.php?page=principal");
    
}
?>

<h2>Paramètres</h2>

<div class="row">
    <div class="col m6 s12">
        <h4>Modérateur</h4>
        <table>
            <thead>
            <tr>
                <th>Nom</th>
                <th>Email</th>
                <th>Rôle</th>
                <th>Validé</th>
                <th>Suppression</th>
            </tr>
            </thead>
            <tbody>
            <?php  
            $modos = get_modos();
            foreach($modos as $modo){
                ?>
                <tr id="modo_<?= $modo->id ?>">
                    <td><?= $modo->name ?></td>
                    <td><?= $modo->email ?></td>
                    <td><?= $modo->role ?></td>
                    <td><i class="material-icons"><?php echo (!empty($modo->password))? "verified_user": "av_timer" ?>r</i></td>
                    <td><a href="?page=deleted&id=<?= $modo->id ?>" id="<?= $modo->id ?>" class="btn-floating btn-small waves-effect waves-light red delete_modo"><i class="material-icons">delete</i></a></td>
                </tr>
                <?php
            }  
            ?>
            </tbody>
        </table>
    </div>

    <div class="col m6 s12">
        <h4>Ajouter un modérateur</h4>
    <?php
    use PHPMAILER\PHPMAILER\PHPMAILER;
    use PHPMailer\PHPMailer\Exception;
        if(isset($_POST['submit'])){
            $name = htmlspecialchars(trim(($_POST['name'])));
            $email = htmlspecialchars(trim(($_POST['email'])));
            $email_again = htmlspecialchars(trim(($_POST['email_again'])));
            $role = htmlspecialchars(trim(($_POST['role'])));
            $token = token(30);

            $errors = [];

            if(empty($name) || empty($email) || empty($email_again)){
                $errors['empty'] = "Veuillez remplir tous les champs";
            }

            if($email != $email_again){
                $errors['différent'] = "Les adresse email ne correspondent pas";
            }
            
            if(email_taken($email)){
                $errors['taken'] = "L'adresse email est déjà assigné à un modérateur";
            }

            if(!empty($errors)){
                ?>
                <div class="card red">
                    <div class="card-content white-text">
                        <?php
                        foreach($errors as $error){
                            echo $error."<br/>";
                        }
                        ?>
                    </div>
                </div>
                <?php
            }else{
                add_modo($name, $email, $role, $token);
                   //APPEL DES FICHIERS DE PHPMAILER
                    require 'PHPMailer/src/Exception.php';
                    require 'PHPMailer/src/PHPMailer.php';
                    require 'PHPMailer/src/SMTP.php';
                    
                    //DECLARATION DU NOUVEL OBJET PHPMAILER
                    $mail = new PHPMailer(true);
                    //REALISATION DE LA CONDITION, SI LA VARIABLE POST['EMAIL'] EST DETECTE

  

                    //DECLARATION DES VARIABLES
                    $objet = "Administration - Perusat Création";
                    $adresse = $_POST['email'];
                    $role = $_POST['role'];
                    $admin = $_SESSION['admin'];
                    
                        
                    //EXECUTION DE LA FONCTION DE PHPMAILER POUR ENVOYER UN MAIL
                    try{
                        
                            $content = '<html lang="en">
                            <head>
                                <meta charset="UTF-8">
                                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                                <title>Document</title>
                            </head>
                            <body>
                                <center>
                                <tr>
                                    <td align="center" style="padding:0 0 24px;"><img src="https://nsa40.casimages.com/img/2020/07/16/200716114318228966.png"  style="vertical-align:top;" alt="" /></td>
                                </tr>
                                <!-- section-01 -->
                                <tr>
                                    <td class="img-flex"><a href="#" target="_blank"><img src="https://nsa40.casimages.com/img/2020/07/16/200716120004710769.jpg" height="346" width="600" border="0" style="vertical-align:top;" alt="" /></a></td>
                                </tr>
                                    <center>
                                    <h3>Bonjour '.$name.', vous avez été convié à administrer le site internet Perusat Création</h3>
                                    <h3>Voici votre identifiant et code unique à insérer sur <a href="http://isabelleperusat.com/admin/index.php?page=new">cette page</a>:</h3>
                                    <br/>
                                    
                                    <h3>Identifiant: '.$adresse.'</h3>
                                    <br/>
                                    <h3>Mot de passe provisoire: '.$token.'</h3>
                                    <br/>
                                    <h3>Vous êtes un : '.$role.'</h3>
                                   
                                    <h3>Après avoir inséré ces informations, vous devrez choisir un mot de passe.</h3>
                                    <br>
                                    
                                    <h2>Nous vous attendons !</h2></td>
                                    </center>
                                </center>
                            
                            </body>
                            </html>
                            
                        ';
                            $mail->CharSet = 'UTF-8';
                            $mail->SMTPDebug = 0;
                            $mail->isSMTP();
                            $mail->Host = 'ssl0.ovh.net';
                            $mail->SMTPAuth = true;
                            $mail->Username = 'admin@isabelleperusat.com';
                            $mail->Password = 'pe\Qgoa)43Ez';
                            $mail->SMTPSecure = 'tls';
                            $mail->Port = 587 ;
                            $mail->setFrom('admin@isabelleperusat.com','ADMINISTRATEUR');
                            $mail->AddAddress($adresse, 'Organisateur');
                            $mail->isHTML(true);
                            $mail->Subject = $objet;
                            $mail->Body = $content;
                            $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
                            $mail->send();
                            $mail->ClearAllRecipients();
                            error_log ( $content );
                            
                        
                        
                        echo 'L\'utilisateur a bien été ajouté. Le mail a été envoyé.';
                        } catch (Exception $e) {
                        echo "Message n'a pas été envoyé: {$mail->ErrorInfo}";
                        }
            }
        }
    ?>

    <form method="post">
        <div class="row">
            <div class="input-field col s12">
                <input type="text" name="name" id="name">
                <label for="name">Nom</label>
            </div>

            <div class="input-field col s12">
                <input type="text" name="email" id="email">
                <label for="email">Adresse Email</label>
            </div>

            <div class="input-field col s12">
                <input type="text" name="email_again" id="email_again">
                <label for="email_again">Répéter l'adresse email</label>
            </div>

            <div class="input-field col s12">
                <select name="role" id="role">
                    <option value="modo">Modérateur</option>
                    <option value="admin">Admnistrateur</option>
                </select>
                <label for="role">Rôle</label>
            </div>
            <div class="col s12">
                <button type="submit" name="submit" class="btn">Ajouter</button>
            </div>
        </div>
    
    </form>

</div>