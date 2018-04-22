<?php session_start(); ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8"/>
    <link rel="stylesheet" type="text/css" href="public_html/css/admin_instr.css"/>
    <link rel="stylesheet" type="text/css" href="public_html/css/creating.css"/>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700&amp;subset=latin-ext" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  </head>
  <body>
  <?php 
      include "$_SERVER[DOCUMENT_ROOT]/obiektowo/tamplates/menu.php"; 
      include "$_SERVER[DOCUMENT_ROOT]/obiektowo/create_instr_logic.php"; ?>
<div class="conteiner">
    <div class="tab">
        <a href="admin_users.php"> <button class="tablinks">Użytkownicy</button> </a>
        <a href="admin_activ.php"> <button class="tablinks">Zajęcia</button> </a>
        <a href="admin_instr.php"> <button class="tablinks" id="active">Instruktorzy</button> </a>
    </div>

    <div id="Creating">
        <h1>Dodaj nowego instruktora </h1> <br>
        <form action="create_instr.php" method="post">
            <input name="imie" type="text" placeholder="Imię" class="sign"/>
            <?php if(isset($_SESSION['imieError'])) { echo '<label>'.$_SESSION['imieError'].'</label>'; unset($_SESSION['imieError']); } ?>
            <br>
            <input name="nazwisko" type="text" placeholder="Nazwisko" class="sign" /> 
            <?php if(isset($_SESSION['nazwiskoError'])) { echo '<label>'.$_SESSION['nazwiskoError'].'</label>'; unset($_SESSION['nazwiskoError']); } ?>
            <br>
            <input name="e_mail" type="email" placeholder="E-mail" class="sign"/>
            <?php if(isset($_SESSION['e_mailError'])) { echo '<label>'.$_SESSION['e_mailError'].'</label>'; unset($_SESSION['e_mailError']); } ?>
            <br>
            <input name="ulica" type="text" placeholder="Ulica" class="sign"/> 
            <?php if(isset($_SESSION['ulicaError'])) { echo '<label>'.$_SESSION['ulicaError'].'</label>'; unset($_SESSION['ulicaError']); } ?>
            <br>
            <input name="nr_domu" type="text" placeholder="Nr. domu" class="sign"/> 
            <?php if(isset($_SESSION['nr_domuError'])) { echo '<label>'.$_SESSION['nr_domuError'].'</label>'; unset($_SESSION['nr_domuError']); } ?>
            <br>
            <input name="nr_mieszkania" type="text" placeholder="Nr. mieszkania" class="sign" /> 
            <?php if(isset($_SESSION['nr_mieszkaniaError'])) { echo '<label>'.$_SESSION['nr_mieszkaniaError'].'</label>'; unset($_SESSION['nr_mieszkaniaError']); } ?>
            <br>
            <input name="miasto" type="text" placeholder="Miejscowość" class="sign"/> 
            <?php if(isset($_SESSION['miastoError'])) { echo '<label>'.$_SESSION['miastoError'].'</label>'; unset($_SESSION['miastoError']); } ?>
            <br>
            <input name="nr_tel" type="text" placeholder="Nr. telefonu" class="sign"/> 
            <?php if(isset($_SESSION['nr_telError'])) { echo '<label>'.$_SESSION['nr_telError'].'</label>'; unset($_SESSION['nr_telError']); } ?>
            <br>
            <input name="specjalnosc" type="text" placeholder="Specjalność" class="sign"/> 
            <?php if(isset($_SESSION['specjalnoscError'])) { echo '<label>'.$_SESSION['specjalnoscError'].'</label>'; unset($_SESSION['specjalnoscError']); } ?>
            <br>
            <button id="addbtn" type="submit">Dodaj</button>
            <a href="admin_instr.php"> <button id="backbtn">Wróć</button> </a>
        </form>
    </div>
</div>
  </body>
</html>