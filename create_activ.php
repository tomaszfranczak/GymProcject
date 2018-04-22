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
      include "$_SERVER[DOCUMENT_ROOT]/obiektowo/create_activ_logic.php"; ?>
<div class="conteiner">
    <div class="tab">
        <a href="admin_users.php"> <button class="tablinks">Użytkownicy</button> </a>
        <a href="admin_activ.php"> <button class="tablinks" id="active">Zajęcia</button> </a>
        <a href="admin_instr.php"> <button class="tablinks">Instruktorzy</button> </a>
    </div>

    <div id="Creating">
        <h1>Dodaj nowe zajęcia </h1> <br>
        <form action="create_activ.php" method="post">
            <label style="padding-left:75px;">Nazwa:</label>
            <input name="nazwa" type="text" placeholder="Nazwa"/>
            <?php if(isset($_SESSION['nazwaError'])) { echo '<label>'.$_SESSION['nazwaError'].'</label>'; unset($_SESSION['nazwaError']); } ?>
            <br>
            <label style="padding-left:75px;">Prowadzacy:</label>
            <select name="prowadzacy"  style="width:150px" >
                <?php
                $prowadzacy = "SELECT imie, nazwisko, id_instruktor FROM instruktor";
                foreach ($con->query($prowadzacy) as $row) {
                echo'<option value="'.$row['id_instruktor'].'">'.$row['imie'].' '.$row['nazwisko'].'</option>';
                } ?>
            </select> <br> 
            <label style="padding-left:75px;">Data:</label>
            <input name="data" type="date"/>
            <?php if(isset($_SESSION['dataError'])) { echo '<label>'.$_SESSION['dataError'].'</label>'; unset($_SESSION['dataError']); } ?>
            <br>
            <label style="padding-left:75px;">Godzina:</label>
            <input name="godzina" type="time"/> 
            <?php if(isset($_SESSION['godzinaError'])) { echo '<label>'.$_SESSION['godzinaError'].'</label>'; unset($_SESSION['godzinaError']); } ?>
            <br>
            <label style="padding-left:75px;">Limit uczestników:</label>
            <input name="limit" type="text" placeholder="Limit uczestników"/> 
            <?php if(isset($_SESSION['limitError'])) { echo '<label>'.$_SESSION['limitError'].'</label>'; unset($_SESSION['limitError']); } ?>
            <br>
            <label style="padding-left:75px;">Opis:</label>
            <input name="opis_zajec" type="text" style="width:250px;" placeholder="Opis"/> 
            <?php if(isset($_SESSION['opis_zajecError'])) { echo '<label>'.$_SESSION['opis_zajecError'].'</label>'; unset($_SESSION['opis_zajecError']); } ?>
            <br>
            <button id="addbtn" type="submit">Dodaj</button>
            <a href="admin_activ.php"> <button id="backbtn">Wróć</button> </a>
        </form>
    </div>
</div>
  </body>
</html>