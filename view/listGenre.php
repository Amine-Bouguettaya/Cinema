<?php ob_start();?>


<div class="movie-section">
    <div class="movie-grid">
        <?php foreach($requete->fetchAll() as $genre) { ?>
            <div class="movie-card">
                <img src="<?php if ($genre["image_genre"]) {echo $genre["image_genre"] ;} else {
                    echo "public/image/placeholder.svg?height=350&width=250";
                } ?>" alt="<?= $genre["nom_genre"]?>">
                <div class="movie-info">
                    <a href="index.php?action=detailGenre&id=<?= $genre["id_genre"]?>" class="movie-title"><?= $genre["nom_genre"]?></a>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>

<form action="index.php?action=addGenre" method = "post">
    <label for="genre">Ajouter un genre</label>
    <input type="text" id="genre" name="genre">
    <input type="submit" name="submit" value="Ajouter un genre">
</form>


<?php

$titre = "Liste des genre";
$titre_secondaire = "Liste des genre";
$contenu = ob_get_clean();
require "view/template.php";