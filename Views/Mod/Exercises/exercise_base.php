<div>
    <div class="flex greybg logic_container">
        <?php
            foreach ($elements as $element) {
                create_load_piece($element["id"], $element["image"]);
            }
        ?>
    </div>
    <div class="flex">
        <div class="minsize_half greybg logic_preview_left">
            <?php
                require_once($exercise_base);
            ?>
        </div>
        <div class="frame-container">
            <iframe
                id="reload-frame"
                title="Preview"
                src="<?php ?>"
            >
            </iframe>
        </div>
    </div>
    <div class="flex">
        <?php if (isset($score)): ?>
        <div> <!-- Bordure + flex horizontal centré -->
            <div>
                <h4>Résultat</h4>
                <p>Votre score : <?php echo($score); ?></p>
            </div>
            <button>
                <?php $next = get_next_exercise($exercise); ?>
                <a href="/<?php echo($next); ?>">
                    Prochain exercice (<?php echo "exercice " . $next ?>)
                </a>
            </button>
        </div>
        <?php else: ?>
        <form action="/<?php echo($exercise); ?>?check=1" method="post">
            <textarea name="logic_transfer" id="logic_transfer" style="display:none"></textarea>
            <button type="submit">
                Vérifier la réponse 
            </button>
        </form>
        <?php endif; ?>

    </div>
</div>