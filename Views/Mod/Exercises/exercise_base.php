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
                create_extensible_empty_container();
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
        <form action="/<?php echo($exercise); ?>?check=1" method="post">
            <textarea name="logic_transfer" id="logic_transfer" style="display:none"></textarea>
            <button type="submit">
                Vérifier la réponse 
            </button>
        </form>
    </div>
</div>