<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="Assets/css/nav.css">
        <link rel="stylesheet" href="Assets/css/base.css">
        <title><?= $title ?></title>
    </head>
    <body>
        <header>
            <?php require_once("Views/Components/nav.php") ?>
        </header>
        <main>
            <?php require_once($page_content) ?>
        </main>
        <footer>
            <?php require_once("Views/Components/foot.php") ?>
        </footer>
    </body>

    <script
			  src="Assets/scripts/js/jquery-3.7.1.min.js"
			  integrity="sha256-meaR+uXojrNrr7JHWLNfD5kHCClfjyq+IiGJHjKPd2o="
			  crossorigin="anonymous">
    </script>
    <script
        src="Assets/scripts/js/DragPieceScript.js"
        crossorigin="anonymous">
    </script>
</html>