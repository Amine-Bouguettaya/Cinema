<?php
use Controller\CinemaController;
use Controller\HomeController;
use Controller\PersonneController;

spl_autoload_register(function ($class_name) {
    include $class_name . '.php';
});

$ctrlCinema = new CinemaController();
$ctrlHome = new HomeController();
$ctrlPersonne = new PersonneController();

// $id = ce qu'on recip dans l'url

if (isset($_GET["action"])) {
    switch ($_GET["action"]) {
        case "listFilms":
            $ctrlCinema->listFilms();
            // $ctrlHome->home();
            break;
        case "detailFilm":
            $ctrlCinema->detailFilm($_GET["id"]);
            break;
        case "addFilm":
            $ctrlCinema->addFilm();
            break;
        case "addFilmTraitement":
            $ctrlCinema->addFilmTraitement();
            break;
        case 'addCasting':
            $ctrlPersonne->addCasting($_GET["id"]);
            break;
        case "addCastingTraitement":
            $ctrlPersonne->addCastingTraitement($_GET["id"]);
            break;
        case 'listGenre':
            $ctrlCinema->listGenre();
            break;
        case "addGenre":
            $ctrlCinema->addGenre();
            break;
        case "listActeurs":
            $ctrlPersonne->listActeurs();
            break;
        case "listRealisateur":
            $ctrlPersonne->listRealisateur();
            break;
        case "detailRealisateur":
            $ctrlPersonne->detailRealisateur($_GET["id"]);
            break;
        case "detailActeur":
            $ctrlPersonne->detailActeur($_GET["id"]);
            break;
    }
}
else {
    $ctrlHome->home();
    // $ctrlCinema->listFilms();
}

// ajouter un film
// aajouter une fonction ajout form acteur,
// fonction valide form
// insert personne > insert acteur 
// last insert id (php)
