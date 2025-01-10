<?php

namespace Controller;
use Model\Connect;

class CinemaController {
    
    // Lister les films

    public function listFilms() {
        $pdo = Connect::seConnecter();
        $requete = $pdo->query("SELECT id_film, titre, annee_sortie, image_film, CONCAT(nom,' ',prenom) AS indentite, f.id_realisateur FROM film f INNER JOIN realisateur r ON f.id_realisateur = r.id_realisateur INNER JOIN personne p ON r.id_personne = p.id_personne");
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
    public function updateFilm($id) {
        $pdo = Connect::seConnecter();

        $requete3 = $pdo->prepare("SELECT id_film, f.titre, f.annee_sortie, f.duree, f.resumer, f.note, f.id_realisateur FROM film f WHERE f.id_film = :id");
        $requete3->execute(["id" => $id]);

        $requete = $pdo->query("SELECT r.id_realisateur, CONCAT(p.nom, ' ', p.prenom) AS identite FROM realisateur r INNER JOIN personne p ON r.id_personne = p.id_personne");
        $requete2 = $pdo->query("SELECT g.id_genre, nom_genre FROM genre g");

        $requete4 = $pdo->prepare("SELECT gf.id_genre FROM film f INNER JOIN genre_film gf ON f.id_film = gf.id_film WHERE f.id_film = :id");
        $requete4->execute(["id" => $id]);

        require "view/film/updateFilm.php";
    }
    public function updateFilmTraitement($id) {
        if(isset($_POST["submit"])) {

            $titre = filter_input(INPUT_POST, "titre", FILTER_SANITIZE_SPECIAL_CHARS);
            $annee = filter_input(INPUT_POST, "annee", FILTER_VALIDATE_INT);
            $duree = filter_input(INPUT_POST, "duree", FILTER_VALIDATE_INT);
            $resumer = filter_input(INPUT_POST, "resumer", FILTER_SANITIZE_SPECIAL_CHARS);
            $note = filter_input(INPUT_POST, "note", FILTER_VALIDATE_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
            $realisateur = filter_input(INPUT_POST, "realisateur", FILTER_VALIDATE_INT);

            if ($titre && $annee && $duree && $resumer && $note && $realisateur) {
                    
                $pdo = Connect::seConnecter();

                $requete = $pdo->prepare("UPDATE film SET titre = :titre, annee_sortie = :annee, duree = :duree, resumer = :resumer, note = :note, id_realisateur = :realisateur WHERE id_film = :id");
                $requete->execute(["titre" => $titre, "annee" => $annee, "duree" => $duree, "resumer" => $resumer, "note" => $note, "realisateur" => $realisateur, "id" => $id]);
            }
        }

        $requete3 = $pdo->prepare("DELETE FROM genre_film WHERE id_film = :id");
        $requete3->execute(["id" => $id]);

        if (isset($_POST["listGenres"])) {
            $listGenres = $_POST["listGenres"];
            foreach ($listGenres as $genre) {
                $requete2 = $pdo->prepare("INSERT INTO genre_film (id_film, id_genre) VALUE (:id_film, :id_genre)");
                $requete2->execute(["id_film" => $id, "id_genre" => $genre]);
            }
        }
        header("location:index.php?action=detailFilm&id=".$id);
    }

    public function deleteFilm($id) {

        $pdo = Connect::seConnecter();

        $requete = $pdo->prepare("SELECT id_film, titre FROM film WHERE id_film = :id");
        $requete->execute(["id" => $id]);
        require "view/film/deleteFilm.php";
    }
    public function deleteFilmTraitement($id) {
        $pdo = Connect::seConnecter();

        $requete4 = $pdo->prepare("SELECT image_film FROM Film WHERE id_film = :id");
        $requete4->execute(["id" => $id]);

        $temp = $requete4->fetch();
        if (file_exists($temp["image_film"])) {
            unlink($temp["image_film"]);
        }

        $requete = $pdo->prepare("DELETE FROM casting WHERE id_film = :id");
        $requete->execute(["id" => $id]);

        $requete2 = $pdo->prepare("DELETE FROM genre_film WHERE id_film = :id");
        $requete2->execute(["id" => $id]);

        $requete3 = $pdo->prepare("DELETE FROM film WHERE id_film = :id");
        $requete3->execute(["id" => $id]);

        header("location:index.php?action=listFilms");
    }
    public function addFilm() {

        $pdo = Connect::seConnecter();

        $requete = $pdo->query("SELECT r.id_realisateur, CONCAT(p.nom, ' ', p.prenom) AS identite FROM realisateur r INNER JOIN personne p ON r.id_personne = p.id_personne");
        $requete2 = $pdo->query("SELECT g.id_genre, nom_genre FROM genre g");

        require "view/film/addFilm.php";
    }
    // public function addMovie(): void
    // {
    //     $session = new Session();

    //     if ($session->isAdmin()) {

    //         $pdo = Connect::toLogIn();

    //         $requestDirectors = $pdo->query("
    //     SELECT director.idDirector, person.firstname, person.surname
    //     FROM director
    //     INNER JOIN person ON director.idPerson = person.idPerson
    //     ORDER BY surname
    //     ");

    //         $requestThemes = $pdo->query("
    //     SELECT theme.idTheme, theme.typeName
    //     FROM theme
    //     ORDER BY typeName
    //     ");

    //         if (isset($_POST['submit'])) { // Vérifie si le formulaire a été soumis

    //             $title = filter_input(INPUT_POST, "title", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    //             $releaseYear = filter_input(INPUT_POST, "releaseYear", FILTER_VALIDATE_INT);
    //             $duration = filter_input(INPUT_POST, "duration", FILTER_VALIDATE_INT);
    //             $note = filter_input(INPUT_POST, "note", FILTER_VALIDATE_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
    //             $synopsis = filter_input(INPUT_POST, "synopsis", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    //             $director = filter_input(INPUT_POST, "idDirector", FILTER_SANITIZE_NUMBER_INT);

    //             if (isset($_FILES['file'])) {
    //                 $tmpName = $_FILES['file']['tmp_name'];
    //                 $name = $_FILES['file']['name'];
    //                 $size = $_FILES['file']['size'];
    //                 $error = $_FILES['file']['error'];
    //                 $type = $_FILES['file']['type'];

    //                 $tabExtension = explode('.', $name);
    //                 $extension = strtolower(end($tabExtension));

    //                 // Tableau des extensions qu'on autorise
    //                 $allowedExtensions = ['jpg', 'png', 'jpeg', 'webp'];
    //                 $maxSize = 100000000;

    //                 if (in_array($extension, $allowedExtensions) && $size <= $maxSize && $error == 0) {

    //                     $uniqueName = uniqid('', true);
    //                     $file = $uniqueName . '.' . $extension;

    //                     move_uploaded_file($tmpName, "public/img/movies/" . $file);

    //                     // Conversion en webp
    //                     // Création de mon image en doublon en chaine de caractères
    //                     $posterSource = imagecreatefromstring(file_get_contents("public/img/movies/" . $file));
    //                     // Récupération du chemin de l'image
    //                     $webpPath = "public/img/movies/" . $uniqueName . ".webp";
    //                     // Conversion en format webp
    //                     imagewebp($posterSource, $webpPath);
    //                     // Suppression de l'ancienne image
    //                     unlink("public/img/movies/" . $file);
    //                 } else {
    //                     echo "Wrong extension or file size too large or error !";
    //                 }
    //             }

    //             $poster = isset($webpPath) ? $webpPath : "public/img/movies/default.webp";

    //             $requestAddMovie = $pdo->prepare("
    //         INSERT INTO movie (title, releaseYear, duration, note, synopsis, poster, idDirector)
    //         VALUES (:title, :releaseYear, :duration, :note, :synopsis, :poster, :idDirector)
    //         ");

    //             $requestAddMovie->execute([
    //                 "title" => $title,
    //                 "releaseYear" => $releaseYear,
    //                 "duration" => $duration,
    //                 "note" => $note,
    //                 "synopsis" => $synopsis,
    //                 "poster" => $poster,
    //                 "idDirector" => $director
    //             ]);

    //             $movieId = $pdo->lastInsertId();

    //             foreach ($_POST['theme'] as $theme) {

    //                 $theme = filter_var($theme, FILTER_VALIDATE_INT);

    //                 $requestAddMovieTheme = $pdo->prepare("
    //             INSERT INTO movie_theme (idMovie, idTheme)
    //             VALUES(:idMovie, :idTheme)
    //             ");

    //                 $requestAddMovieTheme->execute([
    //                     "idMovie" => $movieId,
    //                     "idTheme" => $theme
    //                 ]);
    //             }

    //             // Redirection vers la page 'index.php?action=listMovies' après le traitement du formulaire
    //             header("Location:index.php?action=listMovies");
    //             $_SESSION['message'] = "<div class='alert'>Movie added successfully !</div>";
    //             exit;
    //         }

    //         require "view/movies/addMovie.php";
    //     } else {
    //         header("Location:index.php");
    //         exit;
    //     }
    // }

    public function addFilmTraitement() {
        if(isset($_POST["submit"])) {

            $titre = filter_input(INPUT_POST, "titre", FILTER_SANITIZE_SPECIAL_CHARS);
            $annee = filter_input(INPUT_POST, "annee", FILTER_VALIDATE_INT);
            $duree = filter_input(INPUT_POST, "duree", FILTER_VALIDATE_INT);
            $resumer = filter_input(INPUT_POST, "resumer", FILTER_SANITIZE_SPECIAL_CHARS);
            $note = filter_input(INPUT_POST, "note", FILTER_VALIDATE_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
            $realisateur = filter_input(INPUT_POST, "realisateur", FILTER_VALIDATE_INT);

            if (isset($_FILES["fileToUpload"])) {
                $target_directory = "public/image/film/";
                $target_file = $target_directory.basename($_FILES["fileToUpload"]["name"]);
                $isUploadOk = 1;
                $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
                $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
                if ($check !== false) {
                    echo $target_file;
                    echo "file is an image - ".$check["mime"].".";
                    $isUploadOk = 1;
                } else {
                    echo "File is not an image.";
                    $isUploadOk = 0;
                }
                if (file_exists($target_file)) {
                    echo "Sorry, file already exists.";
                    $isUploadOk = 0;
                  }
                if ($_FILES["fileToUpload"]["size"] > 500000) {
                    echo "Sorry, your file is too large.";
                    $IsUploadOk = 0;
                }
                if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "webp" ) {
                    echo "Sorry, only JPG, JPEG, PNG & webp files are allowed.";
                    $IsUploadOk = 0;
                }
                if ($isUploadOk == 0) {
                    echo "Sorry, your file was not uploaded.";
                  // if everything is ok, try to upload file
                  } else {
                    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                      echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
                    } else {
                      echo "Sorry, there was an error uploading your file.";
                    }
                  }
            } else {
                echo "error";
            }

            if ($titre && $annee && $duree && $resumer && $note && $realisateur) {
                
                $pdo = Connect::seConnecter();

                $requete = $pdo->prepare("INSERT INTO film (titre, annee_sortie, duree, resumer, note, id_realisateur, image_film) VALUE (:titre , :annee , :duree , :resumer ,:note ,:realisateur, :image_film)");
                $requete->execute(["titre" => $titre, "annee" => $annee, "duree" => $duree, "resumer" => $resumer, "note" => $note, "realisateur" => $realisateur, "image_film" => $target_file]);
            }
        }
        $temp = $pdo->lastinsertid();
        if (isset($_POST["listGenres"])) {
            $listGenres = $_POST["listGenres"];
            foreach ($listGenres as $genre) {
                $requete2 = $pdo->prepare("INSERT INTO genre_film (id_film, id_genre) VALUE (:id_film, :id_genre)");
                $requete2->execute(["id_film" => $temp, "id_genre" => $genre]);
            }
        }
        header("location:index.php?action=listFilms");
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

    public function detailGenre($id) {
        $pdo = Connect::seConnecter();

        $requete = $pdo->prepare("SELECT f.id_film, f.titre, f.annee_sortie FROM genre g INNER JOIN genre_film gf ON g.id_genre = gf.id_genre INNER JOIN film f ON gf.id_film = f.id_film WHERE g.id_genre = :idgenre");
        $requete->execute(["idgenre" => $id]);
        require "view/detailGenre.php";
    }
}