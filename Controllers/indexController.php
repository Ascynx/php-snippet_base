<?php
    if (isPage($uri, "/") || isPage($uri, "/index.php")) {
        $page_content = "Views/index.php";
        $title = "Index";

        require_once("Views/base.php");
    } elseif (isPage($uri, "/test")) {
        $page_content = "Views/Mod/testMod.php";
        $title = "Test";

        require_once("Views/base.php");
    } elseif (isPage($uri, "/testing")) {
        require_once("Views/Mod/testingBase.php");
        require_once("Models/ComponentModel.php");
        sort($components);

        foreach ($components as $k => $v) {
            $id = $v;
            if (!isset($COMPONENTS[$id])) {
                echo("missing component for id: " . $id);
                continue;
            }
            $path = $COMPONENTS[$id];
            require($path);
        }
    }