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
        </nav>
    </header>
    <section class="hero">
        <div class="hero-icon">🎬</div>
        <h1>Votre répertoire de film et documentaire</h1>
    </section>
    <section class="movie-section">
        <h2 class="section-title">Sortie de la Semaine</h2>
        <div class="movie-grid">
            <div class="movie-card">
                <img src="/placeholder.svg?height=350&width=250" alt="Jamais sans mon psy">
                <div class="movie-info">
                    <div class="movie-title">Jamais sans mon psy</div>
                    <div class="movie-director">De Arnaud Lemort</div>
                </div>
            </div>
            <div class="movie-card">
                <img src="/placeholder.svg?height=350&width=250" alt="Le Seigneur des Anneaux">
                <div class="movie-info">
                    <div class="movie-title">Le Seigneur des Anneaux</div>
                    <div class="movie-director">De Peter Jackson</div>
                </div>
            </div>
            <div class="movie-card">
                <img src="/placeholder.svg?height=350&width=250" alt="Saint-Ex">
                <div class="movie-info">
                    <div class="movie-title">Saint-Ex</div>
                    <div class="movie-director">De Pablo Agüero</div>
                </div>
            </div>
        </div>
        <a href="#" class="see-more">Voir plus de film</a>
    </section>

    <section class="movie-section">
        <h2 class="section-title">Toujours à l'affiche</h2>
        <div class="movie-grid">
            <div class="movie-card">
                <img src="/placeholder.svg?height=350&width=250" alt="En Fanfare">
                <div class="movie-info">
                    <div class="movie-title">En Fanfare</div>
                    <div class="movie-director">De Emmanuel Courcol</div>
                </div>
            </div>
            <div class="movie-card">
                <img src="/placeholder.svg?height=350&width=250" alt="Vaiana 2">
                <div class="movie-info">
                    <div class="movie-title">Vaiana 2</div>
                    <div class="movie-director">De David G. Derrick Jr.</div>
                </div>
            </div>
            <div class="movie-card">
                <img src="/placeholder.svg?height=350&width=250" alt="Gladiator 2">
                <div class="movie-info">
                    <div class="movie-title">Gladiator 2</div>
                    <div class="movie-director">De Ridley Scott</div>
                </div>
            </div>
        </div>
        <a href="#" class="see-more">Voir plus de film</a>
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