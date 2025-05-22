<div>
    <div>
        <?php if ($env == "iframe"): ?>
            <div class="<?php load_from($LOADS, $TYPES, 0, 0) ?>">
        <?php else: ?>
            <div>
            <span><p><?php echo(htmlspecialchars("<div class=\"")); create_inline_empty_container(1); echo(htmlspecialchars("\">")); ?></p></span>
        <?php endif; ?>
            <p>Texte taille 16</p>
            <p>Ce texte est affiché en taille 16 pixels pour une meilleure lisibilité.</p>
        </div>

        <?php if ($env == "iframe"): ?>
            <div class="<?php load_from($LOADS, $TYPES, 0, 0) ?>">
        <?php else: ?>
            <div>
            <span><p><?php echo(htmlspecialchars("<div class=\"")); create_inline_empty_container(1); echo(htmlspecialchars("\">")); ?></p></span>
        <?php endif; ?>
            <p>Texte en gras</p>
            <p>Ce texte est mis en valeur grâce à une police en gras.</p>
        </div>

        <?php if ($env == "iframe"): ?>
            <div class="<?php load_from($LOADS, $TYPES, 0, 0) ?>">
        <?php else: ?>
            <div>
            <span><p><?php echo(htmlspecialchars("<div class=\"")); create_inline_empty_container(1); echo(htmlspecialchars("\">")); ?></p></span>
        <?php endif; ?>
            <p>Police Courier New, Monospace</p>
            <p>Ce texte utilise la police Courier New, idéale pour afficher du code ou des données alignées.</p>
        </div>

        <?php if ($env == "iframe"): ?>
            <div class="<?php load_from($LOADS, $TYPES, 0, 0) ?>">
        <?php else: ?>
            <div>
            <span><p><?php echo(htmlspecialchars("<div class=\"")); create_inline_empty_container(1); echo(htmlspecialchars("\">")); ?></p></span>
        <?php endif; ?>
            <a href="https://www.exemple.com">Redirection sans décoration</a>
            <p>Ce lien redirige vers un autre site sans soulignement ni couleur particulière.</p>
        </div>
    </div>
</div>