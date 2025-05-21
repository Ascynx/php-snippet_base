<div>
    <?php if ($env == "iframe"): ?>
        <?php load_all_from_container($LOADS, $TYPES, 0); ?>
    <?php else: ?>
        <?php create_extensible_empty_container(6) ?>
    <?php endif; ?>
</div>