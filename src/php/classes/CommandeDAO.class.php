<?php

class CommandeDAO {

    private $_bd;

    public function __construct($cnx) {
        $this->_bd = $cnx;
    }

    public function ajoutCommande($montant_total, $id_client) {
        $query = "SELECT * FROM insert_commande(:montant_total, :id_client)";

        $resultset = $this->_bd->prepare($query);
        $resultset->bindValue(':montant_total', $montant_total);
        $resultset->bindValue(':id_client', $id_client);
        $resultset->execute();

        return $resultset->fetchColumn();
    }
    public function getCommandesClient($id_client) {
    $query = "SELECT *
              FROM commande
              WHERE id_client = :id_client
              ORDER BY date_commande DESC";

    $resultset = $this->_bd->prepare($query);
    $resultset->bindValue(':id_client', $id_client);
    $resultset->execute();

    return $resultset->fetchAll(PDO::FETCH_OBJ);
    }
}