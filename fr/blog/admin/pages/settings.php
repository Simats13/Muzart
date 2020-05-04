<h2>Paramètres</h2>

<div class="row">
    <div class="col m6 s12">
        <h4>Modérateur</h4>
    </div>

    <div class="col m6 s12">
        <h4>Ajouter un modérateur</h4>
    <?php
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