<?
    class User {
        protected $id;
        protected $imie;
        protected $nazwisko;
        protected $ulica;
        protected $nr_domu;
        protected $nr_mieszkania;
        protected $miasto;
        protected $e_mail;
        protected $nr_tel;

        public function __construct($id, $imie, $nazwisko, $ulica, $nr_domu, 
                             $nr_mieszkania, $miasto, $e_mail, $nr_tel) {
            $this->id = $id;
            $this->imie = $imie;
            $this->nazwisko = $nazwisko;
            $this->ulica = $ulica;
            $this->nr_domu = $nr_domu;
            $this->nr_mieszkania = $nr_mieszkania;
            $this->miasto = $miasto;
            $this->e_mail = $e_mail;
            $this->nr_tel = $nr_tel;
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

        public function getId(){return $this->id;}
        public function getImie(){return $this->imie;}
        public function getNazwisko(){return $this->nazwisko;}
        public function getUlica(){return $this->ulica;}
        public function getNr_domu(){return $this->nr_domu;}
        public function getNr_mieszkania(){return $this->nr_mieszkania;}
        public function getMiasto(){return $this->miasto;}
        public function getE_mail(){return $this->e_mail;}
        public function getNr_tel(){return $this->nr_tel;}
}

$r=new User()
?>