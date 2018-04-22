 
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
      include "$_SERVER[DOCUMENT_ROOT]/obiektowo/read_instr_logic.php";
      include "$_SERVER[DOCUMENT_ROOT]/obiektowo/tamplates/menu.php"; ?>
<div class="conteiner">
    <div class="tab">
        <a href="admin_users.php"> <button class="tablinks">Użytkownicy</button> </a>
        <a href="admin_activ.php"> <button class="tablinks">Zajęcia</button> </a>
        <a href="admin_instr.php"> <button class="tablinks" id="active">Instruktorzy</button> </a>
    </div>

    <div id="uzytkownicy">
        <h1>Instruktor</h1>
        <label>Imię:            </label> <label style="font-weight: bold;"><?php echo $results['imie'];?></label> <br>
        <label>Nazwisko:        </label> <label style="font-weight: bold;"><?php echo $results['nazwisko'];?></label> <br>
        <label>E-mail:          </label> <label style="font-weight: bold;"><?php echo $results['e_mail'];?></label> <br>
        <label>Nr. telefonu:    </label> <label style="font-weight: bold;"><?php echo $results['nr_tel'];?></label> <br>
        <label>Ulica:           </label> <label style="font-weight: bold;"><?php echo $results['ulica'];?></label> <br>
        <label>Nr. domu:        </label> <label style="font-weight: bold;"><?php echo $results['nr_domu'];?></label> <br>
        <label>Nr. mieszkania:  </label> <label style="font-weight: bold;"><?php echo $results['nr_mieszkania'];?></label> <br>
        <label>Miejscowość:     </label> <label style="font-weight: bold;"><?php echo $results['miasto'];?></label> <br>
        <label>Specjalność:     </label> <label style="font-weight: bold;"><?php echo $results['opis'];?></label> <br>
    </div>
</div>
  </body>
</html>