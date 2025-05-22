<div>
    <div>
        <p>Ici, vous pourrez voir l'effet des classes et styles CSS appliqués à différents blocs de contenu ainsi que des exemples de sur quoi on pourrait les utiliser.</p>
    </div>

    <div>
        <?php if ($env == "iframe"): ?>
        <div class="<?php load_from($LOADS, $TYPES, 0, 0) ?>">
        <?php else: ?>
        <div>
            <span><p><?php echo(htmlspecialchars("<div class=\"")); create_inline_empty_container(1); echo(htmlspecialchars("\">")); ?></p></span>
        <?php endif; ?>
            <p>Ce bloc est censé être rouge</p>
            <p>Il met en avant les messages d'alerte ou d'erreur importants pour l'utilisateur.</p>
        </div>
    </div>
    <div>
        <?php if ($env == "iframe"): ?>
        <div class="<?php load_from($LOADS, $TYPES, 1, 0) ?>">
        <?php else: ?>
        <div>
            <span><p><?php echo(htmlspecialchars("<div class=\"")); create_inline_empty_container(1); echo(htmlspecialchars("\">")); ?></p></span>
        <?php endif; ?>
            <p>Celui-ci devrait être bleu</p>
            <p>Ce bloc est utilisé pour afficher des informations ou des notifications générales.</p>
        </div>
    </div>
    <div>
        <div>
            <p>Bloc neutre</p>
            <p>Ce bloc n'a pas de style particulier et sert à présenter du contenu standard.</p>
        </div>
    </div>
</div>