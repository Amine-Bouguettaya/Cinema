<?php 
ob_start();
$temp = $requete->fetch();
?>

<p>êtes vous sur de vouloir supprimer le film "<?= $temp["titre"] ?>"</p>
<br>
<br>
<a href="index.php?action=deleteFilmTraitement&id=<?= $temp["id_film"] ?>" class="button">OUI</a>
<a href="index.php?action=detailFilm&id=<?= $temp["id_film"] ?>" class="button">NON</a>

<?php
$titre = "Delete Film";
$titre_secondaire = "Delete Film";
$contenu = ob_get_clean();
require "view/template.php";