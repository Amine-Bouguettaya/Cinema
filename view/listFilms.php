<?php ob_start();
$temp = $requete->fetchall();
?>

<p class="uk-label uk-label-warning"> Il y a <?= count($temp) ?> films</p>
<div class="movie-section">
    <div class="movie-grid">
        <?php foreach($temp as $film) {?>
            <div class="movie-card">
                <img src="<?php if ($film["image_film"]) {echo $film["image_film"] ;} else {
                    echo "public/image/placeholder.svg?height=350&width=250";
                } ?>" alt="Jamais sans mon psy">
                <div class="movie-info">
                    <a href="index.php?action=detailFilm&id=<?=$film["id_film"]?>" class="movie-title"><?=$film["titre"] ?></a>
                    <a href="index.php?action=detailFilm&id=<?=$film["id_realisateur"]?>" class="movie-director">de <?=$film["indentite"]?></a>
                </div>
            </div>
            <?php } ?>
    </div>
    </div>

<?php

$titre = "Liste des films";
$titre_secondaire = "Liste des films";
$contenu = ob_get_clean();
require "view/template.php";