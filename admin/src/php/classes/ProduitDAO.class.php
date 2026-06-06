<?php

class ProduitDAO {

    private $_bd;

    public function __construct($cnx) {
        $this->_bd = $cnx;
    }

    public function getProduits() {
        $query = "SELECT * FROM produit ORDER BY id_produit";
        $resultset = $this->_bd->prepare($query);
        $resultset->execute();
        return $resultset->fetchAll(PDO::FETCH_OBJ);
    }

    public function getVueProduits() {
        $query = "SELECT * FROM vue_produits ORDER BY id_produit";
        $resultset = $this->_bd->prepare($query);
        $resultset->execute();
        return $resultset->fetchAll(PDO::FETCH_OBJ);
    }

    public function updateProduit($id, $champ, $valeur) {

    try {
        $query = "SELECT * FROM update_produit(:id, :champ, :valeur)";

        $resultset = $this->_bd->prepare($query);

        $resultset->bindValue(':id', $id);
        $resultset->bindValue(':champ', $champ);
        $resultset->bindValue(':valeur', $valeur);

        $resultset->execute();

        return true;

    } catch(PDOException $e) {
        print $e->getMessage();
        return false;
    }
    }
    public function deleteProduit($id) {

    try {

        $query = "SELECT * FROM delete_produit(:id)";

        $resultset = $this->_bd->prepare($query);
        $resultset->bindValue(':id', $id);
        $resultset->execute();

        return true;

    } catch(PDOException $e) {

        print $e->getMessage();
        return false;
    }
    }

    public function ajoutProduit($nom, $description, $prix, $stock, $image, $id_categorie) {
    try {
        $query = "SELECT * FROM insert_produit(:nom, :description, :prix, :stock, :image, :id_categorie)";

        $resultset = $this->_bd->prepare($query);
        $resultset->bindValue(':nom', $nom);
        $resultset->bindValue(':description', $description);
        $resultset->bindValue(':prix', $prix);
        $resultset->bindValue(':stock', $stock);
        $resultset->bindValue(':image', $image);
        $resultset->bindValue(':id_categorie', $id_categorie);

        $resultset->execute();

        return true;
    } catch (PDOException $e) {
        print $e->getMessage();
        return false;
    }
    }

    public function getProduitById($id_produit) {
    $query = "SELECT * FROM vue_produits WHERE id_produit = :id_produit";
    $resultset = $this->_bd->prepare($query);
    $resultset->bindValue(':id_produit', $id_produit);
    $resultset->execute();

    return $resultset->fetch(PDO::FETCH_OBJ);
    }
}