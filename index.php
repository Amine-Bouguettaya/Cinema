<?php
use Controller\CinemaController;
use Controller\HomeController;

spl_autoload_register(function ($class_name) {
    include $class_name . '.php';
});

$ctrlCinema = new CinemaController();
$ctrlHome = new HomeController();

// $id = ce qu'on recip dans l'url

if (isset($_GET["action"])) {
    switch ($_GET["action"]) {
        case "listFilms":
            $ctrlCinema->listFilms();
            // $ctrlHome->home();
            break;
        case "listActeurs":
            $ctrlCinema->listActeurs();
            break;
        case "listRealisateur":
            $ctrlCinema->listRealisateur();
            break;
        case "detailFilm":
            $ctrlCinema->detailFilm($_GET["id"]);
            break;
        case "detailRealisateur":
            $ctrlCinema->detailRealisateur($_GET["id"]);
            break;
        case "detailActeur":
            $ctrlCinema->detailActeur($_GET["id"]);
            break;
        case 'listGenre':
            $ctrlCinema->listGenre();
            break;
        case "addGenre":
            $ctrlCinema->addGenre();
            break;
    }
}
else {
    $ctrlHome->home();
    // $ctrlCinema->listFilms();
}
