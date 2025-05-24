<?php 
    require_once("Models/ComponentModel.php");

    if (doesPageMatch($uri, "/[0-9]_[0-9]/")) {
    //sideload du css.
    require_once("Views/Sideload/css_1_+.php");

        $exercise = substr(parse_url($uri)['path'], 1);

        if ($LOADED_IN == "iframe") {
            $LOADS = [];
            $TYPES = [];
            foreach($components as $index=>$id) {
                if (!isset($COMPONENTS[$exercise][$id])) {
                    echo("missing component for id: " . $id);
                    continue;
                }
                $component = $COMPONENTS[$exercise][$id];
                if ($component->is_path()) {
                    $LOADS[$index] = $component->path;
                    $TYPES[$index] = "path";
                } else {
                    $LOADS[$index] = $component->content;
                    $TYPES[$index] = "content";
                }
            }
        }


        if (!isset($COMPONENTS[$exercise])) {
            echo("Error, could not find exercise for ID: " . $exercise);
        }
        $querystr = parse_url($uri, PHP_URL_QUERY);
        if ($querystr != null) {
            parse_str($querystr, $queryarr);

            if ((isset($queryarr['check']) && $queryarr['check'] == '1') && isset($_POST["logic_transfer"])) {
                $valuesString = $_POST["logic_transfer"];

                $valuesArray = explode(";", $valuesString);
            
                $toutCorrect = true;
                $score = 0;
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
                 if (!((new ComponentPosition($containerId, $elementId))->matches($EXERCICES_VERIFICATION[$exercise][$v]))) {
                        $toutCorrect = false;
                        break;
                    } else {
                        $score++;
                    }
            }
            $score = $score / count($EXERCICES_VERIFICATION[$exercise]);
            $score = round($score * 100, 2);
            $score = $score . "%";
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
        $title = "Exercice - " . $exercise;
        $env = $LOADED_IN;
        if ($LOADED_IN != "iframe") {
            $page_content = "Views/Mod/Exercises/exercise_base.php";
            require("Views/base.php");
        } else {
            require($exercise_base);
        }
    }