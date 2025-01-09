<?php
namespace Controller;
use Model\Connect;

class HomeController {
    
    public function home() {
        $pdo = Connect::seConnecter();

        $requete = $pdo->prepare();
        require "./view/accueil.php";   
    }
}
