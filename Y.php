<?php 
//GESTION DE LA BASE -----------------------
$BDD = null;
$access = null;
$errorMessage="";
try{
            $user = "lapro_site";
            $pass = "TDataSource1234";

            $BDD = new PDO("mysql:host=mysql-xencev.alwaysdata.net; dbname=xencev_virus; charset=utf8", "xencev_root", "2001root2001");
            

}catch(Exception $e){
    $errorMessage .= $e->getMessage();
}

//GESTION DES SESSION -----------------------
if(!is_null($BDD)){
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
    if( isset($_POST["deco"]) && isset($_POST["deco"])){
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
                <input type="submit" value="Deconnection" name="deco">
        </form>

    <?php
    
    }

    return $access;
}


function afficheFormulaireConnexion(){

    //traitement du formulaire
    $access = false;
    if( isset($_POST["login"]) && isset($_POST["password"])){
        //verif mdp en BDD
        $req = $BDD->prepare('SELECT * FROM `User` WHERE `Nom`= ? AND `Prenom`= ? AND `Mot_de_Passe`= ?');
        $req->execute(array($_POST['Nom'],$_POST['Prenom'], $_POST['password']));
        $resultat = $req->fetch();

        if(!$resultat)
        {
            echo "mauvais mot de passe ou non d'utilisateur";
        } else 
        {
            // echo "ca marche";

            //si mdp = ok
            $access = true;
            $_SESSION["Connected"]=true;
            $afficheForm = false;
            //si on est co on affiche le formulaire de deco
            afficheFormulaireLogout();
        }

    }else{
        $afficheForm = true;
    }
    
    if($afficheForm){
    ?>
        <form method="post" >

                <label for="login">Entrez votre Nom: </label>
                <input type="text" name="Nom" id="Nom" required>

                <label for="login">Entrez votre Prenom: </label>
                <input type="text" name="Prenom" id="Prenom" required>

                <label for="password">Enter your pass: </label>
                <input type="password" name="password" id="password" required>

                <input type="submit" name=submit value="Connecte-toi" >

        </form>

    <?php
    }

    return $access;
        
}





?>