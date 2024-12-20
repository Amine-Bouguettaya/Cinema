<?php ob_start(); ?>

<p class="uk-label uk-label-warning"> Il y a <?php $requete->rowCount() ?> films</p>
<div style="display: flex; justify-content: center;">
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
</div>
<br>
<br>
<a href="index.php?action=addFilm" name="addFilm" class="button">Ajouter un films</a>

<?php

$titre = "Liste des films";
$titre_secondaire = "Liste des films";
$contenu = ob_get_clean();
require "view/template.php";