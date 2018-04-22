<?php session_start(); ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8"/>
    <link rel="stylesheet" type="text/css" href="public_html/css/style.css"/>
    <link rel="stylesheet" type="text/css" href="public_html/css/grafik.css"/>
    <link rel="stylesheet" type="text/css" href="public_html/css/fontello.css"/>
    <link rel="stylesheet" type="text/css" href="public_html/css/style_user.css"/>
    <script type="text/javascript">
        function join_id(id) { window.location.href='grafik.php?id_zajecia='+id; }
    </script>
  </head>
  <body>
      <?php include "$_SERVER[DOCUMENT_ROOT]/obiektowo/tamplates/menu.php"; ?>
      <div id="container">
        <div id="content"> 
        <table>
        <thead>
          <tr>
            <th>Nazwa</th>
            <th>Data</th>
            <th>Godzina</th>
            <th>Prowadzący</th>
            <th>Zajęte miejsca</th>
            <th>Opis</th>
            <th> </th>
          </tr>
        </thead>
          <tbody>
          <?php
            $data=date("Y-m-d");
            include "classes/class_connecting.php";
            $con = new Connection();
            $acti = "SELECT count(r.id_rezerwacja), z.nazwa, z.opis_zajec, z.limit_uczestnikow, z.id_zajecia, z.data, z.godzina, i.imie, i.nazwisko
                     FROM zajecia z, instruktor i, rezerwacja r 
                     where i.id_instruktor=z.instruktor_id_instruktor 
                     and r.zajecia_id_zajecia=z.id_zajecia group by z.id_zajecia";

            foreach ($con->query($acti) as $row) {
                            if($row['data']>=$data) {
                            echo '<tr>';
                            echo '<td>'. $row['nazwa'] . '</td>';
                            echo '<td>'. $row['data'] . '</td>';
                            echo '<td>'. $row['godzina'] . '</td>';
                            echo '<td>'. $row['imie'] .' '. $row['nazwisko'] . '</td>';
                            echo '<td>'. $row['count(r.id_rezerwacja)'].'/'.$row['limit_uczestnikow'].'</td>';
                            echo '<td id="special2">';
                            echo  $row['opis_zajec'];
                            echo '</td>';
                            echo '<td>';
                            if( isset($_SESSION['online']) && !empty($_SESSION['online']) && $_SESSION['e_mail']!='admin'){
                                echo '<a href="javascript:join_id('.$row['id_zajecia'].')"><button class="btn_delete">Zapisz się</button></a>';}
                            else  { echo '<button class="btn_delete" title ="Zaloguj się, aby móc się zapisać!" style="background-color:grey;">Zapisz się</button>';}
                            echo '</td>';
                            echo '</tr>';
                            }
            }
          ?>
        </tbody>
      </table>  
        </div>
      </div>
      <?php include "$_SERVER[DOCUMENT_ROOT]/obiektowo/tamplates/break.php"; 
            include "$_SERVER[DOCUMENT_ROOT]/obiektowo/tamplates/footer.php"; 
  
            if(isset($_GET['id_zajecia']))
            {
                $sql_query="INSERT INTO rezerwacja (data_zarezerwowania, zajecia_id_zajecia, user_id_user) 
                            VALUES ('$data', '".$_GET['id_zajecia']."', '".$_SESSION['id_user']."')";
                $con->query($sql_query);
                header('Location: grafik.php');
            }
        ?>
  </body>
</html>