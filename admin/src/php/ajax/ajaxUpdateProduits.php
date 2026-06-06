<?php

require_once __DIR__ . '/../utils/all_includes.php';

if (!isset($_SESSION['admin'])) {
    http_response_code(403);
    exit;
}

if (
    isset($_POST['id']) &&
    isset($_POST['champ']) &&
    isset($_POST['valeur'])
) {
    $dao = new ProduitDAO($cnx);
    $dao->updateProduit($_POST['id'], $_POST['champ'], $_POST['valeur']);
}