<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8"/>
    <link rel="stylesheet" type="text/css" href="public_html/css/style_user.css"/>
    <link rel="stylesheet" type="text/css" href="public_html/css/users.css"/>
    <link rel="stylesheet" type="text/css" href="public_html/css/admin_instr.css"/>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700&amp;subset=latin-ext" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script type="text/javascript">
    function delete_id(id)
    {
     if(confirm('Czy na pewno chcesz usunąć tego użytkownika?'))
     {
        window.location.href='admin_users.php?delete_id='+id;
     }
    }
    </script>
  </head>
  <body>
    <div class="row">
      <a href="create_user.php"><button class="btn_create">Dodaj+</button></a>
      <table>
        <thead>
          <tr>
            <th>Imie</th>
            <th>Nazwisko</th>
            <th>E-mail</th>
            <th>Karnet</th>
            <th>Status</th>
            <th> </th>
          </tr>
        </thead>
          <tbody>
          <?php
            include "classes/class_connecting.php";
            $con = new Connection();
            $users = "SELECT u.imie, u.nazwisko, ko.e_mail, u.id_user, k.nazwa_karnetu, k.data_waznosci 
                             from user u, karnet k, kontakt ko where k.id_karnet=u.karnet_id_karnet 
                             and u.kontakt_id_kontakt=ko.id_kontakt
                             and u.imie not like 'admin'
                             order by k.data_waznosci desc";
            foreach ($con->query($users) as $row) {
                            echo '<tr>';
                            echo '<td>'. $row['imie'] . '</td>';
                            echo '<td>'. $row['nazwisko'] . '</td>';
                            echo '<td>'. $row['e_mail'] . '</td>';
                            echo '<td>'. $row['nazwa_karnetu'] . '</td>';
                            if($row['data_waznosci'] >= date('Y-m-d')) $status='Aktywny';
                            else $status='Dezaktywny';
                            echo '<td>'. $status . '</td>';
                            echo '<td id="special">';
                            echo '<a href="read_user.php?id_user='.$row['id_user'].'"><button class="btn">Więcej</button></a>';
                            echo ' ';
                            echo '<a href="edit_user.php?id_user='.$row['id_user'].'"><button class="btn_update">Edytuj</button></a>';
                            echo ' ';
                            echo '<a href="javascript:delete_id('.$row['id_user'].')"><button class="btn_delete">Usuń</button></a>';
                            echo '</td>';
                            echo '</tr>';
            }
          ?>
        </tbody>
      </table>
    </div>
      <?php 
      if(isset($_GET['delete_id']))
      {
           $sql_query="SELECT karnet_id_karnet, kontakt_id_kontakt, adress_id_adress from user where id_user=".$_GET['delete_id'];
           $resolt=$con->query($sql_query);
           $row = $resolt->fetch_array(MYSQLI_ASSOC);
           $kkarnet = $row['karnet_id_karnet'];
           $kkontakt = $row['kontakt_id_kontakt'];
           $aadres = $row['adress_id_adress'];
           
           $sql_query="DELETE FROM user WHERE id_user=".$_GET['delete_id'];
           $con->query($sql_query);
           $sql_query="DELETE FROM rezerwacja WHERE user_id_user=".$_GET['delete_id'];
           $con->query($sql_query);
           $sql_query="DELETE FROM adress WHERE id_adress=$aadres";
           $con->query($sql_query);
           $sql_query="DELETE FROM karnet WHERE id_karnet=$kkarnet";
           $con->query($sql_query);
           $sql_query="DELETE FROM kontakt WHERE id_kontakt=$kkontakt";   
           $con->query($sql_query);        

           echo '<script>location.href = "admin_users.php";</script>';
      }
      ?>
</body>
</html>