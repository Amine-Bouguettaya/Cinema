<?php ob_start();

$temp = $requete3->fetch();

$genreFilm = $requete4->fetchAll();

function genreChecker($allGenreId, $genreIds) {
    foreach($genreIds as $genreId) {
        if ($genreId["id_genre"] == $allGenreId) {
            return "checked";
        }
    }
}

function realisateurChecker($idReaList, $idReaFilm) {
    if ($idReaFilm == $idReaList) {
        return "selected='selected'";
    }
}
?>

<div style="display: flex; justify-content: center;">
<form action="index.php?action=updateFilmTraitement&id=<?=$temp["id_film"]?>" method = "POST" enctype="multipart/form-data" id="addFilm" style="display: flex; flex-direction: column; width: 300px">
    <label for="titre">Modifier le titre</label>
    <input type="text" id="titre" name="titre" value="<?= $temp["titre"] ?>">
    <label for="annee">Modifier l'année de sortie</label>
    <input type="text" id="annee" name="annee" value="<?= $temp["annee_sortie"] ?>">
    <label for="duree">Modifier la durée (en minute)</label>
    <input type="text" id="duree" name="duree" value="<?= $temp["duree"] ?>">
    <label for="resumer">Modifier le resumé</label>
    <input type="text" id="resumer" name="resumer" value="<?= $temp["resumer"] ?>">
    <label for="note">Modifier la note</label>
    <input type="text" id="note" name="note" value="<?= $temp["note"] ?>">

    <span>genre:</span>
    <br>
    <br>
    <?php
        foreach($requete2->fetchAll() as $genre) { ?>
        <div class="checkboxContainer">
            <label for="listGenres[]"><?= $genre["nom_genre"] ?></label>
            <input type="checkbox" name="listGenres[]" value="<?= $genre["id_genre"]?>" <?= genreChecker($genre["id_genre"], $genreFilm) ?>>
        </div>
        <?php } ?>
    <select name="realisateur" id="realisateur">
    <?php
        foreach($requete->fetchAll() as $realisateur) { ?>
            <option value="<?= $realisateur["id_realisateur"]?>" <?= realisateurChecker($realisateur["id_realisateur"], $temp["id_realisateur"]) ?>><?= $realisateur["identite"]?></option>
        <?php } ?>
    </select>
    <br>
    <input type="submit" name="submit" value="Modifier le film">
</form>
</div>

<?php

$titre = "update du film";
$titre_secondaire = "update du film";
$contenu = ob_get_clean();
require "view/template.php";
