<?php
    if (isPage($uri, "/") || isPage($uri, "/index.php")) {
        $page_content = "Views/index.php";
        $title = "Index";

        require_once("Views/base.php");
    } elseif (isPage($uri, "/sandbox")) {
        $page_content = "Views/Mod/sandbox.php";
        $title = "Test";

        require_once("Views/base.php");
    } elseif (isPage($uri, "/sandboxpreview")) {
        require_once("Views/Mod/sandbox_preview.php");
        require_once("Models/ComponentModel.php");
        require_once("Views/Sideload/css.php");

        foreach($components as $index=>$id) {
            if (!isset($COMPONENTS["testing"][$id])) {
                echo("missing component for id: " . $id);
                continue;
            }
            $path = $COMPONENTS["testing"][$id]->path;
            require($path);
        }
    }