<?php

$message = '';

if (isset($_GET['submit'])) {

    $email = trim($_GET['email']);
    $mot_de_passe = trim($_GET['mot_de_passe']);

    if ($email != '' && $mot_de_passe != '') {

        $dao = new ClientDAO($cnx);
        $client = $dao->getClient($email, $mot_de_passe);

        if ($client) {

            $_SESSION['client'] = $client->id_client;
            $_SESSION['nom_client'] = $client->nom;
            $_SESSION['prenom_client'] = $client->prenom;

            header('Location: index_.php?page=catalogue.php');
            exit;

        } else {

            $message = "
                <div class='alert alert-danger'>
                    Email ou mot de passe incorrect.
                </div>
            ";
        }
    }
}
?>

<div class="container">

    <h2>Connexion client</h2>

    <?= $message ?>

    <form method="get" action="index_.php">

        <input type="hidden" name="page" value="login_client.php">

        <div class="mb-3">
            <label>Email</label>

            <input
                type="email"
                name="email"
                class="form-control"
                required
            >
        </div>

        <div class="mb-3">
            <label>Mot de passe</label>

            <input
                type="password"
                name="mot_de_passe"
                class="form-control"
                required
            >
        </div>

        <button
            type="submit"
            name="submit"
            class="btn btn-primary"
        >
            Se connecter
        </button>

    </form>

</div>