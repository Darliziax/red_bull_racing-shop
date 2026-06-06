<?php

class CategorieDAO {

    private $_bd;

    public function __construct($cnx) {
        $this->_bd = $cnx;
    }

    public function getCategories() {
        $query = "SELECT * FROM categorie ORDER BY id_categorie";
        $resultset = $this->_bd->prepare($query);
        $resultset->execute();

        $categories = array();

        while ($data = $resultset->fetch()) {
            $categories[] = new Categorie(
                $data['id_categorie'],
                $data['nom_categorie']
            );
        }

        return $categories;
    }
}