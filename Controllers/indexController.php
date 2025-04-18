<?php
    if (isPage($uri, "/") || isPage($uri, "/index.php")) {
        $page_content = "Views/index.php";
        $title = "Index";

        require_once("Views/base.php");
    } elseif (isPage($uri, "/test")) {
        $page_content = "Views/Mod/testMod.php";
        $title = "Test";

        require_once("Views/base.php");
    }