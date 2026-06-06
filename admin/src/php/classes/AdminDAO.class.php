<?php

class AdminDAO {

    private $_bd;
    private $_adminArray = array();

    public function __construct($cnx) {
        $this->_bd = $cnx;
    }

    public function getAdmin($login, $password) {
        try {
            $query = "select * from get_admin(:login, :password)";
            $resultset = $this->_bd->prepare($query);
            $resultset->bindValue(':login', $login);
            $resultset->bindValue(':password', $password);
            $resultset->execute();

            $data = $resultset->fetch();

            if ($data) {
                return new Admin(
                    $data['id_admin'],
                    $data['nom_admin'],
                    $data['password'],
                    $data['statut']
                );
            }

            return null;
        } catch (PDOException $e) {
            print "Erreur DAO Admin : " . $e->getMessage();
            return null;
        }
    }
}