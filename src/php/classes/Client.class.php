<?php

class Client {

    private $id_client;
    private $nom;
    private $prenom;
    private $email;
    private $mot_de_passe;

    public function __construct(
        $id_client = null,
        $nom = null,
        $prenom = null,
        $email = null,
        $mot_de_passe = null
    ) {
        $this->id_client = $id_client;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->email = $email;
        $this->mot_de_passe = $mot_de_passe;
    }

    public function getIdClient() {
        return $this->id_client;
    }

    public function getNom() {
        return $this->nom;
    }

    public function getPrenom() {
        return $this->prenom;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getMotDePasse() {
        return $this->mot_de_passe;
    }
}