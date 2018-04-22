<?php
include "$_SERVER[DOCUMENT_ROOT]/obiektowo/classes/class_connecting.php";

class User extends Connection {
    protected $online; 
    protected $e_mail;
    protected $password;
    protected $id_user;
    protected $imie;
    protected $nazwisko;
    protected $ulica;
    protected $nr_domu;
    protected $nr_mieszkania;
    protected $miasto;
    protected $nr_tel;

    public function __construct() {
        parent::__construct();
        session_start();
        $e_mail=$_POST['login'];
        $password=$_POST['pass'];

        $query_user = "select u.id_user, u.imie, u.nazwisko, u.haslo, a.ulica, a.nr_domu, a.nr_mieszkania,
               a.miasto, k.nr_tel, k.e_mail 
               from user u, kontakt k, adress a
               where u.kontakt_id_kontakt=k.id_kontakt 
               and u.adress_id_adress=a.id_adress
               and k.e_mail='$e_mail' and u.haslo='$password'";

        $result = $this->mMysqli->query($query_user);

        if ($result->num_rows > 0) {
            $row = $result->fetch_array(MYSQLI_ASSOC);
            $this->online = true;
            $this->id_user = $row["id_user"];
            $this->imie = $row["imie"];
            $this->nazwisko = $row["nazwisko"];
            $this->password = $row["haslo"];
            $this->ulica = $row["ulica"];
            $this->nr_domu = $row["nr_domu"];
            $this->nr_mieszkania = $row["nr_mieszkania"];
            $this->miasto = $row["miasto"];
            $this->nr_tel = $row["nr_tel"];
            $this->e_mail = $row["e_mail"];
            unset($_SESSION['blad']);
            $result->free_result();
        } 
    }

    public function Userlogout() {
        if ($this->online == true) {
        $this->online = false;
        $result->free_result();
        session_destroy();
        }
    } 

    public function setId($x){return $this->id=$x;}
    public function setImie($x){return $this->imie=$x;}
    public function setNazwisko($x){return $this->nazwisko=$x;}
    public function setUlica($x){return $this->ulica=$x;}
    public function setNr_domu($x){return $this->nr_domu=$x;}
    public function setNr_mieszkania($x){return $this->nr_mieszkania=$x;}
    public function setMiasto($x){return $this->miasto=$x;}
    public function setE_mail($x){return $this->e_mail=$x;}
    public function setNr_tel($x){return $this->nr_tel=$x;}

    public function getId(){return $this->id_user;}
    public function getImie(){return $this->imie;}
    public function getNazwisko(){return $this->nazwisko;}
    public function getUlica(){return $this->ulica;}
    public function getNr_domu(){return $this->nr_domu;}
    public function getNr_mieszkania(){return $this->nr_mieszkania;}
    public function getMiasto(){return $this->miasto;}
    public function getE_mail(){return $this->e_mail;}
    public function getNr_tel(){return $this->nr_tel;}
    public function getOnline(){return $this->online;}
    public function getPassword(){return $this->password;}
} 

$user= new User();
$_SESSION['online']=true;
$_SESSION['id_user']=$user->getId();
$_SESSION['imie']=$user->getImie();
$_SESSION['nazwisko']=$user->getNazwisko();
$_SESSION['password']=$user->getPassword();
$_SESSION['ulica']=$user->getUlica();
$_SESSION['nr_domu']=$user->getNr_domu();
$_SESSION['nr_mieszkania']=$user->getNr_mieszkania();
$_SESSION['miasto']=$user->getMiasto();
$_SESSION['nr_tel']=$user->getNr_tel();
$_SESSION['e_mail']=$user->getE_mail();

if($user->getOnline() == true) { 
   if($user->getE_mail()=='admin') header('Location: admin_users.php');
   else  { header('Location: karnet.php'); exit; }
}
else { $_SESSION['blad']='<span style="color:red">Nieprawidłowy login lub hasło.</span>';
    header('Location: log.php'); exit;
}