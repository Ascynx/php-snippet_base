<div>
    <div>
        <div>
            <p>Bloc flex vertical</p>
            <?php if ($env == "iframe"): ?>
                <div class="<?php load_from($LOADS, $TYPES, 0, 0) ?>">
            <?php else: ?>
                <div>
                <span><p><?php echo(htmlspecialchars("<div class=\"")); create_inline_empty_container(1); echo(htmlspecialchars("\">")); ?></p></span>
            <?php endif; ?>
                <div>
                    <p>Titre : Présentation</p>
                    <p>Bienvenue sur notre page de démonstration des layouts flexibles.</p>
                </div>
                <div>
                    <p>Titre : Objectif</p>
                    <p>Ce bloc explique comment organiser du contenu verticalement.</p>
                </div>
                <div>
                    <p>Titre : Contact</p>
                    <p>Pour toute question, contactez-nous à contact@exemple.com.</p>
                </div>
            </div>
        </div>
        <div>
            <p>Bloc flex horizontal</p>
            <?php if ($env == "iframe"): ?>
                <div class="<?php load_from($LOADS, $TYPES, 0, 0) ?>">
            <?php else: ?>
                <div>
                <span><p><?php echo(htmlspecialchars("<div class=\"")); create_inline_empty_container(1); echo(htmlspecialchars("\">")); ?></p></span>
            <?php endif; ?>
                <div>
                    <p>Produit A</p>
                    <p>Un produit innovant pour améliorer votre quotidien.</p>
                </div>
                <div>
                    <p>Produit B</p>
                    <p>Découvrez notre nouvelle gamme de services personnalisés.</p>
                </div>
                <div>
                    <p>Produit C</p>
                    <p>Profitez d'une assistance dédiée et d'une équipe à votre écoute.</p>
                </div>
            </div>
        </div>
    </div>
</div>