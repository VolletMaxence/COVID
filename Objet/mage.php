<?php
    class Mage extends Personnage
    {
        protected $_AP;


        public function __construct($BDD)
        {
            parent::__construct($BDD);
        }

        //Set le perso Guerrier a partir de la classe Personnage
        public function setMage($IDM)
        {
            $req = "SELECT * FROM Mage WHERE ID=$IDM";
            $result = $this->_BDD->query($req);
            $Info = $result->fetch();

            $this->setPersobyID($Info['IDPerso']);

            $this->_AP = $Info['AP'];
        }

        public function getAP()
        {
            return $this->_AP;
        }

        public function attaqueMagique($Adv)
        {
            echo $this->_Nom." attaque ".$Adv->_Nom." avec des dégats magiques ! ";

            $Adv->sefaitAttaquer($this->_AP);
        }


        public function classe()
        {
            return "mage";
        }









    }
?>