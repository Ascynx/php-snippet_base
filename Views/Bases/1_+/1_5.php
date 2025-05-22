<div>
    <div>
        <p>Style de blocs</p>
        <?php if ($env == "iframe"): ?>
            <div class="<?php load_from($LOADS, $TYPES, 0, 0) ?>">
        <?php else: ?>
            <div>
            <span><p><?php echo(htmlspecialchars("<div class=\"")); create_inline_empty_container(1); echo(htmlspecialchars("\">")); ?></p></span>
        <?php endif; ?>
            <p>Padding accrus</p>
            <p>Ce bloc possède un espace intérieur important pour mieux séparer son contenu des bords.</p>
        </div>
        <?php if ($env == "iframe"): ?>
            <div class="<?php load_from($LOADS, $TYPES, 0, 0) ?>">
        <?php else: ?>
            <div>
            <span><p><?php echo(htmlspecialchars("<div class=\"")); create_inline_empty_container(1); echo(htmlspecialchars("\">")); ?></p></span>
        <?php endif; ?>
            <p>Limitation taille</p>
            <p>Ce bloc a une largeur maximale définie pour éviter qu'il ne s'étende trop sur de grands écrans.</p>
        </div>
        <?php if ($env == "iframe"): ?>
            <div class="<?php load_from($LOADS, $TYPES, 0, 0) ?>">
        <?php else: ?>
            <div>
            <span><p><?php echo(htmlspecialchars("<div class=\"")); create_inline_empty_container(1); echo(htmlspecialchars("\">")); ?></p></span>
        <?php endif; ?>
            <p>Bordure grasse</p>
            <p>Ce bloc est entouré d'une bordure épaisse pour attirer l'attention sur son contenu.</p>
        </div>
    </div>
</div>