<?php
    include 'classes/class_connecting.php';
    $con = new Connection();

    $id_user = $_GET['id_user'];

    if(null==$id_user) { header('Location: admin_users.php'); }
    else {
    $sql = "select u.imie, u.nazwisko, u.haslo, k.e_mail, k.nr_tel, a.ulica, a.nr_domu, a.nr_mieszkania,
                a.miasto from user u, karnet kk, kontakt k,
                adress a where u.kontakt_id_kontakt=k.id_kontakt 
                AND u.adress_id_adress=a.id_adress 
                AND u.id_user='$id_user'";
    $query = $con->query($sql);
    $results = $query->fetch_assoc();
    }


    if ( !empty($_POST)) {
        $valid = true;
        if ($_POST['imie']=='') { $_SESSION['imieError'] = 'Wpisz imię'; $valid = false; }
        if ($_POST['nazwisko']=='') { $_SESSION['nazwiskoError'] = 'Wpisz nazwisko'; $valid = false; }
        if ($_POST['haslo']=='') { $_SESSION['hasloError'] = 'Wpisz hasło'; $valid = false; }
        if ($_POST['ulica']=='') { $_SESSION['ulicaError'] = 'Wpisz nazwę ulicy'; $valid = false; }
        if ($_POST['nr_domu']=='') { $_SESSION['nr_domuError'] = 'Wpisz numer domu'; $valid = false; }
        if ($_POST['nr_mieszkania']=='') { $_SESSION['nr_mieszkaniaError'] = 'Wpisz numer mieszkania'; $valid = false; }
        if ($_POST['nr_tel']=='') { $_SESSION['nr_telError'] = 'Wpisz numer telefonu'; $valid = false; }
        if ($_POST['miasto']=='') { $_SESSION['miastoError'] = 'Wpisz nazwę miejscowości'; $valid = false; }

        if ($valid) {
            $sql = "UPDATE user SET imie = ".$_POST['imie'].", nazwisko = ".$_POST['nazwisko'].", haslo =".$_POST['haslo']." WHERE id_user = $id_user";
            $query = $con->query($sql);
            header("Location: admin_users.php"); exit;
        } }
?>