<?php ob_start(); ?>
<div style="display: flex; justify-content: center;">
<form action="index.php?action=addCastingTraitement&id=<?= $id_film ?>" method = "post" id="addFilm" style="display: flex; flex-direction: column; width: 200px">
    <label for="addcasting">Acteur:</label>
    <select name="addcasting" id="addcasting">
    <?php
        foreach($requete->fetchAll() as $acteur) { ?>
            <option value="<?= $acteur["id_acteur"]?>"><?= $acteur["identite"]?></option>
        <?php } ?>
    </select>
    <label for="role">role:</label>
    <select name="role" id="role">
    <?php
        foreach($requete2->fetchAll() as $acteur) { ?>
            <option value="<?= $acteur["id_role"]?>"><?= $acteur["nom_role"]?></option>
        <?php } ?>
    </select>
    <input type="submit" name="submit" value="Ajouter un acteur">
</form>
</div>
<?php

$titre = "add casting";
$titre_secondaire = "add casting";
$contenu = ob_get_clean();
require "view/template.php";