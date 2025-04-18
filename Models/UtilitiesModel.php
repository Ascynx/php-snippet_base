<?php
    function create_load_piece(int $id, string $src) {
        $img_id = $id;
        $img_src = $src;
        require("Views/Components/PieceContainer.php");
    }

    function create_load_empty_container(int $id) {
        $container_id = $id;
        require("Views/Components/EmptyPieceContainer.php");
    }