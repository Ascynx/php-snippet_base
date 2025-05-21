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

    /**
     * voir Assets/scripts/js/index.mjs #toBitIndex pour plus d'informations.
     */
    function fromBitIndex($bitIndex) {
        $containerId = $bitIndex >> 16;
        $elementId = $bitIndex - ($containerId << 16);
        return array(
            "containerId"=>$containerId,
            "elementId"=>$elementId
        );
    }

    function load_from($COMPONENTS, $TYPES, $containerId, $elementId) {
        $i = ($containerId << 16) + $elementId;
        if (!isset($COMPONENTS[$i]) || !isset($TYPES[$i])) {
            return;
        }

        $component = $COMPONENTS[$i];
        if ($TYPES[$i] == "path") {
            $src = $component;
            require($src);
        } else if ($TYPES[$i] == "content") {
            $content = $component;
            echo($content);
        }
    }

    function load_all_from_container($COMPONENTS, $TYPES, $containerId) {
        $containerBit = $containerId << 16;
        $i = 0;
        while (isset($COMPONENTS[$containerBit + $i])) {
            load_from($COMPONENTS, $TYPES, $containerId, $i);
            $i++;
        }
    }