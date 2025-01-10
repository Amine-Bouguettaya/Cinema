<?php
namespace Controller;
use Model\Connect;

class HomeController {
    
    public function home() {
        $pdo = Connect::seConnecter();

        $requete = $pdo->query("SELECT f.id_film, f.titre, f.id_realisateur, f.image_film, CONCAT(p.nom,' ',p.prenom) AS indentite FROM film f INNER JOIN realisateur r ON f.id_realisateur = r.id_realisateur INNER JOIN personne p ON r.id_personne = p.id_personne ORDER BY f.annee_sortie DESC LIMIT 3");
        $requete2 = $pdo->query("SELECT f.id_film, f.titre, f.id_realisateur, f.image_film, CONCAT(p.nom,' ',p.prenom) AS indentite FROM film f INNER JOIN realisateur r ON f.id_realisateur = r.id_realisateur INNER JOIN personne p ON r.id_personne = p.id_personne ORDER BY f.note DESC LIMIT 3");
        require "./view/accueil.php";   
    }
}
