<?php ob_start(); ?>

<h2>Accueil</h2>

<?php

$titre = "Cinema";
$titre_secondaire = "Cinema";
$contenu = ob_get_clean();
require "template.php";