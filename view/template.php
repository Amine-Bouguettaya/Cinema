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
    <header class="scrollTop">
        <div id="topNav">
            <div class="nameContainer">
                <i class="fa-solid fa-film"></i>
                <a href="index.php" id="navTitle">CINEMA</a>
            </div>
            <nav>
                <a href="index.php?action=listFilms" name="listFilms" class="navLink">Liste des films</a>
                <a href="index.php?action=listActeurs" name="listActeurs" class="navLink">Liste des acteurs</a>
                <a href="index.php?action=listRealisateur" name="listRealisateur" class="navLink">Liste des réalisateurs</a>
                <a href="index.php?action=listGenre" name="listGenre" class="navLink">Liste des genres</a>
            </nav>
        </div>
    </header>
    <section id="mainSection">
        <h1>Template</h1>
        <h1> <?= $titre_secondaire ?> </h1>
        <?= $contenu ?>
    </section>
</body>
</html>