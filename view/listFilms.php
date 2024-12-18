<?php ob_start(); ?>

<p class="uk-label uk-label-warning"> Il y a <?php $requete->rowCount() ?> films</p>
<table class="uk-table uk-table-striped">
    <thead>
        <tr>
            <th>TITRE</th>
            <th>ANNEE SORTIE</th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach($requete->fetchAll() as $film) { ?>
        <tr>
            <td><a href="index.php?action=detailFilm&id=<?= $film["id_film"] ?>"><?= $film["titre"] ?></a></td>
            <td><a href="index.php?action=detailFilm&id=<?= $film["id_film"] ?>"><?= $film["annee_sortie"] ?></a></td>
        </tr>
        <?php } ?>
    </tbody>
</table>

<?php

$titre = "Liste des films";
$titre_secondaire = "Liste des films";
$contenu = ob_get_clean();
require "view/template.php";