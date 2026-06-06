<?php

if (!isset($_SESSION['panier'])) {
    $_SESSION['panier'] = array();
}

$produitDAO = new ProduitDAO($cnx);

if (isset($_GET['plus'])) {

    $id_produit = $_GET['plus'];

    $produit = $produitDAO->getProduitById($id_produit);

    if (isset($_SESSION['panier'][$id_produit])) {

        if ($_SESSION['panier'][$id_produit] < $produit->stock) {
            $_SESSION['panier'][$id_produit]++;
        }
    }

    header('Location: index_.php?page=panier.php');
    exit;
}

if (isset($_GET['moins'])) {

    $id_produit = $_GET['moins'];

    if (isset($_SESSION['panier'][$id_produit])) {

        $_SESSION['panier'][$id_produit]--;

        if ($_SESSION['panier'][$id_produit] <= 0) {
            unset($_SESSION['panier'][$id_produit]);
        }
    }

    header('Location: index_.php?page=panier.php');
    exit;
}

if (isset($_GET['supprimer'])) {
    $id_supprimer = $_GET['supprimer'];

    if (isset($_SESSION['panier'][$id_supprimer])) {
        unset($_SESSION['panier'][$id_supprimer]);
    }

    header('Location: index_.php?page=panier.php');
    exit;
}

if (isset($_GET['id_produit'])) {
    $id_produit = $_GET['id_produit'];

    if (isset($_SESSION['panier'][$id_produit])) {
        $_SESSION['panier'][$id_produit]++;
    } else {
        $_SESSION['panier'][$id_produit] = 1;
    }

    header('Location: index_.php?page=panier.php');
    exit;
}

$produitDAO = new ProduitDAO($cnx);
$total = 0;
?>

<div class="container">
    <h2>Mon panier</h2>

    <?php if (empty($_SESSION['panier'])) { ?>

        <p>Votre panier est vide.</p>

    <?php } else { ?>

        <table class="table table-striped">
            <tr>
                <th>Produit</th>
                <th>Prix</th>
                <th>Quantité</th>
                <th>Total</th>
                <th>Action</th>
            </tr>

            <?php foreach ($_SESSION['panier'] as $id_produit => $quantite) {
                $produit = $produitDAO->getProduitById($id_produit);
                $sous_total = $produit->prix * $quantite;
                $total += $sous_total;
            ?>
                <tr>
                    <td><?= $produit->nom; ?></td>
                    <td><?= $produit->prix; ?> €</td>
                    <td> <a href="index_.php?page=panier.php&moins=<?= $id_produit; ?>" class="btn btn-warning btn-sm">-</a> <?= $quantite; ?> <a href="index_.php?page=panier.php&plus=<?= $id_produit; ?>" class="btn btn-success btn-sm">+</a> </td>
                    <td><?= $sous_total; ?> €</td>
                    <td> <a href="index_.php?page=panier.php&supprimer=<?= $id_produit; ?>" class="btn btn-danger btn-sm"> Supprimer </a> </td>
                </tr>
            <?php } ?>
        </table>

        <h4>Total : <?= $total; ?> €</h4>

        <?php if (isset($_SESSION['client'])) { ?>
            <a href="index_.php?page=valider_commande.php" class="btn btn-success">
                Valider la commande
            </a>
        <?php } else { ?>
            <p>Vous devez vous connecter pour commander.</p>
            <a href="index_.php?page=login_client.php" class="btn btn-primary">
                Se connecter
            </a>
        <?php } ?>

    <?php } ?>
</div>