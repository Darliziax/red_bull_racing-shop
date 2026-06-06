<?php

$message = '';

if (isset($_POST['submit'])) {

    $nom = trim($_POST['nom']);
    $prenom = trim($_POST['prenom']);
    $email = trim($_POST['email']);
    $mot_de_passe = trim($_POST['mot_de_passe']);

    if ($nom != '' && $prenom != '' && $email != '' && $mot_de_passe != '') {

        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {

            $dao = new ClientDAO($cnx);
            $client = $dao->getClientByEmail($email);

            if (!$client) {

                $dao->ajoutClient($nom, $prenom, $email, $mot_de_passe);

                $message = "<div class='alert alert-success'>Compte créé avec succès.</div>";

            } else {
                $message = "<div class='alert alert-danger'>Cet email existe déjà.</div>";
            }

        } else {
            $message = "<div class='alert alert-danger'>Email invalide.</div>";
        }
    }
}
?>

<div class="container">

    <h2>Inscription</h2>

    <?= $message ?>

    <form method="post" action="index_.php?page=inscription.php">

        <div class="mb-3">
            <label>Nom</label>
            <input type="text" name="nom" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Prénom</label>
            <input type="text" name="prenom" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Mot de passe</label>
            <input type="password" name="mot_de_passe" class="form-control" required>
        </div>

        <button type="submit" name="submit" class="btn btn-primary">
            Créer le compte
        </button>

    </form>

</div>