<?php
    include 'classes/class_connecting.php';
    $con = new Connection();

    $id_zajecia = null;
    $id_zajecia = $_GET['id_zajecia'];

    if(null==$id_zajecia) { header('Location: admin_activ.php'); }
    else {
    $sql = "select z.nazwa, z.opis_zajec, z.data, z.godzina, z.limit_uczestnikow, i.imie, i.nazwisko 
            from instruktor i, zajecia z
            where i.id_instruktor=z.instruktor_id_instruktor and z.id_zajecia='$id_zajecia'";
    $query = $con->query($sql);
    $results = $query->fetch_assoc();
    }
?>