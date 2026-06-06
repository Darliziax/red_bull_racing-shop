<?php

class ClientDAO {

    private $_bd;

    public function __construct($cnx) {
        $this->_bd = $cnx;
    }

    public function ajoutClient($nom, $prenom, $email, $mot_de_passe) {

        try {
            $query = "SELECT * FROM insert_client(
                        :nom,
                        :prenom,
                        :email,
                        :mot_de_passe
                      )";

            $resultset = $this->_bd->prepare($query);

            $resultset->bindValue(':nom', $nom);
            $resultset->bindValue(':prenom', $prenom);
            $resultset->bindValue(':email', $email);
            $resultset->bindValue(':mot_de_passe', $mot_de_passe);

            $resultset->execute();

            return true;

        } catch(PDOException $e) {
            print $e->getMessage();
            return false;
        }
    }

    public function getClientByEmail($email) {

        $query = "SELECT * FROM client WHERE email = :email";

        $resultset = $this->_bd->prepare($query);

        $resultset->bindValue(':email', $email);

        $resultset->execute();

        return $resultset->fetch(PDO::FETCH_OBJ);
    }

    public function getClient($email, $mot_de_passe) {

    try {
        $query = "SELECT * FROM get_client(:email, :mot_de_passe)";

        $resultset = $this->_bd->prepare($query);

        $resultset->bindValue(':email', $email);
        $resultset->bindValue(':mot_de_passe', $mot_de_passe);

        $resultset->execute();

        return $resultset->fetch(PDO::FETCH_OBJ);

    } catch(PDOException $e) {
        print $e->getMessage();
        return null;
    }
    }
}