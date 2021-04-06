<?php
    class Guerrier extends Personnage
    {
        protected $_brut;


        public function __construct($BDD)
        {
            parent::__construct($BDD);
        }


        //Set le perso Guerrier a partir de la classe Personnage
        public function setGuerrier($IDG)
        {
            $req = "SELECT * FROM Guerrier WHERE ID=$IDG";
            $result = $this->_BDD->query($req);
            $Info = $result->fetch();


            $this->setPersobyID($Info['IDPerso']);


            $this->_brut = $Info['Brut'];

        }

        public function attaqueBrut($Adv)
        {
            echo $this->_Nom." attaque ".$Adv->_Nom." avec des dégats bruts ! ";
            $Adv->sefaitAttaquer($this->_brut);
        }

        public function getBrut()
        {
            return $this->_brut;
        }

        public function classe()
        {
            return "guerrier";
        }







    }
?>