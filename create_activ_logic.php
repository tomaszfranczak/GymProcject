<?php
    include "classes/class_connecting.php";
    $con = new Connection();
    $data_dzisiejsza=date("Y-m-d");
 
    if ( !empty($_POST)) {
        $nazwa = $_POST['nazwa'];
        $prowadzacy = $_POST['prowadzacy'];
        $data = $_POST['data'];
        $godzina = $_POST['godzina'];
        $limit = $_POST['limit'];
        $opis = $_POST['opis'];
         
        $valid = true;
        if (empty($nazwa)) { $_SESSION['nazwaError'] = 'Wpisz nazwę'; $valid = false; }
        if (empty($limit)) { $_SESSION['limitError'] = 'Wpisz limit miejsc na zajęcia'; $valid = false; }
        if (empty($opis)) { $_SESSION['opisError'] = 'Uzupełnij opis'; $valid = false; }
        if ($data<=$data_dzisiejsza) { $_SESSION['dataError'] = 'Wybierz nową datę'; $valid = false; }

        if ($valid) {
            $zajecia_sql = "INSERT INTO zajecia (data, godzina, instruktor_id_instruktor, limit_uczestnikow, nazwa, opis)
            VALUES ('$data', '$godzina', '$prowadzacy', '$limit', '$limit', '$opis')";
            $con->query($zajecia_sql);
            session_write_close();
            header("Location: admin_activ.php"); exit;
        } else { session_write_close(); header("Location: create_activ.php"); exit; } 
    }
?> 