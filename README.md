# Red Bull Racing Shop

Projet réalisé dans le cadre du cours **Technologies Internet 2**.

## Description

Red Bull Racing Shop est une application web développée en PHP orienté objet avec PostgreSQL.

L'application permet à un utilisateur de consulter un catalogue de produits Red Bull Racing, de créer un compte, de se connecter, de gérer son panier et de passer des commandes.

Une partie administration permet de gérer les produits du catalogue.

---

## Technologies utilisées

* PHP 8
* PostgreSQL
* HTML5
* CSS3
* Bootstrap 5
* JavaScript
* AJAX

---

## Architecture du projet

Le projet respecte l'arborescence recommandée pour les projets Technologies Internet 2 :

* Partie publique
* Partie administration
* Classes métier
* DAO
* Fichiers AJAX
* Ressources CSS, JavaScript et images
* Dump PostgreSQL

---

## Accès à l'application

### Partie publique

URL :

http://localhost/red_bull_racing_shop/index_.php

### Partie administration

URL :

http://localhost/red_bull_racing_shop/admin/index_.php

Identifiants administrateur :

* Login : admin
* Mot de passe : admin

---

## Fonctionnalités

### Partie publique

* Consultation du catalogue
* Filtrage par catégories
* Inscription client
* Connexion / Déconnexion
* Gestion du panier
* Modification des quantités
* Validation de commande
* Historique des commandes

### Partie administration

* Connexion administrateur
* Ajout de produits
* Modification de produits (AJAX)
* Suppression de produits (AJAX)

---

## Base de données

Le dump PostgreSQL est fourni dans le dossier :

backups/

Fichier :

red_bull_racing_shop.sql

---

## Auteur

Projet réalisé par :

Godart Ophélie

Année académique 2025-2026
