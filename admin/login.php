<?php
    if(isset($_SESSION['admin'])){
        header("Location:index.php?page=principal");
    }
?>
<script src="https://www.google.com/recaptcha/api.js"></script>
<div class="row">
    <div class="col l4 m6 s12 offset-l4 offset-m3">
        <div class="card-panel">
            <div class="row">
                <div class="col s6 offset-s3">
                    <img src="../img/admin.png" alt="Administrateur" width="100%"/>
                </div>
            </div>

            <h4 class="center-align">Se connecter</h4>

            <?php
                require('../../admin/recaptcha/autoload.php');
            
                if(isset($_POST['submit'])){
                    if(isset($_POST['g-recaptcha-response'])){
                        $recaptcha = new \ReCaptcha\ReCaptcha('6LenjrMZAAAAAGFZYBgEfAgmxb_omKnz5YyOGwLe');
                        $resp = $recaptcha->verify($_POST['g-recaptcha-response']);


                        $email = htmlspecialchars(trim($_POST['email']));
                        $password = htmlspecialchars(trim($_POST['password']));

                        $errors = [];

                        if(empty($email) || empty($password)){
                            $errors['empty'] = "Tous les champs n'ont pas été remplis !";
                        }else if(is_admin($email,$password) == 0){
                            $errors['exist']  = "Cet administrateur n'existe pas";
                        }
                        if($resp->getErrorCodes()){
                            $errors['emptyCaptcha']  = "Le captcha n'est pas rempli !";
                        }
                    
                        
                  
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
                        $_SESSION['admin'] = $email;
                        header("Location:index.php?page=principal");
                    }

                }


            ?>

            <form method="post">
                <div class="row">
                    <div class="input-field col s12">
                        <input type="email" id="email" name="email"/>
                        <label for="email">Adresse email</label>
                    </div>

                    <div class="input-field col s12">
                        <input type="password" id="password" name="password"/>
                        <label for="password">Mot de passe</label>
                    </div>
                </div>

                <center>
                    <div class="g-recaptcha" data-sitekey="6LenjrMZAAAAAESM1lVBC89T5PK1qtYoB9P6ImQr" style="margin-bottom:1vw"></div>
                    <button type="submit" name="submit" class="waves-effect waves-light btn light-blue">
                        <i class="material-icons left">perm_identity</i>
                        Se connecter
                    </button>
                    <br/><br/>
                    <a href="index.php?page=new">Nouveau modérateur</a>
                </center>




            </form>

        </div>
    </div>
</div>