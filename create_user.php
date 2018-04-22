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
      include "$_SERVER[DOCUMENT_ROOT]/obiektowo/create_user_logic.php"; ?>
<div class="conteiner">
    <div class="tab">
        <a href="admin_users.php"> <button class="tablinks" id="active">Użytkownicy</button> </a>
        <a href="admin_activ.php"> <button class="tablinks">Zajęcia</button> </a>
        <a href="admin_instr.php"> <button class="tablinks">Instruktorzy</button> </a>
    </div>

    <div id="Creating">
        <h1>Dodaj nowego użytkownika </h1> <br>
        <form action="create_user.php" method="post">
            <label style="padding-left:75px;">Rodzaj karnetu:</label>
            <select name="karnet">
                <option value="OPEN">OPEN</option>
                <option value="HALF OPEN">HALF OPEN</option>
            </select> <br> <br>
            <input name="e_mail" type="email" placeholder="E-mail" class="sign" value="<?php if(isset($_SESSION['e_maill'])) echo $_SESSION['e_maill']; unset($_SESSION['e_maill']);?>"/>
            <?php if(isset($_SESSION['e_mailError'])) { echo '<label>'.$_SESSION['e_mailError'].'</label>'; unset($_SESSION['e_mailError']); } ?>
            <br>
            <input name="haslo" type="password" placeholder="Hasło" id="passwordsign" /> 
            <?php if(isset($_SESSION['hasloError'])) { echo '<label>'.$_SESSION['hasloError'].'</label>'; unset($_SESSION['hasloError']); } ?>
            <br> 
            <input name="imie" type="text" placeholder="Imię" class="sign" value="<?php if(isset($_SESSION['imiee'])) echo $_SESSION['imiee']; unset($_SESSION['imiee']);?>"/>
            <?php if(isset($_SESSION['imieError'])) { echo '<label>'.$_SESSION['imieError'].'</label>'; unset($_SESSION['imieError']); } ?>
            <br>
            <input name="nazwisko" type="text" placeholder="Nazwisko" class="sign" value="<?php if(isset($_SESSION['nazwiskoo'])) echo $_SESSION['nazwiskoo']; unset($_SESSION['nazwiskoo']);?>"/> 
            <?php if(isset($_SESSION['nazwiskoError'])) { echo '<label>'.$_SESSION['nazwiskoError'].'</label>'; unset($_SESSION['nazwiskoError']); } ?>
            <br>
            <input name="ulica" type="text" placeholder="Ulica" class="sign" value="<?php if(isset($_SESSION['ulicaa'])) echo $_SESSION['ulicaa']; unset($_SESSION['ulicaa']);?>"/> 
            <?php if(isset($_SESSION['ulicaError'])) { echo '<label>'.$_SESSION['ulicaError'].'</label>'; unset($_SESSION['ulicaError']); } ?>
            <br>
            <input name="nr_domu" type="text" placeholder="Nr. domu" class="sign" value="<?php if(isset($_SESSION['nr_domuu'])) echo $_SESSION['nr_domuu']; unset($_SESSION['nr_domuu']);?>"/> 
            <?php if(isset($_SESSION['nr_domuError'])) { echo '<label>'.$_SESSION['nr_domuError'].'</label>'; unset($_SESSION['nr_domuError']); } ?>
            <br>
            <input name="nr_mieszkania" type="text" placeholder="Nr. mieszkania" class="sign" value="<?php if(isset($_SESSION['nr_mieszkaniaa'])) echo $_SESSION['nr_mieszkaniaa']; unset($_SESSION['nr_mieszkaniaa']);?>"/> 
            <?php if(isset($_SESSION['nr_mieszkaniaError'])) { echo '<label>'.$_SESSION['nr_mieszkaniaError'].'</label>'; unset($_SESSION['nr_mieszkaniaError']); } ?>
            <br>
            <input name="miasto" type="text" placeholder="Miejscowość" class="sign" value="<?php if(isset($_SESSION['miastoo'])) echo $_SESSION['miastoo']; unset($_SESSION['miastoo']);?>"/> 
            <?php if(isset($_SESSION['miastoError'])) { echo '<label>'.$_SESSION['miastoError'].'</label>'; unset($_SESSION['miastoError']); } ?>
            <br>
            <input name="nr_tel" type="text" placeholder="Nr. telefonu" class="sign" value="<?php if(isset($_SESSION['nr_tell'])) echo $_SESSION['nr_tell']; unset($_SESSION['nr_tell']);?>"/> 
            <?php if(isset($_SESSION['nr_telError'])) { echo '<label>'.$_SESSION['nr_telError'].'</label>'; unset($_SESSION['nr_telError']); } ?>
            <br>
            <button id="addbtn" type="submit">Dodaj</button>
            <a href="admin_users.php"> <button id="backbtn">Wróć</button> </a>
        </form>
    </div>
</div>
  </body>
</html>