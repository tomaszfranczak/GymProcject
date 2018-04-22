<?php session_start(); ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8"/>
    <link rel="stylesheet" type="text/css" href="public_html/css/style.css"/>
    <link rel="stylesheet" type="text/css" href="public_html/css/fontello.css"/>
    <link rel="stylesheet" type="text/css" href="public_html/css/style_user.css"/>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700&amp;subset=latin-ext" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://unpkg.com/flickity@2/dist/flickity.css"/>
  </head>
  <body>
      <?php include "$_SERVER[DOCUMENT_ROOT]/obiektowo/tamplates/menu.php"; 
            include "$_SERVER[DOCUMENT_ROOT]/obiektowo/tamplates/gallery.php"; 
            include "$_SERVER[DOCUMENT_ROOT]/obiektowo/tamplates/break.php"; 
            include "$_SERVER[DOCUMENT_ROOT]/obiektowo/tamplates/footer.php"; ?>
  </body>
</html>