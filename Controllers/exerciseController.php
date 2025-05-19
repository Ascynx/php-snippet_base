<?php 
    require_once("Models/ComponentModel.php");

    if (doesPageMatch($uri, "/[0-9]_[0-9]/")) {
        $exercise = substr(parse_url($uri)['path'], 1);
        if (!isset($COMPONENTS[$exercise])) {
            echo("Error, could not find exercise for ID: " . $exercise);
        }
        $querystr = parse_url($uri, PHP_URL_QUERY);
        parse_str($querystr, $queryarr);

        if ((isset($queryarr['check']) && $queryarr['check'] == '1') && isset($_POST["logic_transfer"])) {
            $valuesString = $_POST["logic_transfer"];

            $valuesArray = explode(";", $valuesString);
            
            $toutCorrect = true;
            foreach($valuesArray as $value) {
                if (empty($value)) {
                    continue;
                }
                //k=v
                $kv = explode("=", $value);
                $k = $kv[0];
                $v = $kv[1];

                $indexes = fromBitIndex($k);
                $containerId = $indexes['containerId'];
                $elementId = $indexes['elementId'];
                if (!(new ComponentPosition($containerId, $elementId)->matches($EXERCICES_VERIFICATION[$exercise][$v]))) {
                    $toutCorrect = false;
                    break;
                }
            }
        }

        $elements = [];
        for ($i = 0; $i < count($COMPONENTS[$exercise]); $i++) {
            $component = $COMPONENTS[$exercise][$i];
            $image = $component->image;

            $element = array("id"=>$i, "image"=>$image);
            array_push($elements, $element);
        }
        
        $exercise_base = $BASES[$exercise];
        $page_content = "Views/Mod/Exercises/exercise_base.php";
        $title = "Exercice - " . $exercise;
        require("Views/base.php");
    }