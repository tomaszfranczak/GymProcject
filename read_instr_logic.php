<?php
    include 'classes/class_connecting.php';
    $con = new Connection();

    $id_instruktor = null;
    $id_instruktor = $_GET['id_instruktor'];

    if(null==$id_instruktor) { header('Location: admin_instr.php'); }
    else {
        $sql = "select i.imie, i.nazwisko, k.e_mail, k.nr_tel, a.ulica, a.nr_domu, a.nr_mieszkania,
                a.miasto, i.opis from instruktor i, kontakt k,
                adress a where i.kontakt_id_kontakt=k.id_kontakt 
                AND i.adress_id_adress=a.id_adress 
                AND i.id_instruktor='$id_instruktor'";
        $query = $con->query($sql);
        $results = $query->fetch_assoc();
    }
?>