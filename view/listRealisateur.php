<?php ob_start(); ?>

<table class="uk-table uk-table-striped">
    <thead>
        <tr>
            <th>NOM</th>
            <th>PRENOM</th>
            <th>SEXE</th>
            <th>DATE DE NAISSANCE</th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach($requete->fetchAll() as $acteur) { ?>
        <tr>
            <td><a href="index.php?action=detailRealisateur&id=<?= $acteur["id_realisateur"] ?>"><?= $acteur["nom"] ?></a></td>
            <td><a href="index.php?action=detailRealisateur&id=<?= $acteur["id_realisateur"] ?>"><?= $acteur["prenom"] ?></a></td>
            <td><a href="index.php?action=detailRealisateur&id=<?= $acteur["id_realisateur"] ?>"><?= $acteur["sexe"] ?></a></td>
            <td><a href="index.php?action=detailRealisateur&id=<?= $acteur["id_realisateur"] ?>"><?= $acteur["date"] ?></a></td>
        </tr>
        <?php } ?>
    </tbody>
</table>

<?php

$titre = "Liste des acteurs";
$titre_secondaire = "Liste des acteurs";
$contenu = ob_get_clean();
require "view/template.php";