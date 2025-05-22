<?php
    if (isPage($uri, "/") || isPage($uri, "/index.php")) {
        $page_content = "Views/index.php";
        $title = "Index";

        require_once("Views/base.php");
    } elseif (isPage($uri, "/sandbox")) {
        require_once("Models/UtilitiesModel.php");
        require_once("Models/ComponentModel.php");
        $page_content = "Views/Mod/sandbox.php";
        $title = "Test";

        $COMPS = $COMPONENTS;
        require_once("Views/base.php");
    } elseif (isPage($uri, "/sandboxpreview")) {
        require_once("Views/Mod/sandbox_preview.php");
        require_once("Models/ComponentModel.php");
        require_once("Views/Sideload/css.php");


        $referer = parse_url($_SERVER['HTTP_REFERER']);
        $referer_path =  substr($referer['path'], 1);
        foreach($components as $index=>$id) {
            if (!isset($COMPONENTS[$referer_path][$id])) {
                echo("missing component for id: " . $id);
                continue;
            }
            $component = $COMPONENTS[$referer_path][$id];
            if ($component->is_path()) {
                require($component->path);
            } else {
                echo($component->content);
            }
        }
    }