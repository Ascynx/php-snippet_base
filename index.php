<?php
    require_once("Models/pageSortingModel.php");
    require_once("Models/UtilitiesModel.php");

    session_start();
    $uri = $_SERVER["REQUEST_URI"];
    $components = get_query_components($uri);

    require_once("Controllers/indexController.php");

    #TODOS

    #Met en place une page de base
    # Crée des snippets avec/sans css
    # Drag and drop avec des frames?
    # Watch file changes. (reload au changement de fichier)
    # Vérifie la logique derrière.

    # Envoie à adrien pour le css.
    # à finir pour le 24 Mai!!!!

