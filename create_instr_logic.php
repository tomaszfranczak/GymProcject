<?php
    include "classes/class_connecting.php";
    $con = new Connection();
 
    if ( !empty($_POST)) {
        $e_mail = $_POST['e_mail'];
        $imie = $_POST['imie'];
        $nazwisko = $_POST['nazwisko'];
        $nr_tel = $_POST['nr_tel'];
        $nr_mieszkania = $_POST['nr_mieszkania'];
        $nr_domu = $_POST['nr_domu'];
        $ulica = $_POST['ulica'];
        $miasto = $_POST['miasto'];
        $specjalnosc = $_POST['specjalnosc'];
         
        $valid = true;
        $check_email="select e_mail from kontakt where e_mail='$e_mail'";
        $check=$con->query($check_email); 
        $ilosc=$check->num_rows;
        if (empty($e_mail)) { $_SESSION['e_mailError'] = 'Wpisz adres e-mail'; $valid = false; }
        if ($ilosc!=0) { $_SESSION['e_mailError'] = 'Wpisany adres e-mail jest zajęty'; $valid = false; } 
        if (empty($imie)) { $_SESSION['imieError'] = 'Wpisz imię'; $valid = false; }
        if (empty($nazwisko)) { $_SESSION['nazwiskoError'] = 'Wpisz nazwisko'; $valid = false; }
        if (empty($ulica)) { $_SESSION['ulicaError'] = 'Wpisz nazwę ulicy'; $valid = false; }
        if (empty($nr_domu)) { $_SESSION['nr_domuError'] = 'Wpisz numer domu'; $valid = false; }
        if (empty($nr_mieszkania)) { $_SESSION['nr_mieszkaniaError'] = 'Wpisz numer mieszkania'; $valid = false; }
        if (empty($nr_tel)) { $_SESSION['nr_telError'] = 'Wpisz numer telefonu'; $valid = false; }
        if (empty($miasto)) { $_SESSION['miastoError'] = 'Wpisz nazwę miejscowości'; $valid = false; }
        if (empty($specjalnosc)) { $_SESSION['specjalnoscError'] = 'Wpisz specjalność'; $valid = false; }

        if ($valid) {
            $kontakt = "INSERT INTO kontakt (e_mail, nr_tel)
                        VALUES ('$e_mail', '$nr_tel')";
            $con->query($kontakt);
            $id_kontakt_sql="SELECT id_kontakt FROM kontakt WHERE e_mail='$e_mail'";
            $id_kontakt_con=$con->query($id_kontakt_sql);
            $row=$id_kontakt_con->fetch_assoc();
            $id_kontakt=$row['id_kontakt'];
            
            $adres = "INSERT INTO adress (miasto, nr_domu, nr_mieszkania, ulica)
                      VALUES ('$miasto', '$nr_domu', '$nr_mieszkania', '$ulica')";
            $con->query($adres);
            $id_adres_sql="SELECT id_adress FROM adress WHERE nr_mieszkania='$nr_mieszkania' AND
                           nr_domu='$nr_domu' AND ulica='$ulica' AND miasto='$miasto'";
            $id_adres_con=$con->query($id_adres_sql);
            $row=$id_adres_con->fetch_assoc();
            $id_adres= $row['id_adress'];

            $nowy="INSERT INTO instruktor (adress_id_adress, imie, kontakt_id_kontakt, nazwisko, opis)
                   VALUES ('$id_adres', '$imie', '$id_kontakt', '$nazwisko', '$specjalnosc')";
            $con->query($nowy); session_write_close();
            header("Location: admin_instr.php"); exit; 
        } else { session_write_close(); header("Location: create_instr.php"); exit;  }
    }
?>