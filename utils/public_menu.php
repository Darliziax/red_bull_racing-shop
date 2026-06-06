<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
    <div class="container-fluid">

        <a class="navbar-brand" href="index_.php?page=accueil.php">
            Red Bull Racing Shop
        </a>

        <div class="navbar-nav">

            <a class="nav-link" href="index_.php?page=accueil.php">
                Accueil
            </a>

            <a class="nav-link" href="index_.php?page=catalogue.php">
                Catalogue
            </a>

            <a class="nav-link" href="index_.php?page=panier.php">
                Panier
            </a>

            <?php if (isset($_SESSION['client'])) { ?>

                <a class="nav-link" href="index_.php?page=mes_commandes.php">
                    Mes commandes
                </a>

                <span class="navbar-text text-white ms-3">
                    Bonjour <?= $_SESSION['prenom_client']; ?>
                </span>

                <a class="nav-link" href="index_.php?page=logout_client.php">
                    | Déconnexion
                </a>

            <?php } else { ?>

                <a class="nav-link" href="index_.php?page=inscription.php">
                    Inscription
                </a>

                <a class="nav-link" href="index_.php?page=login_client.php">
                    Connexion
                </a>

            <?php } ?>

        </div>

    </div>
</nav>