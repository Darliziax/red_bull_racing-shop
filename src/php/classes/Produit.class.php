<?php

class Produit {

    private $id_produit;
    private $nom;
    private $description;
    private $prix;
    private $stock;
    private $image;
    private $id_categorie;

    public function __construct(
        $id_produit = null,
        $nom = null,
        $description = null,
        $prix = null,
        $stock = null,
        $image = null,
        $id_categorie = null
    ) {
        $this->id_produit = $id_produit;
        $this->nom = $nom;
        $this->description = $description;
        $this->prix = $prix;
        $this->stock = $stock;
        $this->image = $image;
        $this->id_categorie = $id_categorie;
    }

    public function getIdProduit() { return $this->id_produit; }
    public function getNom() { return $this->nom; }
    public function getDescription() { return $this->description; }
    public function getPrix() { return $this->prix; }
    public function getStock() { return $this->stock; }
    public function getImage() { return $this->image; }
    public function getIdCategorie() { return $this->id_categorie; }

    public function setIdProduit($id_produit) { $this->id_produit = $id_produit; }
    public function setNom($nom) { $this->nom = $nom; }
    public function setDescription($description) { $this->description = $description; }
    public function setPrix($prix) { $this->prix = $prix; }
    public function setStock($stock) { $this->stock = $stock; }
    public function setImage($image) { $this->image = $image; }
    public function setIdCategorie($id_categorie) { $this->id_categorie = $id_categorie; }
}