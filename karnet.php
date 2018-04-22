<?php
include "$_SERVER[DOCUMENT_ROOT]/obiektowo/classes/class_connecting.php";
session_start();


class Karnet extends Connection {
    protected $id_karnet; 
    protected $nazwa_karnetu;
    protected $cena;
    protected $status;
    protected $data_waznosci;
    protected $opis_karnetu;

    public function __construct() {
        parent::__construct();
        $id_user=$_SESSION['id_user'];

        $query_karnet = "select k.id_karnet, k.nazwa_karnetu, k.cena, k.data_waznosci, k.opis_karnetu
               from user u, karnet k
               where u.karnet_id_karnet=k.id_karnet 
               and u.id_user='$id_user'";

        $result = $this->mMysqli->query($query_karnet);

        if ($result->num_rows > 0) {
            $row = $result->fetch_array(MYSQLI_ASSOC);
            $this->id_karnet = $row["id_karnet"];
            $this->nazwa_karnetu = $row["nazwa_karnetu"];
            $this->cena = $row["cena"];
            $this->status = $row["status"];
            $this->data_waznosci = $row["data_waznosci"];
            $this->opis_karnetu = $row["opis_karnetu"];
        }
    }

    public function setId($x){return $this->id_karnet=$x;}
    public function setNazwa($x){return $this->nazwa_karnetu=$x;}
    public function setCena($x){return $this->cena=$x;}
    public function setStatus($x){return $this->status=$x;}
    public function setData_waznosci($x){return $this->data_waznosci=$x;}
    public function setOpis_karnetu($x){return $this->opis_karntu=$x;}

    public function getId(){return $this->id_karnet;}
    public function getNazwa(){return $this->nazwa_karnetu;}
    public function getCena(){return $this->cena;}
    public function getStatus(){return $this->status;}
    public function getData_waznosci(){return $this->data_waznosci;}
    public function getOpis_karnetu(){return $this->opis_karnetu;}
} 

$karnet=new Karnet();
$_SESSION['id_karnet']=$karnet->getId();
$_SESSION['nazwa_karnetu']=$karnet->getNazwa();
$_SESSION['cena']=$karnet->getCena();
$_SESSION['status']=$karnet->getStatus();
$_SESSION['data_waznosci']=$karnet->getData_waznosci();
$_SESSION['opis_karnetu']=$karnet->getOpis_karnetu();
header('Location: user.php'); 
?>