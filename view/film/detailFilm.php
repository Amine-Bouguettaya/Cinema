<?php ob_start(); 
$temp = $requete->fetch();
?>

<div>
    <span><?= $temp["titre"] ?></span>
    <span><?= $temp["annee_sortie"] ?></span>
    <span><?= $temp["duree"] ?></span>
    <a href="index.php?action=detailRealisateur&id=<?= $temp["id_realisateur"] ?>"><span><?= $temp["realisateur"] ?></span></a>
    <br>
    <br>
    <?php foreach ($requete2->fetchAll() as $casting) { ?>
        <a href="index.php?action=detailActeur&id=<?= $casting["id_acteur"] ?>"><span><?= $casting["nomprenom"] ?></span></a>
    <span><?= $casting["sexe"] ?></span>
    <br>
<?php } ?>
</div>
<br>
<div>
    <a href="index.php?action=addCasting&id=<?= $temp["id_film"] ?>" name="addCasting" class="button">Ajouter un casting</a>
    <a href="index.php?action=updateFilm&id=<?= $temp["id_film"] ?>" class="button">Modifier Film</a>
    <a href="index.php?action=deleteFilm&id=<?= $temp["id_film"] ?>" class="button">Supprimer Film</a>
</div>

<?php

$titre = "Detail du film";
$titre_secondaire = "Detail du film";
$contenu = ob_get_clean();
require "view/template.php";
