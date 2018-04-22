 
<?php session_start(); ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8"/>
    <link rel="stylesheet" type="text/css" href="public_html/css/admin_instr.css"/>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700&amp;subset=latin-ext" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  </head>
  <body>
  <?php 
      include "$_SERVER[DOCUMENT_ROOT]/obiektowo/read_activ_logic.php";
      include "$_SERVER[DOCUMENT_ROOT]/obiektowo/tamplates/menu.php"; ?>
<div class="conteiner">
    <div class="tab">
        <a href="admin_users.php"> <button class="tablinks">Użytkownicy</button> </a>
        <a href="admin_activ.php"> <button class="tablinks"  id="active">Zajęcia</button> </a>
        <a href="admin_instr.php"> <button class="tablinks">Instruktorzy</button> </a>
    </div>

    <div id="uzytkownicy">
        <h1>Zajęcia</h1>
        <label>Nazwa:            </label> <label style="font-weight: bold;"><?php echo $results['nazwa'];?></label> <br>
        <label>Opis:        </label> <label ><?php echo $results['opis_zajec'];?></label> <br>
        <label>Limit uczestników:    </label> <label style="font-weight: bold;"><?php echo $results['limit_uczestnikow'];?></label> <br>
        <label>Prowadzący:           </label> <label style="font-weight: bold;"><?php echo $results['imie'].' '.$results['nazwisko'];?></label> <br><br>
        <label style="color:red;">Data:  </label> <label style="font-weight: bold;"><?php echo $results['data'];?></label> <br>
        <label style="color:red;">Godzina:   </label> <label style="font-weight: bold;"><?php echo $results['godzina'];?></label> <br>

    </div>
</div>
  </body>
</html>