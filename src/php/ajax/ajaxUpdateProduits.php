<?php

require_once '../../../utils/all_includes.php';

if (
    isset($_POST['id']) &&
    isset($_POST['champ']) &&
    isset($_POST['valeur'])
) {
    $dao = new ProduitDAO($cnx);
    $dao->updateProduit($_POST['id'], $_POST['champ'], $_POST['valeur']);
}