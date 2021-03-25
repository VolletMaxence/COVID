<?php
include "Objet/User.php";


//GESTION DE LA BASE -----------------------
$BDD = null;
$access = null;
$errorMessage="";
try{
            $BDD = new PDO('mysql:host=mysql-xencev.alwaysdata.net;dbname=xencev_virus', 'xencev_root', '2001root2001');
            

}catch(Exception $e){
    $errorMessage .= $e->getMessage();
}

$User = new User ($BDD);

//GESTION DES SESSION -----------------------
if(!is_null($BDD)){
    if (isset($_SESSION["Connected"]) && $_SESSION["Connected"]===true){
        $access = true;

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


function afficheFormulaireConnexion()
    {

    //traitement du formulaire
    $access = false;
    if( isset($_POST["Prenom"]) && isset($_POST["Nom"]) && isset($_POST["password"])){
        //verif mdp en BDD

        //si mdp = ok
        $access = true;
        $_SESSION["Connected"]=true;
        $afficheForm = false;
        //si on est co on affiche le formulaire de deco
        afficheFormulaireLogout();

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





?>