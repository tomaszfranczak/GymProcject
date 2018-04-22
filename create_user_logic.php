<?php
    include "classes/class_connecting.php";
    $con = new Connection();
 
    if ( !empty($_POST)) {
        $karnet = $_POST['karnet'];
        $e_mail = $_POST['e_mail'];
        $haslo = $_POST['haslo'];
        $imie = $_POST['imie'];
        $nazwisko = $_POST['nazwisko'];
        $nr_tel = $_POST['nr_tel'];
        $nr_mieszkania = $_POST['nr_mieszkania'];
        $nr_domu = $_POST['nr_domu'];
        $ulica = $_POST['ulica'];
        $miasto = $_POST['miasto'];

        $_SESSION['e_maill'] = $e_mail;
        $_SESSION['imiee'] = $imie;
        $_SESSION['nazwiskoo']=$nazwisko;
        $_SESSION['nr_tell']=$nr_tel;
        $_SESSION['nr_mieszkaniaa']=$nr_mieszkania;
        $_SESSION['nr_domuu']=$nr_domu;
        $_SESSION['ulicaa']=$ulica;
        $_SESSION['miastoo']=$miasto;
         
        $valid = true;
        $check_email="select e_mail from kontakt where e_mail='$e_mail'";
        $check=$con->query($check_email); 
        $ilosc=$check->num_rows;
        if (empty($e_mail)) { $_SESSION['e_mailError'] = 'Wpisz swój adres e-mail'; $valid = false; }
        if ($ilosc!=0) { $_SESSION['e_mailError'] = 'Wpisany adres e-mail jest zajęty'; $valid = false; } 
        if (empty($imie)) { $_SESSION['imieError'] = 'Wpisz swoje imię'; $valid = false; }
        if (empty($nazwisko)) { $_SESSION['nazwiskoError'] = 'Wpisz swoje nazwisko'; $valid = false; }
        if (empty($haslo)) { $_SESSION['hasloError'] = 'Wpisz swoje hasło'; $valid = false; }
        if (empty($ulica)) { $_SESSION['ulicaError'] = 'Wpisz nazwę swojej ulicy'; $valid = false; }
        if (empty($nr_domu)) { $_SESSION['nr_domuError'] = 'Wpisz swój numer domu'; $valid = false; }
        if (empty($nr_mieszkania)) { $_SESSION['nr_mieszkaniaError'] = 'Wpisz swój numer mieszkania'; $valid = false; }
        if (empty($nr_tel)) { $_SESSION['nr_telError'] = 'Wpisz swój numer telefonu'; $valid = false; }
        if (empty($miasto)) { $_SESSION['miastoError'] = 'Wpisz nazwę swojej miejscowości'; $valid = false; }

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

            $data=date("Y-m-d");
            $nowa_data=date('Y-m-d', strtotime($data. ' + 31 days'));
            if($karnet=="OPEN"){ $cena=100; } else { $cena=50; }
            if($karnet=="OPEN") { $opis_karnetu="Karnet OPEN umożliwia Ci korzystanie z klubu  bez żadnych ograniczeń ilościowych oraz czasowych. W zakres usług wchodzą: siłownie, zajęcia grupowe  , dostępne w klubie."; } else { $opis_karnetu="Karnet HALF OPEN – abonament uprawniający do korzystania bez ograniczeń z wszelkich usług fitness i innych zajęć grupowych znajdujących się w ofercie Klubu oraz dostępu do siłowni Klubu przez okres 30 dni, z tym zastrzeżeniem, że wejście do Klubu musi nastąpić od godziny otwarcia Klubu jednak nie później niż przed godziną 16:00.";}
            $newkarnet = "INSERT INTO karnet (cena, data_waznosci, nazwa_karnetu, opis_karnetu)
                          VALUES ('$cena', '$nowa_data', '$karnet', '$opis_karnetu')";
            $con->query($newkarnet);
            $id_karnet_sql="SELECT id_karnet FROM karnet WHERE data_waznosci='$nowa_data' and cena='$cena'";
            $id_karnet_con=$con->query($id_karnet_sql);
            $row=$id_karnet_con->fetch_assoc();
            $id_karnet= $row['id_karnet'];
            
            $nowy="INSERT INTO user (adress_id_adress, haslo, imie, karnet_id_karnet, kontakt_id_kontakt, nazwisko)
                   VALUES ('$id_adres', '$haslo', '$imie',  '$id_karnet', '$id_kontakt', '$nazwisko')";
            $con->query($nowy); session_write_close();

            $_SESSION['zarejstrowany']='Rejstracja przebiegła pomyślnie, zaloguj się.';

            unset($_SESSION['e_maill']);
            unset($_SESSION['imiee']);
            unset($_SESSION['nazwiskoo']);
            unset($_SESSION['nr_tell']);
            unset($_SESSION['nr_mieszkaniaa']);
            unset($_SESSION['nr_domuu']);
            unset($_SESSION['ulicaa']);
            unset($_SESSION['miastoo']);

            if(isset($_SESSION['e_mail'])) { header("Location: admin_users.php"); exit; }
           // else { header("Location: log.php"); exit; }
        } else { session_write_close(); if($_SESSION['e_mail']=="admin") { header("Location: create_user.php"); exit; } 
                                        else { header("Location: log.php"); exit; } }
    }
?> 