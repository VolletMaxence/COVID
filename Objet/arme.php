<?php
    class Arme{
        private $_id;
        private $_nom;
        private $_degats;

        public function __construct($id, $pdo){
            $this->_id = $id;
            $this->_pdo = $pdo;

            $req = "SELECT * FROM Arme WHERE id = '".$this->_id."' ";
            $result = $pdo->query($req);
            
            if($tab = $result->fetch()){
                $this->_nom = $tab['nom'];
                $this->_degats = $tab['degats'];

                //s'il existe on va chercher ses armes
                
            }
        }

        public function getNom(){
            return $this->_nom;
        }

    }

?>