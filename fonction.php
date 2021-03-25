<?php 
//GESTION DE LA BASE -----------------------
$mabase = null;
$access = null;
$errorMessage="";
try{
            $user = "lapro_site";
            $pass = "TDataSource1234";

            $mabase = new PDO('mysql:host=mysql-lapro.alwaysdata.net;dbname=lapro_virus', $user, $pass);
            

}catch(Exception $e){
    $errorMessage .= $e->getMessage();
}

//GESTION DES SESSION -----------------------
if(!is_null($mabase)){
    if (isset($_SESSION["Connected"]) && $_SESSION["Connected"]===true){
        $access = true;
        $access = afficheFormulaireLogout();
    }else{
        $access = false;
        $errorMessage.= "Vous devez vous connectez";
        // Affichage de formulaire si pas deconnexion
        $access = afficheFormulaireConnexion();
    }
   
}else{
    $errorMessage.= "Vous n'avez pas les bases";
}

function afficheFormulaireLogout(){
    //traitement du formulaire
    $afficheForm = true;
    $access = true;
    if( isset($_POST["Deco"]) && isset($_POST["Deco"])){
        //si on se deco on raffiche le formulaire de co
        $_SESSION["Connected"]=false;
        session_unset();
        session_destroy();
        afficheFormulaireConnexion();
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


function afficheFormulaireConnexion(){

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