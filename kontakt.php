<?php session_start(); ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8"/>
    <link rel="stylesheet" type="text/css" href="public_html/css/style.css"/>
    <link rel="stylesheet" type="text/css" href="public_html/css/kontakt.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  </head>
  <body>
      <?php include "$_SERVER[DOCUMENT_ROOT]/obiektowo/tamplates/menu.php"; ?>
      <div id="container">
        <div id="content"> 
          <div id="inf">
           <div id="inf1">
            <h1>SIŁOWNIA Sandomierska 7</h1> 
            <span>Otwarta 24h/7</span> <br> <br>
            <span>ul. Sandomierska 7<br>Kraków</span> <br>
            <h1>KONTAKT</h1> 
            <i class="fa fa-phone"> 665544321</i> <br> 
            <i class="fa fa-envelope-o"> sandomierska7@silownia.pl</i> <br>
           </div>
           <div id="inf2">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2561.841885550395!2d19.929108915717016!3d50.051793179422326!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47165b6e01409b57%3A0xa6a507b4d73f9d23!2sSandomierska+7%2C+30-301+Krak%C3%B3w!5e0!3m2!1spl!2spl!4v1511116728282" 
            width="400" height="200" frameborder="0" style="border:0" allowfullscreen></iframe>
           </div>
          </div>

          <?php if(isset($_SESSION['wiad'])){ echo $_SESSION['wiad']; 
                 unset($_SESSION['wiad']); }?>

          <div id="form">
            <form action="email.php" method="post" id="contactform">
             <fieldset style="width:500px;">
              <legend>Masz do nas pytanie? Napisz!</legend>
              <?php if( !isset($_SESSION['online']) && empty($_SESSION['online']) ) {?>
               <input type="text" name="imie" placeholder="Imię" required="required" style="margin-bottom:1.5px;"/><br> 
              <input type="email" name="mail" placeholder="Adres e-mail" required="required" style="margin-bottom:6px;"/><br> <?php } ?>
               <textarea rows="5" columns="10" name="wiadomosc" placeholder="Treść wiadomości" required="required" style="width: 470px;"></textarea> <br>
               <input type="submit" value="Wyślij" id="signbtn" style="width:470px;"/>
              </fieldset>
            </form>
          </div>
        </div>
      </div>
  </body>
</html>