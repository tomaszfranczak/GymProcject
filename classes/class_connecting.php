<?php
class Connection {
    protected $mMysqli; 
    
    public function __construct() {
        $this->mMysqli = new mysqli($host="localhost",
                                $db_user="root",
                                $db_password="",
                                $db_name="tofranczak");
        $this->mMysqli->query('set names utf8');

        if (mysqli_connect_error()) {
        echo 'Brak połączenia z bazą danych!'; exit;
        }
    }

    public function query($x) { return $this->mMysqli->query($x); }
} 
?>
