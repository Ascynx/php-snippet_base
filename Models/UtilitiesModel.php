<?php
    function create_load_piece(int $id, string $src) {
        $img_id = $id;
        $img_src = $src;
        require("Views/Components/Piece.php");
    }

    function create_load_empty_container() {
        require("Views/Components/Piece.php");
    }


    function create_extensible_empty_container($max = -1) {
        $preview = true;
        $pieces_max = $max;
        $vertical_flex = true;
        require("Views/Components/Container.php");
    }

    function create_inline_empty_container($max = -1) {
        $inline = true;
        $preview = true;
        $pieces_max = $max;
        require("Views/Components/Container.php");
    }