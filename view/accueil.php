<?php ob_start();

$titre = "CineScope";
$titre_secondaire = "Cinema";
$contenu = ob_get_clean();


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./public/style.css">
    <link href='https://fonts.googleapis.com/css?family=Kanit' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title><?= $titre ?></title>
</head>
<body>
    <header class="header">
        <a href="index.php" class="logo">CineScope</a>
        <div class="search-bar">
            <input type="text" placeholder="Recherchez un film, un acteur...">
        </div>
        <nav class="nav-menu">
        <a href="index.php?action=listFilms" name="listFilms" class="navLink">Films</a>
                <a href="index.php?action=listActeurs" name="listActeurs" class="navLink">Acteurs</a>
                <a href="index.php?action=listRealisateur" name="listRealisateur" class="navLink">Réalisateurs</a>
                <a href="index.php?action=listGenre" name="listGenre" class="navLink">Genres</a>
                <a href="index.php?action=addFilm" name="addFilm" class="navLink">Ajouter un Film</a>
        </nav>
    </header>
    <section class="hero">
        <div class="hero-icon">🎬</div>
        <h1>Votre répertoire de film et documentaire</h1>
    </section>
    <section class="movie-section">
        <h2 class="section-title">Sortie de la Semaine</h2>
        <div class="movie-grid">
            <?php foreach($requete->fetchall() as $film) {?>
            <div class="movie-card">
                <img src="<?php if ($film["image_film"]) {echo $film["image_film"] ;} else {
                    echo "public/image/placeholder.svg?height=350&width=250";
                } ?>" alt="Jamais sans mon psy">
                <div class="movie-info">
                    <div class="movie-title"><?=$film["titre"] ?></div>
                    <div class="movie-director">de <?=$film["indentite"]?></div>
                </div>
            </div>
            <?php } ?>
        </div>
        <a href="index.php?action=listFilms" class="see-more">Voir plus de film</a>
    </section>

    <section class="movie-section">
        <h2 class="section-title">Toujours à l'affiche</h2>
        <div class="movie-grid">
        <?php foreach($requete2->fetchall() as $film) {?>
            <div class="movie-card">
                <img src="<?php if ($film["image_film"]) {echo $film["image_film"] ;} else {
                    echo "public/image/placeholder.svg?height=350&width=250";
                } ?>" alt="Jamais sans mon psy">
                <div class="movie-info">
                    <div class="movie-title"><?=$film["titre"] ?></div>
                    <div class="movie-director">de <?=$film["indentite"]?></div>
                </div>
            </div>
            <?php } ?>
        </div>
        <a href="index.php?action=listFilms" class="see-more">Voir plus de film</a>
    </section>

    <footer>
        <div class="footerContainer">
            <div class="socialsContainer">
                <div class="iconContainer">
                    <a href="#" target="_blank"><i class="fa-brands fa-facebook"></i></a>
                </div>
                <div class="iconContainer">
                    <a href="#" target="_blank"><i class="fa-brands fa-twitter"></i></a>
                </div>
                <div class="iconContainer">
                    <a href="#" target="_blank"><i class="fa-brands fa-linkedin"></i></a>
                </div>
                <div class="iconContainer">
                    <a href="#" target="_blank"><i class="fa-brands fa-google-plus-g"></i></a>
                </div>
            </div>
            <div class="tosContainer">
                <a href="#">Terms & Condition</a>
                <span>|</span>
                <a href="#">Privacy Policy</a>
                <span>|</span>
                <a href="#scrollTop">Contact Us</a>
            </div>
            <p>2025 © CineScope - CineScope by  Amine</p>
        </div>
    </footer>
</body>
</html>