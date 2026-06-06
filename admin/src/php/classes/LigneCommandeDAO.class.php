<?php

class LigneCommandeDAO {

    private $_bd;

    public function __construct($cnx) {
        $this->_bd = $cnx;
    }

    public function ajoutLigneCommande($quantite, $prix_unitaire, $id_commande, $id_produit) {
        $query = "SELECT * FROM insert_ligne_commande(
                    :quantite,
                    :prix_unitaire,
                    :id_commande,
                    :id_produit
                  )";

        $resultset = $this->_bd->prepare($query);
        $resultset->bindValue(':quantite', $quantite);
        $resultset->bindValue(':prix_unitaire', $prix_unitaire);
        $resultset->bindValue(':id_commande', $id_commande);
        $resultset->bindValue(':id_produit', $id_produit);
        $resultset->execute();

        return true;
    }
}