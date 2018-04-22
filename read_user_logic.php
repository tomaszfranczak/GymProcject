<?php
    include 'classes/class_connecting.php';
    $con = new Connection();

    $id_user = null;
    $id_user = $_GET['id_user'];

    if(null==$id_user) { header('Location: admin_users.php'); }
    else {
    $sql = "select u.imie, u.nazwisko, u.haslo, k.e_mail, k.nr_tel, a.ulica, a.nr_domu, a.nr_mieszkania,
                a.miasto, kk.nazwa_karnetu, kk.data_waznosci from user u, karnet kk, kontakt k,
                adress a where u.kontakt_id_kontakt=k.id_kontakt 
                AND u.adress_id_adress=a.id_adress and u.karnet_id_karnet=kk.id_karnet
                AND u.id_user='$id_user'";
    $query = $con->query($sql);
    $results = $query->fetch_assoc();
    }
?>