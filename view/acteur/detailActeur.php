<?php ob_start(); 
$infoActeur = $requete->fetch();
?>

<div>
    <span><?= $infoActeur["nomprenom"] ?></span>
    <span><?= $infoActeur["sexe"] ?></span>
    <span><?= $infoActeur["date"] ?></span>
</div>

<?php foreach($requete2 as $film) { ?>
    <div>
        <span>role: <?= $film["nom_role"] ?></span>
        <span><a href="index.php?action=detailFilm&id=<?= $film["id_film"] ?>"><?= $film["titre"] ?></a></span>
        <span><a href="index.php?action=detailFilm&id=<?= $film["id_film"] ?>"><?= $film["annee_sortie"] ?></a></span>
    </div>
<?php } ?>

<?php

$titre = "Detail acteur";
$titre_secondaire = "detail acteur";
$contenu = ob_get_clean();
require "view/template.php";