<?php

namespace Controller;
use Model\Connect;

class PersonneController {

    public function listActeurs() {

        $pdo = Connect::seConnecter();

        $requete = $pdo->query("SELECT a.id_acteur, p.nom, p.prenom, p.sexe, p.date, p.personne_photo FROM acteur a INNER JOIN personne p ON a.id_personne = p.id_personne");

        require "view/listActeur.php";
    }
    public function listRealisateur() {

        $pdo = Connect::seConnecter();

        $requete = $pdo->query("SELECT r.id_realisateur, p.nom, p.prenom, p.sexe, p.date, p.personne_photo FROM realisateur r INNER JOIN personne p ON r.id_personne = p.id_personne");

        require "view/listRealisateur.php";
    }

    public function detailRealisateur($id) {

        $pdo = Connect::seConnecter();

        $requete = $pdo->prepare("SELECT f.id_film, f.titre, f.annee_sortie FROM film f INNER JOIN realisateur r ON f.id_realisateur = r.id_realisateur WHERE r.id_realisateur = :id");
        $requete->execute(["id" => $id]);

        $requete2 = $pdo->prepare("SELECT p.nom , p.prenom, p.sexe, p.personne_photo FROM realisateur r INNER JOIN personne p ON r.id_personne = p.id_personne WHERE r.id_realisateur = :id");
        $requete2->execute(["id" => $id]);

        require "view/detailRealisateur.php";
    }

    public function detailActeur($id) {

        $pdo = Connect::seConnecter();

        $requete = $pdo->prepare("SELECT CONCAT(p.nom, ' ', p.prenom) AS nomprenom, p.sexe, p.date, p.personne_photo from acteur a INNER JOIN personne p ON a.id_personne = p.id_personne WHERE id_acteur = :id");
        $requete->execute(["id" => $id]);

        $requete2 = $pdo->prepare("SELECT f.id_film, f.titre, r.nom_role, f.annee_sortie FROM film f INNER JOIN casting c ON f.id_film = c.id_film INNER JOIN ROLE r ON c.id_role = r.id_role INNER JOIN acteur a ON c.id_acteur = a.id_acteur INNER JOIN personne p ON a.id_personne = p.id_personne WHERE a.id_acteur = :id ORDER BY f.annee_sortie DESC;");
        $requete2->execute(["id" => $id]);

        require "view/acteur/detailActeur.php";
    }
    public function addCasting($id_film) {
        $pdo = Connect ::seConnecter();

        $requete = $pdo->query("SELECT a.id_acteur, CONCAT(p.nom,' ',p.prenom) AS identite FROM acteur a INNER JOIN personne p ON a.id_personne = p.id_personne");
        $requete2 = $pdo->query("SELECT id_role, nom_role FROM role");

        require "view/film/addCasting.php";
    }
    public function addCastingTraitement($id_film) {
        $pdo = Connect ::seConnecter();
        if(isset($_POST["submit"])) {
            $requete = $pdo->prepare("INSERT INTO casting (id_film, id_acteur, id_role) VALUE (:id_film, :id_acteur, :id_role)");
            $requete->execute(["id_film" => $id_film, "id_acteur" => $_POST["addcasting"], "id_role" => $_POST["role"]]);
        }
        header("location:index.php?action=detailFilm&id=".$id_film."");
    }
}