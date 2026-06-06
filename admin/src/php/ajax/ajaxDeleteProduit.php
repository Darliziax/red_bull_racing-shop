<?php

require_once __DIR__ . '/../utils/all_includes.php';

if (isset($_GET['id_produit'])) {

    $dao = new ProduitDAO($cnx);

    $dao->deleteProduit($_GET['id_produit']);

    echo json_encode(true);
}