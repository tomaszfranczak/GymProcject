<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8"/>
    <link rel="stylesheet" type="text/css" href="public_html/css/users.css"/>
    <link rel="stylesheet" type="text/css" href="public_html/css/style_user.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script type="text/javascript">
    function delete_id(id)
    {
     if(confirm('Czy na pewno chcesz usunąć tego instruktora?'))
     {
        window.location.href='admin_instr.php?delete_id='+id;
     }
    }
    </script>
  </head>
  <body>
    <div class="row">
        <a href="create_instr.php"><button class="btn_create">Dodaj+</button></a>
      <table>
        <thead>
          <tr>
            <th>Imie</th>
            <th>Nazwisko</th>
            <th>E-mail</th>
            <th>Nr. tel</th>
            <th>Specjalizacja</th>
            <th> </th>
          </tr>
        </thead>
          <tbody>
          <?php
            include "classes/class_connecting.php";
            $con = new Connection();
            $users = "SELECT i.imie, i.nazwisko, ko.e_mail, i.id_instruktor, ko.nr_tel, i.opis 
                      from instruktor i, kontakt ko 
                      where i.kontakt_id_kontakt=ko.id_kontakt";

            foreach ($con->query($users) as $row) {
                            echo '<tr>';
                            echo '<td>'. $row['imie'] . '</td>';
                            echo '<td>'. $row['nazwisko'] . '</td>';
                            echo '<td>'. $row['e_mail'] . '</td>';
                            echo '<td>'. $row['nr_tel'] . '</td>';
                            echo '<td>'. $row['opis'] . '</td>';
                            echo '<td id="special">';
                            echo '<a href="read_instr.php?id_instruktor='.$row['id_instruktor'].'"><button class="btn">Więcej</button></a>';
                            echo ' ';
                            echo '<button class="btn_update" href="update.php?id='.$row['id_instruktor'].'">Edytuj</button>';
                            echo ' ';
                            echo '<a href="javascript:delete_id('.$row['id_instruktor'].')"><button class="btn_delete">Usuń</button></a>';
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
           $sql_query="DELETE FROM instruktor WHERE id_instruktor=".$_GET['delete_id'];
           $con->query($sql_query);
           header('Location: admin_instr.php');
      }
      ?>
</body>
</html>