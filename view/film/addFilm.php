<?php ob_start(); 
?>

<div style="display: flex; justify-content: center;">
<form action="index.php?action=addFilmTraitement" method = "POST" enctype="multipart/form-data" id="addFilm" style="display: flex; flex-direction: column; width: 300px">
    <label for="titre">Ajouter un titre</label>
    <input type="text" id="titre" name="titre">
    <label for="annee">Ajouter une année de sortie</label>
    <input type="text" id="annee" name="annee">
    <label for="duree">Ajouter une durée</label>
    <input type="text" id="duree" name="duree">
    <label for="resumer">Ajouter un resumé</label>
    <input type="text" id="resumer" name="resumer">
    <label for="note">Ajouter une note</label>
    <input type="text" id="note" name="note">

    <span>genre:</span>
    <br>
    <?php
        foreach($requete2->fetchAll() as $genre) { ?>
            <input type="checkbox" name="listGenres[]" value="<?= $genre["id_genre"] ?>">
            <label for="listGenres[]"><?= $genre["nom_genre"] ?></label>
        <?php } ?>
    <select name="realisateur" id="realisateur">
    <?php
        foreach($requete->fetchAll() as $realisateur) { ?>
            <option value="<?= $realisateur["id_realisateur"]?>"><?= $realisateur["identite"]?></option>
        <?php } ?>
    </select>
    <label for="fileToUpload">Choisissez une image</label>
    <input type="file" name="fileToUpload" id="fileToUpload">
    <br>
    <input type="submit" name="submit" value="Ajouter un film">
</form>
</div>

<?php

$titre = "add du film";
$titre_secondaire = "add du film";
$contenu = ob_get_clean();
require "view/template.php";
