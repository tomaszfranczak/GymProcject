<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8"/>
    <link rel="stylesheet" type="text/css" href="public_html/css/users.css"/>
    <link rel="stylesheet" type="text/css" href="public_html/css/style_user.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script type="text/javascript">
    function delete_id(id) {
      if(confirm('Czy na pewno chcesz usunąć te zajęcia?')) {
        window.location.href='admin_activ.php?delete_id='+id;
      }
    }
    </script>
  </head>
  <body>
    <div class="row">
        <a href="create_activ.php"><button class="btn_create">Dodaj+</button></a>
      <table>
        <thead>
          <tr>
            <th>Nazwa</th>
            <th>Data</th>
            <th>Godzina</th>
            <th>Limit uczestników</th>
            <th>Prowadzący</th>
            <th> </th>
          </tr>
        </thead>
          <tbody>
          <?php
            $data=date("Y-m-d");
            include "classes/class_connecting.php";
            $con = new Connection();
            $acti = "SELECT z.id_zajecia, z.nazwa, z.data, z.godzina, z.limit_uczestnikow, i.imie, i.nazwisko 
                      from instruktor i, zajecia z
                      where i.id_instruktor=z.instruktor_id_instruktor";

            foreach ($con->query($acti) as $row) {
                            if($row['data']>$data) {
                            echo '<tr>';
                            echo '<td>'. $row['nazwa'] . '</td>';
                            echo '<td>'. $row['data'] . '</td>';
                            echo '<td>'. $row['godzina'] . '</td>';
                            echo '<td>'. $row['limit_uczestnikow'] . '</td>';
                            echo '<td>'. $row['imie'] .' '. $row['nazwisko'] . '</td>';
                            echo '<td id="special">';
                            echo '<a href="read_activ.php?id_zajecia='.$row['id_zajecia'].'"><button class="btn">Więcej</button></a>';
                            echo ' ';
                            echo '<button class="btn_update" href="update.php?id='.$row['id_zajecia'].'">Edytuj</button>';
                            echo ' ';
                            echo '<a href="javascript:delete_id('.$row['id_zajecia'].')"><button class="btn_delete">Usuń</button></a>';
                            echo '</td>';
                            echo '</tr>'; }
            }
          ?>
        </tbody>
      </table>
    </div>
    <?php 
      if(isset($_GET['delete_id']))
      {
           $sql_query="DELETE FROM zajecia WHERE id_zajecia=".$_GET['delete_id'];
           $con->query($sql_query);
           header('Location: admin_activ.php');
      }
      ?>
</body>
</html>