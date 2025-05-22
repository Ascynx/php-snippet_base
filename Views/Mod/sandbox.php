<div>
    <div class="flex greybg logic_container">
        <?php
            foreach($COMPS as $index=>$components) {
                foreach($components as $id=>$component) {
                    if ($component->is_path()) {
                        $src = $component->image;
                        create_load_piece($id, $src);
                    }
                }
            }
        ?>
    </div>
    <div class="flex">
        <div class="minsize_half greybg logic_preview_left">
            <div class="flex">
                <p>inline integration</p>
                <?php create_inline_empty_container(1)?>
            </div>
            
            <?php
                create_extensible_empty_container();
            ?>
        </div>
        <div class="frame-container">
            <iframe
                id="reload-frame"
                title="Preview"
                src="../index"
            >

            </iframe>
        </div>
    </div>
</div>