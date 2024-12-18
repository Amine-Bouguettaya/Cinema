<?php

namespace Controller;
use Model\Connect;

class CinemaController {
    
    // Lister les films

    public function listFilms() {
        $pdo = Connect::seConnecter();
        $requete = $pdo->query("SELECT id_film, titre, annee_sortie FROM film");
        require "./view/listFilms.php";
    }

    public function detailFilm($id) {

        $pdo = Connect::seConnecter();

        $requete = $pdo->prepare("SELECT id_film, f.titre, f.annee_sortie, SUBSTRING(SEC_TO_TIME(f.duree * 60), 1, 5) AS duree, CONCAT(p.nom, ' ', p.prenom) AS realisateur, f.id_realisateur FROM film f INNER JOIN realisateur r ON f.id_realisateur = r.id_realisateur INNER JOIN personne p ON r.id_personne = p.id_personne WHERE f.id_film = :id");
        $requete->execute(["id" => $id]);

        $requete2 = $pdo->prepare("SELECT CONCAT(p.nom, ' ', p.prenom) AS nomprenom , p.prenom, p.sexe, c.id_acteur FROM film f INNER JOIN casting c ON f.id_film = c.id_film INNER JOIN acteur a ON c.id_acteur = a.id_acteur INNER JOIN personne p ON a.id_personne = p.id_personne WHERE f.id_film = :id");
        $requete2->execute(["id" => $id]);

        require "view/film/detailFilm.php";
    }

    public function listActeurs() {

        $pdo = Connect::seConnecter();

        $requete = $pdo->query("SELECT a.id_acteur, p.nom, p.prenom, p.sexe, p.date FROM acteur a INNER JOIN personne p ON a.id_personne = p.id_personne");

        require "view/listActeur.php";
    }
    public function listRealisateur() {

        $pdo = Connect::seConnecter();

        $requete = $pdo->query("SELECT r.id_realisateur, p.nom, p.prenom, p.sexe, p.date FROM realisateur r INNER JOIN personne p ON r.id_personne = p.id_personne");

        require "view/listRealisateur.php";
    }

    public function detailRealisateur($id) {

        $pdo = Connect::seConnecter();

        $requete = $pdo->prepare("SELECT f.id_film, f.titre, f.annee_sortie FROM film f INNER JOIN realisateur r ON f.id_realisateur = r.id_realisateur WHERE r.id_realisateur = :id");
        $requete->execute(["id" => $id]);

        $requete2 = $pdo->prepare("SELECT p.nom , p.prenom, p.sexe FROM realisateur r INNER JOIN personne p ON r.id_personne = p.id_personne WHERE r.id_realisateur = :id");
        $requete2->execute(["id" => $id]);

        require "view/detailRealisateur.php";
    }

    public function detailActeur($id) {

        $pdo = Connect::seConnecter();

        $requete = $pdo->prepare("SELECT CONCAT(p.nom, ' ', p.prenom) AS nomprenom, p.sexe, p.date from acteur a INNER JOIN personne p ON a.id_personne = p.id_personne WHERE id_acteur = :id");
        $requete->execute(["id" => $id]);

        $requete2 = $pdo->prepare("SELECT f.id_film, f.titre, r.nom_role, f.annee_sortie FROM film f INNER JOIN casting c ON f.id_film = c.id_film INNER JOIN ROLE r ON c.id_role = r.id_role INNER JOIN acteur a ON c.id_acteur = a.id_acteur INNER JOIN personne p ON a.id_personne = p.id_personne WHERE a.id_acteur = :id ORDER BY f.annee_sortie DESC;");
        $requete2->execute(["id" => $id]);

        require "view/acteur/detailActeur.php";
    }

    public function listGenre() {
        $pdo = Connect::seConnecter();

        $requete = $pdo->query("SELECT g.id_genre, g.nom_genre FROM genre g");
        require "view/listGenre.php";
    }
    
    public function addGenre() {
        
        if(isset($_POST["submit"])) {
            $name_genre = filter_input(INPUT_POST, "genre", FILTER_SANITIZE_SPECIAL_CHARS);
            if($name_genre) {
                $pdo = Connect::seConnecter();

                $requete = $pdo->prepare("INSERT INTO genre (nom_genre) VALUE (:nameGenre)");
                $requete->execute(["nameGenre" => $name_genre]);
            }
        }
        header('location:index.php?action=listGenre');
    }
}