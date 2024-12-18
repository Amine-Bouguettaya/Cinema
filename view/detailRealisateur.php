<?php ob_start(); 
$infoRealisateur = $requete2->fetch();
?>

<div>
    <span><?= $infoRealisateur["nom"] ?></span>
    <span><?= $infoRealisateur["prenom"] ?></span>
</div>
<?php foreach($requete as $film) { ?>
    <div>
    <span><a href="index.php?action=detailFilm&id=<?= $film["id_film"] ?>"><?= $film["titre"] ?></a></span>
    <span><a href="index.php?action=detailFilm&id=<?= $film["id_film"] ?>"><?= $film["annee_sortie"] ?></a></span>
    </div>
<?php } ?>

<?php

$titre = "Detail du Realisateur";
$titre_secondaire = "Detail du réalisateur";
$contenu = ob_get_clean();
require "view/template.php";