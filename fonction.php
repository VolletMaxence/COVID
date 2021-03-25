<?php
include "Objet/User.php";
include "Objet/personnage.php";


//GESTION DE LA BASE -----------------------
$BDD = null;
$access = null;
$errorMessage="";
try{
        $BDD = new PDO('mysql:host=mysql-xencev.alwaysdata.net;dbname=xencev_virus', 'xencev_root', '2001root2001');
            

}catch(Exception $e){
    $errorMessage .= $e->getMessage();
}

$User = new User($BDD);

//GESTION DES SESSION -----------------------
if(!is_null($BDD)){
    if (isset($_SESSION["Connected"]) && $_SESSION["Connected"]===true){
        $access = true;
        if(isset($_SESSION["IDUser"]))
        {
            $User->setUserbyID($_SESSION["IDUser"]);
        }
        $access = $User->Deco();
    }else{
        $access = false;
        $errorMessage.= "Vous devez vous connectez";
        // Affichage de formulaire si pas deconnexion
        $access = $User->ConnecteToi();
    }
   
}else{
    $errorMessage.= "Vous n'avez pas les bases";
}






?>