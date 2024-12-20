<?php
namespace Controller;
use Model\Connect;

class HomeController {
    
    public function home() {
        // $pdo = Connect::seConnecter();
        require "./view/accueil.php";   
    }
}
