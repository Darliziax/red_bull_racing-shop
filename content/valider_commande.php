<?php

if (!isset($_SESSION['client'])) {
    header('Location: index_.php?page=login_client.php');
    exit;
}

if (!isset($_SESSION['panier']) || empty($_SESSION['panier'])) {
    header('Location: index_.php?page=panier.php');
    exit;
}

$produitDAO = new ProduitDAO($cnx);
$total = 0;

foreach ($_SESSION['panier'] as $id_produit => $quantite) {
    $produit = $produitDAO->getProduitById($id_produit);
    $total += $produit->prix * $quantite;
}

$commandeDAO = new CommandeDAO($cnx);
$ligneCommandeDAO = new LigneCommandeDAO($cnx);

$id_commande = $commandeDAO->ajoutCommande($total, $_SESSION['client']);

foreach ($_SESSION['panier'] as $id_produit => $quantite) {
    $produit = $produitDAO->getProduitById($id_produit);

    $ligneCommandeDAO->ajoutLigneCommande(
        $quantite,
        $produit->prix,
        $id_commande,
        $id_produit
    );

    $produitDAO->updateProduit(
    $id_produit,
    'stock',
    $produit->stock - $quantite
    );
}

unset($_SESSION['panier']);
?>

<div class="container">
    <div class="alert alert-success">
        Votre commande a bien été validée.
    </div>

    <a href="index_.php?page=catalogue.php" class="btn btn-primary">
        Retour au catalogue
    </a>
</div>