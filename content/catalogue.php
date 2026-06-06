<?php
$produitDAO = new ProduitDAO($cnx);
$produits = $produitDAO->getVueProduits();

if (isset($_GET['categorie'])) {
    $produits = array_filter($produits, function($produit) {
        return $produit->id_categorie == $_GET['categorie'];
    });
}
?>

<div class="container">
    <div class="mb-4 text-center">
    <a href="index_.php?page=catalogue.php" class="btn btn-outline-dark m-1">Tout</a>
    <a href="index_.php?page=catalogue.php&categorie=1" class="btn btn-outline-dark m-1">Vêtements</a>
    <a href="index_.php?page=catalogue.php&categorie=2" class="btn btn-outline-dark m-1">Accessoires</a>
    <a href="index_.php?page=catalogue.php&categorie=3" class="btn btn-outline-dark m-1">Collection</a>
    <a href="index_.php?page=catalogue.php&categorie=4" class="btn btn-outline-dark m-1">Goodies</a>
    </div>

    <div class="row">
        <?php foreach ($produits as $produit) { ?>
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <img src="./admin/assets/images/<?= $produit->image; ?>"
                        class="card-img-top"
                        alt="<?= $produit->nom; ?>">

                    <div class="card-body">
                        <h5 class="card-title"><?= $produit->nom; ?></h5>

                        <p class="card-text">
                            <?= $produit->description; ?>
                        </p>

                        <p>
                            <strong><?= $produit->prix; ?> €</strong>
                        </p>

                        <?php if ($produit->stock > 0) { ?>
                        <p class="text-success">
                             En stock : <?= $produit->stock; ?>
                         </p>
                        <?php } else { ?>
                         <p class="text-danger">
                             Rupture de stock
                        </p>
                        <?php } ?>

                        <p>
                            Catégorie : <?= $produit->nom_categorie; ?>
                        </p>

                        <?php if ($produit->stock > 0) { ?>

                            <a href="index_.php?page=panier.php&id_produit=<?= $produit->id_produit; ?>"
                            class="btn btn-primary">
                                Ajouter au panier
                            </a>

                        <?php } else { ?>

                            <button class="btn btn-secondary" disabled>
                                Rupture de stock
                            </button>

                        <?php } ?>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>