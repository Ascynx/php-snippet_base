<div>
    <div class="flex greybg containerContainer">
        <?php
            create_load_piece(0, "Assets/images/king.png");
            create_load_piece(1, "Assets/images/rook.png");
            create_load_piece(2, "Assets/images/book.png");
        ?>
    </div>
    <div class="flex">
        <div class="greybg">
            <?php
                create_load_empty_container(0);
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