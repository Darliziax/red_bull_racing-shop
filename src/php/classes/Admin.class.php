<?php

class Admin {

    private $id_admin;
    private $nom_admin;
    private $password;
    private $statut;

    public function __construct(
        $id_admin = null,
        $nom_admin = null,
        $password = null,
        $statut = null
    ) {
        $this->id_admin = $id_admin;
        $this->nom_admin = $nom_admin;
        $this->password = $password;
        $this->statut = $statut;
    }

    public function getIdAdmin() {
        return $this->id_admin;
    }

    public function setIdAdmin($id_admin) {
        $this->id_admin = $id_admin;
    }

    public function getNomAdmin() {
        return $this->nom_admin;
    }

    public function setNomAdmin($nom_admin) {
        $this->nom_admin = $nom_admin;
    }

    public function getPassword() {
        return $this->password;
    }

    public function setPassword($password) {
        $this->password = $password;
    }

    public function getStatut() {
        return $this->statut;
    }

    public function setStatut($statut) {
        $this->statut = $statut;
    }
}