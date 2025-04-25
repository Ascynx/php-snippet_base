<!DOCTYPE html>

<?php
    require_once("Models/pageSortingModel.php");
    require_once("Models/UtilitiesModel.php");

    session_start();
    $uri = $_SERVER["REQUEST_URI"];
    $components = get_query_components($uri);

    require_once("Controllers/indexController.php");

    #TODOS

    # Crée les différents exercices
    # Crée les différentes images
    # lies les images et partie de codes.
    # Vérifie la logique derrière.

    # Envoie à adrien pour le css.
    # à finir pour le 24 Mai!!!!

