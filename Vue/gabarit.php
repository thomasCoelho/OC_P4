<!DOCTYPE html>

<html lang="fr">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <title><?= $titre ?></title>
        <link rel="icon" type="image/png" href="Content/images/icone.png" />
		<link rel="stylesheet" type="text/css" href="Content/css/style.css">
        <link rel="stylesheet" type="text/css" media="screen and (max-width: 600px)" href="Content/css/style-s.css">
        <link rel="stylesheet" type="text/css" media="screen and (min-width: 601px) and (max-width: 1201px)" href="Content/css/style-m.css">
        <link rel="stylesheet" type="text/css" media="screen and (min-width: 1441px)" href="Content/css/style-xl.css">
		<link rel="stylesheet" type="text/css" href="Content/css/fontawesome-free-5.12.1-web/fontawesome-free-5.12.1-web/css/all.css">		      
    </head>
    <body>
        <div id="global">
            <header id="menu">
                <?php require 'templates/header.php'; ?>
            </header>
            <div id="contenu">
                <?= $contenu ?>
            </div> <!-- #contenu -->
            <footer id="piedBlog">
				<?php require 'templates/footer.php'; ?>
            </footer>
        </div> <!-- #global -->

        <script src="https://cdn.tiny.cloud/1/s2bmk9c8aza4wuip0f3j8kah4hvsqdh4px2h0kvesjmrkfrw/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>  
        <script src="Content/js/tinymce.js"></script>
        <script src="Content/js/main.js"></script>
    </body>
</html>