<?php
require_once __DIR__ . '/../src/php/utils/check_connection.php';
?>

<h2>Gestion des produits</h2>

<?php
if (isset($_GET['submit'])) {
    if (
        $_GET['nom'] != '' &&
        $_GET['description'] != '' &&
        $_GET['prix'] != '' &&
        $_GET['stock'] != '' &&
        $_GET['image'] != '' &&
        $_GET['id_categorie'] != ''
    ) {
        $produitDAOAjout = new ProduitDAO($cnx);

        $produitDAOAjout->ajoutProduit(
            $_GET['nom'],
            $_GET['description'],
            $_GET['prix'],
            $_GET['stock'],
            $_GET['image'],
            $_GET['id_categorie']
        );
        header('Location: index_.php?page=gestion_produits.php');
        exit;
    }
}
?>

<?php
$categoriesDAO = new CategorieDAO($cnx);
$categories = $categoriesDAO->getCategories();

$produitDAO = new ProduitDAO($cnx);
$data = $produitDAO->getVueProduits();
?>

<div class="container mt-4">
    <button class="btn btn-primary mb-3" id="inserer">Insérer un nouveau produit</button>

    <form action="<?= $_SERVER['PHP_SELF'] ?>" method="get" id="ajout_nouveau">
        <table class="table table-striped table-hover">
            <tr>
                <td><input type="text" class="form-control" name="nom" placeholder="Nom du produit"></td>
                <td><input type="number" class="form-control" name="stock" placeholder="Stock"></td>
                <td><input type="number" step="0.01" class="form-control" name="prix" placeholder="Prix"></td>
                <td><textarea class="form-control" name="description" placeholder="Description"></textarea></td>
                <td>
                    <select class="custom-select" name="id_categorie">
                        <option selected>Choisissez la catégorie</option>
                        <?php foreach ($categories as $cat) { ?>
                            <option value="<?= $cat->getIdCategorie(); ?>">
                                <?= $cat->getNomCategorie(); ?>
                            </option>
                        <?php } ?>
                    </select>
                </td>
                <td><input type="text" class="form-control" name="image" placeholder="Image"></td>
                <td><input type="submit" name="submit" class="btn btn-primary mb-3" value="+"></td>
            </tr>
        </table>
    </form>

    <?php if ($data != null) { ?>
        <p class="txtGras">Données disponibles</p>

        <table class="table table-responsive">
            <tr>
                <th>Id</th>
                <th>Produit</th>
                <th>Stock</th>
                <th>Prix</th>
                <th>Description</th>
                <th>Catégorie</th>
                <th>Image</th>
                
            </tr>

            <?php foreach ($data as $row) { ?>
                <tr>
                    <td><?= $row->id_produit; ?></td>
                    <td contenteditable="true" data-champ="nom" id="<?= $row->id_produit; ?>"><?= $row->nom; ?></td>
                    <td contenteditable="true" data-champ="stock" id="<?= $row->id_produit; ?>"><?= $row->stock; ?></td>
                    <td contenteditable="true" data-champ="prix" id="<?= $row->id_produit; ?>"><?= $row->prix; ?></td>
                    <td contenteditable="true" data-champ="description" id="<?= $row->id_produit; ?>"><?= $row->description; ?></td>
                    <td data-champ="id_categorie" id="<?= $row->id_produit; ?>">
                        <select class="custom-select" name="id_categorie">
                            <option value="<?= $row->id_categorie; ?>" selected>
                                <?= $row->nom_categorie; ?>
                            </option>
                            <?php foreach ($categories as $cat) { ?>
                                <option value="<?= $cat->getIdCategorie(); ?>">
                                    <?= $cat->getNomCategorie(); ?>
                                </option>
                            <?php } ?>
                        </select>
                    </td>
                    <td> <img src="../assets/images/<?= $row->image; ?>" alt="<?= $row->nom; ?>"  width="80"> </td>
                    <td class="delete" data-id="<?= $row->id_produit; ?>">🗑️</td>
                </tr>
            <?php } ?>
        </table>
    <?php } else { ?>
        <p class="txtGras">Pas encore de données</p>
    <?php } ?>
</div>