<?php 
    session_start(); 
    if(!isset($_SESSION['online'])) {header('Location: log.php'); exit();} 
    ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8"/>
    <link rel="stylesheet" type="text/css" href="public_html/css/users.css"/>
    <link rel="stylesheet" type="text/css" href="public_html/css/style_user.css"/>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700&amp;subset=latin-ext" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script type="text/javascript">
    function delete_id(id) {
      if(confirm('Czy na pewno chcesz zrezygnować z tych zajęć?')) {
        window.location.href='user.php?delete_id='+id;
      }
    }
    function aktywuj_id(id) {
      if(confirm('Aktywacja karnetu, aktywuje karnet o 31 dni.')) {
        window.location.href='user.php?id_karnet='+id;
      }
    }
    function normal() { window.location.href='user.php';}
    </script>
  </head>
  <body>
  <?php 
      include "$_SERVER[DOCUMENT_ROOT]/obiektowo/tamplates/menu.php"; ?>
    <div id="user_bar">
      <div class="ub" onclick="UserBarOption(event, 'Uzytkownicy')" id="defaultOpen">
        <i class="fa fa-user" style="font-size:50px; margin-top:26px;"></i></br>MOJE DANE</div>
      <div class="ub" onclick="UserBarOption(event, 'Karnet')">
        <i class="fa fa-ticket" style="font-size:50px; margin-top:26px;"></i></br>MÓJ KARNET</div>
      <div class="ub" onclick="UserBarOption(event, 'Zajecia')">
        <i class="fa fa-group" style="font-size:50px; margin-top:26px;"></i></br>MOJE ZAJECIA</div>
    </div>
    <div id="Uzytkownicy" class="content">
    <?php
      echo "<h1>Imię <tab1></tab1><b>".$_SESSION['imie']."</b></h1>"; 
      echo "<h1>Nazwisko <tab2></tab2><b>".isset($_SESSION['nazwisko'])."</b></h1>"; 
      echo "<h1>E-mail <tab3></tab3><b>".$_SESSION['e_mail']."</b></h1>";
      echo "<h1>Numer telefonu <tab4></tab4><b>".$_SESSION['nr_tel']."</b></h1>"; ?>
      <button id="modify">Edytuj dane</button> <?php
      echo "<h1>Ulica <tab5></tab5><b>".$_SESSION['ulica']."</b></h1>"; ?>
      <button id="modifypass">Zmień hasło</button> <?php
      echo "<h1>Numer domu <tab6></tab6><b>".$_SESSION['nr_domu']."</b></h1>";
      echo "<h1>Numer mieszkania <tab7></tab7><b>".$_SESSION['nr_mieszkania']."</b></h1>";
      echo "<h1>Miejscowość <tab8></tab8><b>".$_SESSION['miasto']."</b></h1>"; ?>
    </div>
    <?php if($_SESSION['data_waznosci'] >= date('Y-m-d')) { $_status='Aktywny'; $_button='Przedłuż aktywność!'; }
          else { $_status='Dezaktywny'; $_button='Aktywuj!'; }
          ?>
    <div id="Karnet" class="content">
    <?php
      echo "<h1>Nazwa karnetu  <tab4></tab4><b>".$_SESSION['nazwa_karnetu']."</b></h1>"; 
      echo "<h1>Cena<tab1></tab1><b>".$_SESSION['cena']."</b></h1>"; 
      echo "<h1>Status  <tab3></tab3><b>".$_status."</b></h1>";
      echo "<h1>Data ważności <tab4></tab4><tab_1></tab_1><b>".$_SESSION['data_waznosci']."</b></h1>"; 
      echo "<h1>Opis <tab5></tab5><b>".$_SESSION['opis_karnetu']."</b></h1>"; 
      echo '<a href="javascript:aktywuj_id('.$_SESSION['id_karnet'].')"><button id="modifypass">'.$_button.'</button></a>';?>
    </div>

    <div id="Zajecia" class="content">
    <table>
        <thead>
          <tr>
            <th>Nazwa</th>
            <th>Data</th>
            <th>Godzina</th>
            <th>Prowadzący</th>
            <th> </th>
          </tr>
        </thead>
          <tbody>
          <?php
            $data=date("Y-m-d");
            include "classes/class_connecting.php";
            $con = new Connection();
            $acti = "SELECT DISTINCT r.id_rezerwacja, z.nazwa, z.data, z.godzina, i.imie, i.nazwisko 
                     from instruktor i, zajecia z, rezerwacja r, user u 
                     where i.id_instruktor=z.instruktor_id_instruktor 
                     and r.zajecia_id_zajecia=z.id_zajecia and r.user_id_user=".$_SESSION['id_user'];

            foreach ($con->query($acti) as $row) {
                            if($row['data']>$data) {
                            echo '<tr>';
                            echo '<td>'. $row['nazwa'] . '</td>';
                            echo '<td>'. $row['data'] . '</td>';
                            echo '<td>'. $row['godzina'] . '</td>';
                            echo '<td>'. $row['imie'] .' '. $row['nazwisko'] . '</td>';
                            echo '<td id="special2">';
                            echo '<a href="javascript:delete_id('.$row['id_rezerwacja'].')"><button class="btn_delete">Zrezygnuj</button></a>';
                            echo '</td>';
                            echo '</tr>'; }
            }
          ?>
        </tbody>
      </table>
      <br><h1 style="font-weight:bold;">Aby zapisać się na zajęcia grupowe, przejdź do zakładki GRAFIK, w menu głównym.</h1>
    </div>
    <?php 
      if(isset($_GET['delete_id']))
      {
           $sql_query="DELETE FROM rezerwacja WHERE id_rezerwacja=".$_GET['delete_id'];
           $con->query($sql_query);
           echo '<script>location.href = "user.php";</script>';
      }
      if(isset($_GET['id_karnet']))
      {
           if($_SESSION['data_waznosci']>=$data) { $sql_query="UPDATE karnet SET data_waznosci = DATE_ADD(data_waznosci, INTERVAL 31 DAY) WHERE id_karnet=".$_GET['id_karnet']; }
           else { $sql_query="UPDATE karnet SET data_waznosci = DATE_ADD(CURDATE(), INTERVAL 31 DAY) WHERE id_karnet=".$_GET['id_karnet']; }
           $con->query($sql_query);
           $sql_queryy="SELECT data_waznosci from karnet where id_karnet=".$_SESSION['id_karnet'];
           $resolt=$con->query($sql_queryy);
           $row = $resolt->fetch_array(MYSQLI_ASSOC);
           $_SESSION['data_waznosci'] = $row['data_waznosci'];
           echo '<script>location.href = "user.php";</script>';
      }
      ?>

    <script>
        function UserBarOption(evt, optionName) {
        var i, content, ub;
        content = document.getElementsByClassName("content");
        for (i = 0; i < content.length; i++) { content[i].style.display = "none"; }
        ub = document.getElementsByClassName("ub");
        for (i = 0; i < ub.length; i++) { ub[i].className = ub[i].className.replace(" active", "");}
        document.getElementById(optionName).style.display = "block";
        evt.currentTarget.className += " active";
        }
        document.getElementById("defaultOpen").click();
    </script>
</body>
</html>