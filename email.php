<?php session_start();
      if( !isset($_SESSION['online']) && empty($_SESSION['online']) ){
         $imie=$_SESSION['imie'];
         $mail=$_SESSION['e_mail'];  
      } else {
        $imie = htmlspecialchars($_POST['imie']);
        $mail = htmlspecialchars($_POST['mail']); }
      $wiadomosc = htmlspecialchars($_POST['wiadomosc']);

      $odbiorca = "tomaszfk2@gmail.com";
      $temat = "Nowa wiadomość";
      $list = "Przysłał - $imie ($mail) <br/> Treść wiadomości - $wiadomosc";
                
      if (mail($odbiorca, $temat, $list)) {
         $_SESSION['wiad'] = "Twoja wiadomość została wysłana";
      } else {  $_SESSION['wiad'] = "Wystąpił błąd podczas wysyłania wiadomości, spróbuj później.";}  
      header('Location:kontakt.php'); ?>