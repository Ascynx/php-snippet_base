<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Page Bidon : Les Animaux de la Forêt</title>
    <?php if ($env == "iframe"): ?>
        <?php load_from($LOADS, $TYPES, 0, 0); ?>
        <?php load_from($LOADS, $TYPES, 1, 0); ?>
    <?php else: ?>
        <?php create_extensible_empty_container(1) ?>
        <?php create_extensible_empty_container(1) ?>
    <?php endif; ?>
</head>
<body>
    <h1 class="gros vert">Les Animaux de la Forêt</h1>
    <div class="espace rouge">
        <strong>Le Renard :</strong> Rusé et agile, il parcourt la forêt à la recherche de nourriture. Sa fourrure rousse le rend facilement reconnaissable.
    </div>
    <div class="espace bleu soulign">
        <strong>La Chouette :</strong> Oiseau nocturne, elle veille sur la forêt la nuit et repère ses proies grâce à sa vue perçante et son vol silencieux.
    </div>
    <div class="espace vert">
        <strong>Le Cerf :</strong> Symbole de majesté, il se déplace en silence entre les arbres et impressionne par ses bois imposants.
    </div>

    <h2>Zone interactive : Jouez avec la forêt !</h2>
    <div class="bidon-zone" id="bidonZone">
        Cliquez sur les boutons pour faire apparaître un animal ou changer l'ambiance de la forêt !
    </div>
    <div class="espace">
        <button class="btn-bidon" onclick="montrerRenard()">Voir le renard</button>
        <button class="btn-bidon" onclick="montrerChouette()">Voir la chouette</button>
        <button class="btn-bidon" onclick="montrerCerf()">Voir le cerf</button>
        <button class="btn-bidon" onclick="changerAmbiance()">Changer l'ambiance</button>
        <button class="btn-bidon" onclick="resetBidon()">Réinitialiser</button>
    </div>
</body>
</html>