<div>
    <?php if ($env == "iframe"): ?>
        <?php load_all_from_container($LOADS, $TYPES, 0); ?>
    <? else: ?>
        <?php create_extensible_empty_container(3) ?>
    <?php endif; ?>
</div>