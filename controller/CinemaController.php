<?php

namespace Controller;
use Model\Connect;

class CinemaController {
    
    // Lister les films

    public function listFilms() {
        $pdo = Connect::seConnecter();
        $requete = $dpo->query("SELECT titre, annee_sortie FROM film");
        require "view/listFilms.php";
    }
    public function detFilm($id) {
        $pdo = Connect::seConnecter();
        $requete = $pdo->prepare("SELECT titre, annee_sortie, ")
    }
    public function listActeurs() {
        $pdo = Connect::seConnecter();
        $requete = $dpo->query("SELECT name_acteur FROM acteur");
        require "view/listActeur.php";
    }
    public function detActeur($id) {
        $pdo = Connect::seConnecter();
        $requete = $pdo->prepare("SELECT * from acteur WHERE id_acteur = :id");
        $requete->execute(["id" +> $id]);
        require "view/acteur/detailActeur.php";
    }
}