<div>
    <div>
        <h2>Exemples d'interactions utilisateur</h2>
        <p>Cette page présente trois éléments interactifs courants :</p>
        <?php if ($env == "iframe"): ?>
            <ul class="<?php load_from($LOADS, $TYPES, 0, 0) ?>">
        <?php else: ?>
            <span><p><?php echo(htmlspecialchars("<ul class=\"")); create_inline_empty_container(1); echo(htmlspecialchars("\">")); ?></p></span>
            <ul>
        <?php endif; ?>
            <li>Un texte qui devient gras au survol de la souris.</li>
            <li>Une image dont la taille augmente lors d'un clic.</li>
            <li>Un bouton désactivé pour illustrer l'état inactif.</li>
        </ul>
    </div>
    <div>
        <?php if ($env == "iframe"): ?>
            <div class="<?php load_from($LOADS, $TYPES, 0, 0) ?>">
        <?php else: ?>
            <div>
            <span><p><?php echo(htmlspecialchars("<div class=\"")); create_inline_empty_container(1); echo(htmlspecialchars("\">")); ?></p></span>
        <?php endif; ?>
            <p>Texte gras au survol</p>
            <p>Passez la souris sur ce texte pour voir l'effet de survol.</p>
        </div>
        <?php if ($env == "iframe"): ?>
            <div class="<?php load_from($LOADS, $TYPES, 0, 0) ?>">
        <?php else: ?>
            <div>
            <span><p><?php echo(htmlspecialchars("<div class=\"")); create_inline_empty_container(1); echo(htmlspecialchars("\">")); ?></p></span>
        <?php endif; ?>
            <p>Taille accrue au click</p>
            <p>Cliquez sur l'image ci-dessous pour l'agrandir :</p>
            <img src="Assets/images/rook.png" alt="Image d'exemple">
        </div>
        <div>
            <p>Bouton désactivé</p>
            <button disabled>Bouton</button>
            <p>Ce bouton est désactivé et ne peut pas être cliqué.</p>
        </div>
    </div>
</div>