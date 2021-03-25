<?php
    class User
    {
        private $_ID;
        private $_Nom;
        private $_Prenom;
        private $_MDP;
        private $_BDD;

        public function __construct($BDD)
        {
            $this->_BDD = $BDD;

        }

        public function setUser($ID, $Nom, $Prenom, $MDP)
        {
            $this->_ID = $ID;
            $this->_Nom = $Nom;
            $this->_Prenom = $Prenom;
            $this->_MDP = $MDP;
        }

        public function ConnecteToi()
        {
            //Affiche form
            //traitement du formulaire
            $access = false;
            if( isset($_POST["Prenom"]) && isset($_POST["Nom"]) && isset($_POST["password"])){
                //verif mdp en BDD

                $req = $this->_BDD->query("SELECT * FROM `User` WHERE `Nom`= '".$_POST['Nom']."' AND `Prenom`= '".$_POST['Prenom']."' AND `Mot_de_Passe`= '".$_POST['password']."'");
                if($result = $req->fetch())                //si mdp = ok
                {
                    $this->setUser($result['ID'], $result['Nom'], $result['Prenom'], $result ['Mot_de_Passe']);
                
                    $access = true;
                    $_SESSION["Connected"]=true;
                    $_SESSION["IDUser"]=$result['ID'];
                    $afficheForm = false;
                    //si on est co on affiche le formulaire de deco
                    $this->Deco();
                } else 
                {
                    $afficheForm = true;
                }

            }else{
                $afficheForm = true;
            }
            
            if($afficheForm){
            ?>
                <form action="" method="post" >
                        <label for="Nom">Entrez votre Nom: </label>
                        <input type="text" name="Nom" id="Nom" required>

                        <label for="login">Entrez votre Prenom: </label>
                        <input type="text" name="Prenom" id="Prenom" required>

                        <label for="password">Entrez votre mot de passe: </label>
                        <input type="password" name="password" id="password" required>

                        <input type="submit" value="Connecte-toi" >
                </form>

            <?php
            }
            return $access;
            }

        public function Deco()
        {
            //traitement du formulaire
            $afficheForm = true;
            $access = true;
            if( isset($_POST["Deco"]) && isset($_POST["Deco"])){
                //si on se deco on raffiche le formulaire de co
                $_SESSION["Connected"]=false;
                session_unset();
                session_destroy();
                $this->ConnecteToi();
                $afficheForm = false;
                $access = false;
            }else{
                $afficheForm = true;
            }

            if($afficheForm){
            ?>
                <form action="" method="post" >
                    <div >
                        <input type="submit" value="Deconnecte-toi" name="Deco">
                    </div>
                </form>

            <?php

            }

            return $access;
            }
        }
?>