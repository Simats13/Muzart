<!DOCTYPE html>
<html lang="fr">

<head>

    <meta charset="utf-8">
    <!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="assets/img/ico/favicon.ico">
    <link rel="apple-touch-icon" sizes="144x144" href="assets/img/ico/apple-touch-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="114x114" href="assets/img/ico/apple-touch-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="72x72" href="assets/img/ico/apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon" href="assets/img/ico/apple-touch-icon-57x57.png">

    <title>Pérusat Création - Contact</title>

    <!-- Bootstrap Core CSS -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/animate.css" rel="stylesheet">
    <link href="assets/css/plugins.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="assets/css/style.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="assets/css/pe-icons.css" rel="stylesheet">

</head>

<body id="page-top" class="index">

    <div class="master-wrapper">

 

        <!-- Navigation -->


        <section class="dark-wrapper opaqued parallax" data-parallax="scroll" data-image-src="assets/img/bg/bg_perusat.jpg" data-speed="0.7" style="margin-bottom:50px">
            <div class="section-inner pad-top-200">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 mt30 wow text-center">
                            <h2 class="section-heading" style="margin-bottom:100px">Me Contacter</h2>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="welcome">
            <div class="section-inner nopaddingbottom">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <p class="lead">Lorem ipsum dolor sit amet consectetur adipisicing elit. Earum pariatur optio similique totam amet cumque dolor esse! Enim nihil dolorem tempore nesciunt blanditiis unde amet soluta. Accusamus autem delectus numquam.</p>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aperiam sunt dolores repudiandae voluptate! Veniam cupiditate ullam optio ab ratione, molestias quod nulla id, tempore eligendi quae mollitia temporibus dolorem consectetur.</p>
                            <p class="mt30"><a href="#" class="btn btn-primary btn-theme page-scroll">Entrer en contact</a></p>
                        </div>

                        <div class="col-md-6">
                            <div id="message"></div>
                            <?php 
                                    //RECUPERATION DU FORMULAIRE ET TRAITEMENT (COMMENTAIRE)
                                    if(isset($_POST['submit'])){
                                        $name = htmlspecialchars(trim($_POST['name']));
                                        $email = htmlspecialchars(trim($_POST['mail']));
                                        $message = htmlspecialchars(trim($_POST['message']));
                                        $errors = [];
                                        //SI UN DES TROIS CHAMPS NE SONT PAS REMPLIS PAS DE TRAITEMENT ET AFFICHAGE D'UN MESSAGE D'ERREUR
                                        if(empty($name) || empty($email) || empty($message)){
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
                                            echo "Nom:".$name."<br>"."Email:".$email."<br>"."Message:".$message; // Test pour voir si ça récupère bien les données 
                                            recevoir($name,$email,$message);

                                        }
                                    }


                                    ?>
                            <form method="post" class="main-contact-form wow">
                                <input type="text" class="form-control col-md-4" name="name" placeholder="Votre nom *" id="name" required data-validation-required-message="Please enter your name." />
                                <input type="text" class="form-control col-md-4" name="mail" placeholder="Votre e-mail *" id="mail" required data-validation-required-message="Please enter your email address." />
                                <textarea name="message"  class="form-control" id="message" placeholder="Votre message *" required data-validation-required-message="Please enter a message."></textarea>
                                <input class="btn btn-primary mt30 btn-grey pull-right" type="submit" name="submit" value="Submit" />
                                <button type="submit" name="submit" id="submit" class="btn btn-primary pull-right">Répondre</button>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </section>




    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    
    <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
    <script src="assets/js/init.js"></script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</body>

</html>
