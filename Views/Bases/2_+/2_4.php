<div>
    <h2>Exemple de formulaire</h2>
    <form action="#" method="post">
        <?php if ($env == "iframe"): ?>
            <?php load_all_from_container($LOADS, $TYPES, 0); ?>   
        <? else: ?>
            <?php create_extensible_empty_container(4) ?>
        <?php endif; ?>
    </form>
</div>