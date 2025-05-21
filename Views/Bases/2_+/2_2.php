<div>
    <div>
        <h2>Les différents types de bateaux</h2>
        <?php if ($env == "iframe"): ?>
            <?php load_from($LOADS, $TYPES, 0, 0); ?>
            <?php load_from($LOADS, $TYPES, 1, 0); ?>
        <?php else: ?>
            <?php create_extensible_empty_container(1) ?>
            <?php create_extensible_empty_container(1) ?>
        <?php endif; ?>
    </div>
    <?php if ($env == "iframe"): ?>
        <?php load_from($LOADS, $TYPES, 2, 0); ?>
    <?php else: ?>
        <?php create_extensible_empty_container(1) ?>
    <?php endif; ?>
</div>