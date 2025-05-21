<!DOCTYPE html>

<?php
    require_once("Models/pageSortingModel.php");
    require_once("Models/UtilitiesModel.php");

    session_start();
    $uri = $_SERVER["REQUEST_URI"];
    $components = get_query_components($uri);

    //vérifie si la page est chargée dans un iframe ou pas
    //(attention, pas compatible avec les navigateurs qui ne supportent pas le header Sec-Fetch-Dest (vieilles versions de Safari, Firefox, IE, etc...))
    //https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Sec-Fetch-Dest
    $all_headers = getallheaders();
    if ($all_headers['Sec-Fetch-Dest'] == 'iframe') {
        $LOADED_IN = "iframe";
    } else {
        $LOADED_IN = "page";
    }

    require_once("Controllers/indexController.php");
    require_once("Controllers/exerciseController.php");
    #TODOS

    # Crée les différents exercices
    # Crée les différentes images
    # lies les images et partie de codes.
    # Vérifie la logique derrière.

    # Envoie à adrien pour le css.
    # à finir pour le 24 Mai!!!!

