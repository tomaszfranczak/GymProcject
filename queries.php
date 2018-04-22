<?php
$query_user = "select u.id, u.imie, u.nazwisko, a.ulica, a.nr_domu, a.nr_mieszkania, a.miasto, k.nr_tel, k.e_mail 
               from user u, kontakt k, adress a
               where u.kontakt_id_kontakt=k.id_kontakt 
               and u.adress_id_adress=a.id_adress
               and k.e_mail='$login' and u.haslo='$password'";
?>