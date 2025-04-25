<div>
    <div class="flex greybg logic_container">
        <?php
            create_load_piece(0, "Assets/images/king.png");
            create_load_piece(1, "Assets/images/rook.png");
            create_load_piece(2, "Assets/images/book.png");
            create_load_piece(3, "Assets/images/Snippets/HelloWorld.png")
        ?>
    </div>
    <div class="flex">
        <div class="minsize_half greybg">
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
            <!-- Auto loaded frame basé sur les pièces posées. -->
        </div>
    </div>
</div>