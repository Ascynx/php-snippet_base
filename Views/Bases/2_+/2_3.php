<div>
    <h2>Forum : Sujet de discussion</h2>
    <div style="display: flex; gap: 30px;">
        <?php if ($env == "iframe"): ?>
            <?php load_all_from_container($LOADS, $TYPES, 0); ?>
        <?php else: ?>
            <?php create_extensible_empty_container(4) ?>
        <?php endif; ?>
    </div>
    <?php if ($env == "iframe"): ?>
        <?php load_from($LOADS, $TYPES, 1, 0); ?>
    <?php else: ?>
        <?php create_extensible_empty_container(1) ?>
    <?php endif; ?>
</div>