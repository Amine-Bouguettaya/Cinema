<?php ob_start(); ?>

<section class="main-content">        
        <div class="sort-section">
            <span class="sort-label">Trier par:</span>
            <div class="sort-options">
                <a href="#" class="sort-option active">Ordre alphabétique</a>
                <a href="#" class="sort-option">Nombre de film</a>
            </div>
        </div>

        <div class="actor-list">
        <?php foreach($requete->fetchAll() as $acteur) {?>
            <div class="actor-card">
                <img src="<?php if ($acteur["personne_photo"]) {echo $acteur["personne_photo"] ;} else {
                    echo "public/image/placeholder.svg?height=350&width=250";
                } ?>" alt="<?=$acteur["nom"]." ".$acteur["prenom"] ?>" class="actor-image">
                <div class="actor-info">
                    <h2 class="actor-name"><?=$acteur["nom"]." ".$acteur["prenom"] ?></h2>
                    <p class="actor-role">Realisateur</p>
                    <p class="actor-birth">Née le <?=$acteur["date"]?></p>
                    <p class="actor-known-for"></p>
                </div>
                <a href="index.php?action=detailRealisateur&id=<?=$acteur["id_realisateur"]?>" class="more-info">Plus d'informations →</a>
            </div>
            <?php } ?>
        </div>
    </section>

<?php

$titre = "Liste des Realisateurs";
$titre_secondaire = "Liste des Realisateurs";
$contenu = ob_get_clean();
require "view/template.php";