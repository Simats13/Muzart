<h2>Listing des formulaires</h2>
<hr/>

</head>
<body>
    <?php
    $contacts=get_contact();
    foreach($contacts as $contact){
    ?>
    <div class="row">
        <div class="col s12">
            <h5>Auteur du message</h5>
            <h6><?= $contact->name ?></h6>

            <div class="row">
                <div class="col s12 m6 l8">
                    <h5>Corps du message :</h5>
                    <?= htmlspecialchars(substr(nl2br($contact->message),0,1200)) ?>
                </div>
                <div class="col s12 m6 l8">
                    <br/><br/>
                    <a href="mailto:<?= $contact->email ?>" id="<?= $contact->id ?>" class="btn-floating btn-small waves-effect waves-light green see_contact"><i class="material-icons">done</i></a>
                    <a href="#" id="<?= $contact->id ?>" class="btn-floating btn-small waves-effect waves-light red delete_contact"><i class="material-icons">delete</i></a>
                    <br><br>
                </div>
            </div>
            <hr/>
        </div>
    </div>

    <?php
}