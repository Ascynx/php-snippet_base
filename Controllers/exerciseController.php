<?php 
    require_once("Models/ComponentModel.php");

    if (doesPageMatch($uri, "/[0-9]_[0-9]/")) {
        $exercise = substr(parse_url($uri)['path'], 1);
        if (!isset($COMPONENTS[$exercise])) {
            echo("Error, could not find exercise for ID: " . $exercise);
        }
        $elements = [];
        for ($i = 0; $i < count($COMPONENTS[$exercise]); $i++) {
            $component = $COMPONENTS[$exercise][$i];
            $image = $component->image;

            $element = array("id"=>$i, "image"=>$image);
            array_push($elements, $element);
        }

        $page_content = "Views/Mod/Exercises/exercise_base.php";
        $title = "Exercice - " . $exercise;
        require_once("Views/base.php");
    }