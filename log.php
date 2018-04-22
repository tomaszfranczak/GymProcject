<?php 
  session_start();
  if((isset($_SESSION['online'])) && ($_SESSION['online']==true)) {
          if($_SESSION['e_mail']=='admin') header('Location: admin_users.php');
          else header('Location: user.php'); } ?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8"/>
    <link rel="stylesheet" type="text/css" href="public_html/css/style.css"/>
    <link rel="stylesheet" type="text/css" href="assets/css/fontello.css"/>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700&amp;subset=latin-ext" rel="stylesheet">
  </head>
  <body>
    <?php 
      include "$_SERVER[DOCUMENT_ROOT]/obiektowo/tamplates/menu.php"; 
      include "$_SERVER[DOCUMENT_ROOT]/obiektowo/create_user_logic.php"; ?>
    <div id="cont" style="background-image: url(public_html/media/images/imglog.jpg);
                   min-height: 532px;
                   background-size: cover;">
      <div id="fcont">
        <h2 style="color:black;">Masz już konto?</h2>
        <h3 style="color:black;">Zaloguj się</h3>
        <form action="logowanie.php" method="post"> 
         <input type="text" placeholder="E-mail" id="login1" name="login"/>
         <input type="password" placeholder="Hasło" id="password" name="pass" />
         <a style="color:black;"> <h4><tab2></tab2>Nie pamiętam hasła</h4> </a>
         <input type="submit" id="logbtn" value="Zaloguj się"/>
        </form>
        <?php if((isset($_SESSION['blad'])) && ($_SESSION['blad']==true)) echo $_SESSION['blad'];  unset($_SESSION['blad']); ?>
      </div> 
      <div id="scont">
        <?php if(isset($_SESSION['zarejstrowany'])){ echo '<h1 style="color:white;">'.$_SESSION['zarejstrowany'].'</h1>'; unset($_SESSION['zarejstrowany']);}?>
        <h2 style="color:white;">Nie masz jeszcze konta?  </h2>
        <h5 style="color:white;">Zarejestruj się!</h5>
        <form action="log.php" method="post">
        <label style="color:white;">Rodzaj karnetu:</label>
          <select name="karnet">
            <option value="OPEN">OPEN</option>
            <option value="HALF OPEN">HALF OPEN</option>
          </select> <br> <br>
          <input name="e_mail" type="email" placeholder="E-mail" class="sign" value="<?php if(isset($_SESSION['e_maill'])) echo $_SESSION['e_maill']; unset($_SESSION['e_mail']);?>"/>
          <?php if(isset($_SESSION['e_mailError'])) { echo '<label>'.$_SESSION['e_mailError'].'</label>'; unset($_SESSION['e_mailError']); } ?>
          <br>
          <input name="haslo" type="password" placeholder="Hasło" id="passwordsign" /> 
          <?php if(isset($_SESSION['hasloError'])) { echo '<label>'.$_SESSION['hasloError'].'</label>'; unset($_SESSION['hasloError']); } ?>
          <br> 
          <input name="imie" type="text" placeholder="Imię" class="sign" value="<?php if(isset($_SESSION['imiee'])) echo $_SESSION['imiee']; unset($_SESSION['imiee']);?>"/>
          <?php if(isset($_SESSION['imieError'])) { echo '<label>'.$_SESSION['imieError'].'</label>'; unset($_SESSION['imieError']); } ?>
          <br>
          <input name="nazwisko" type="text" placeholder="Nazwisko" class="sign" value="<?php if(isset($_SESSION['nazwisko'])) echo $_SESSION['nazwisko']; unset($_SESSION['nazwisko']);?>"/> 
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
          <button type="submit" id="signbtn">Zarejstruj się</button>
        </form>
    </div>
  </body>
</html>