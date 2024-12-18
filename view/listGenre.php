<?php ob_start();
foreach($requete->fetchAll() as $genre) { ?>
<div class>
    <a href="index.php?action=detailGenre&id=<?= $genre["id_genre"]?>" class="linkGenre"><?= $genre["nom_genre"]?></a>
</div>

<?php } ?>

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