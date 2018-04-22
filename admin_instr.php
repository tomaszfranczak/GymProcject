<?php 
    session_start(); 
    //if(!isset($_SESSION['online'])) {header('Location: log.php'); exit();} ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8"/>
    <link rel="stylesheet" type="text/css" href="./public_html/css/admin_instr.css"/>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700&amp;subset=latin-ext" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  </head>
  <body>
  <?php 
      include "$_SERVER[DOCUMENT_ROOT]/obiektowo/tamplates/menu.php"; ?>

<div class="conteiner">
    <div class="tab">
        <a href="admin_users.php"> <button class="tablinks">Użytkownicy</button> </a>
        <a href="admin_activ.php"> <button class="tablinks">Zajęcia</button> </a>
        <a href="admin_instr.php"> <button class="tablinks" id="active">Instruktorzy</button> </a>
    </div>

    <div id="Uzytkownicy">
        <?php include "$_SERVER[DOCUMENT_ROOT]/obiektowo/instructors.php"; ?>
    </div>
</div>
  </body>
</html>