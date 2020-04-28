<!doctype html>
<html lang="fr">
    <head>
        <meta charset="UTF-8" />
        <title><?= $titre ?></title>
		<link rel="stylesheet" type="text/css" href="contenu/css/style.css">
		<link rel="stylesheet" type="text/css" href="contenu/css/style-admin.css">
		<link rel="stylesheet" type="text/css" href="contenu/css/fontawesome-free-5.12.1-web/fontawesome-free-5.12.1-web/css/all.css">
		      
    </head>
    <body>
        <div id="global">
            <header>
                <?php require 'templates/header.php'; ?>
            </header>
            <div id="contenu">
                <?= $contenu ?>
            </div> <!-- #contenu -->
            <footer id="piedBlog">
				<?php require 'templates/footer.php'; ?>
            </footer>
        </div> <!-- #global -->

        <script src="https://cdn.tiny.cloud/1/s2bmk9c8aza4wuip0f3j8kah4hvsqdh4px2h0kvesjmrkfrw/tinymce/5/tinymce.min.js" referrerpolicy="origin"/></script>  
        <script src="js/tinymce.js"></script>
        <script src="js/main.js"></script>
    </body>
</html>