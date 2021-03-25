<?php
    class Personnage{
        //propiétés
        private $_ID;
        private $_Nom;
        private $_Attaque;
        private $_Vie;
        private $_pdo;
        private $_sac;

        //méthode
        public function __construct($BDD)
        {
            $this->_BDD = $BDD;
        }

        public function setPerso($ID, $Nom, $Vie, $Attaque)
        {
            $this->_ID = $ID;
            $this->_Nom = $Nom;
            $this->_Attaque = $Attaque;
            $this->_Vie = $Vie;
        }

        public function getNom()
        {
            return $this->_Nom;
        }

        public function getSac()
        {
            return $this->_sac;
        }

        public function getID()
        {
            return $this->_ID;
        }

        public function getStrListArme(){
            $string = " ";
            foreach($this->_sac as $Arme)
            {
                $string = $string." ".$Arme->getNom();
            }

            return $string;
        }
    
        public function setPersobyID($ID)
        {
            $req = "SELECT * FROM Personnage WHERE ID=$ID";
            $result = $this->_BDD->query($req);
            if($tab = $result->fetch())
            {
                $this->setPerso($tab['ID'], $tab['Nom'], $tab['Vie'], $tab['Attaque']);
            }
        }

        //Renvoie la liste des Perso present en base
        public function getPerso()
        {
            $req = "SELECT * FROM Personnage";
            $result = $this->_BDD->query($req);
            ?>
                <form action="" method=post onchange="this.submit()">
                    <select name=selectPerso id=selectPerso>
                        <option value =""> Choisis ton perso </option>
                        <?php
                            while($tab = $result->fetch())
                                {
                                    echo '<option value="'.$tab['ID'].'">'.$tab['Nom'].'</option>';
                                }
                        ?>
                    </select>
                </form>
            <?php
            if (isset($_POST["selectPerso"]))
            {
                $this->setPersobyID($_POST["selectPerso"]);
            }

        }

    }
?>